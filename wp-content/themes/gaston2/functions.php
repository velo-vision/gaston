<?php


if ( function_exists('register_sidebars') )
    register_sidebars();

add_theme_support( 'post-thumbnails' );


 //paginacion personalizado
function pagination($prev = '', $next = '') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
};

function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = 'Twitter';
//add Facebook
$contactmethods['facebook'] = 'Facebook';
// Add Instragram
$contactmethods['instagram'] = 'Instagram';



 
return $contactmethods;
}

add_filter('user_contactmethods','my_new_contactmethods',10,1);


//reducir conteido para mostrar expert o content

 function wpdocs_custom_excerpt_length( $length ) {
     return 50;
 }
 add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function limitar_palabras( $str, $num, $append_str='' ) {
  $palabras = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
  if( isset($palabras[$num][1]) ){
    $str = substr( $str, 0, $palabras[$num][1] ) . $append_str;
  }
  unset( $palabras, $num );
  return trim( $str );
}

// Mas leidos

// function shapeSpace_popular_posts($post_id) {
//   $count_key = 'popular_posts';
//   $count = get_post_meta($post_id, $count_key, true);
//   if ($count == '') {
//     $count = 0;
//     delete_post_meta($post_id, $count_key);
//     add_post_meta($post_id, $count_key, '0');
//   } else {
//     $count++;
//     update_post_meta($post_id, $count_key, $count);
//   }
// }
// function shapeSpace_track_posts($post_id) {
//   if (!is_single()) return;
//   if (empty($post_id)) {
//     global $post;
//     $post_id = $post->ID;
//   }
//   shapeSpace_popular_posts($post_id);
// }
// add_action('wp_head', 'shapeSpace_track_posts');

// function wpb_set_post_views($postID) {
//     $count_key = 'wpb_post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         $count = 0;
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//     }else{
//         $count++;
//         update_post_meta($postID, $count_key, $count);
//     }
// }
// //To keep the count accurate, lets get rid of prefetching
// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// function wpb_track_post_views ($post_id) {
//     if ( !is_single() ) return;
//     if ( empty ( $post_id) ) {
//         global $post;
//         $post_id = $post->ID;    
//     }
//     wpb_set_post_views($post_id);
// }
// add_action( 'wp_head', 'wpb_track_post_views');


// function wpb_get_post_views($postID){
//     $count_key = 'wpb_post_views_count';
//     $count = get_post_meta($postID, $count_key, true);
//     if($count==''){
//         delete_post_meta($postID, $count_key);
//         add_post_meta($postID, $count_key, '0');
//         return "0 View";
//     }
//     return $count.' Views';
// }



$args = array(
  'numberposts' => 3,
  'offset' => 0,
  'category' => 0,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'include' => '',
  'exclude' => '',
  'meta_key' => '',
  'meta_value' =>'',
  'post_type' => 'post',
  'post_status' => 'draft, publish, future, pending, private',
  'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );




/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}