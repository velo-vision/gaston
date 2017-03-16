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