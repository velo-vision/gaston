<?php
/**
Template Name: articulos
**/
get_header();
?>

<body class="bg">
  <div class="row">
    <div class="col l12 m12 s12 nopadding">
      <img src="<?php bloginfo('template_url'); ?>/images/cafe.jpg" class="nopadding" alt="Gaston Lombardi" width="100%">
    </div>
    <div class="col l10 offset-l1 m12 s12 margin-50">   

      <div class="col l12 m12 s12" style="margin-top:15px;">
        <div class="col l4 offset-l4 m4 offset-m4 s12" style="padding-left:0px; margin-bottom:10px;">
        <?php get_search_form(); ?>
        </div>
        <div class="col l4 m5 s4 offset-s4 nopadding" style="margin-bottom:10px;">
        </div>
      </div>
    </div>
    <div class="row nopadding">
      <div class="col s12 m10 offset-m1 l10 offset-l1 margin-30 nopadding">
        <div class="col s3 m3 l4 div-tam center-align nopadding">
          <div class="linea"></div>
        </div>
        <div class="col s6 m6 l4 div-tam center-align borde-articulos nopadding">
          ÚLTIMAS NOTICIAS
        </div>
        <div class="col s3 m3 l4 div-tam center-align nopadding">
          <div class="linea"></div>
        </div>
      </div>
    </div>
    <div class="col l12 m12 s12 margin-30">
<?php query_posts('showposts=3'); /* Con esta línea limitamos el resultado a 5 resultados */ ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <!-- contenido -->
    <div class="col l4 m4 s12" style="margin-bottom:20px; margin-top:15px;">
      <div class="col l12 m12 s12 size relative nopadding">
        <a href="<?php the_permalink(); ?>"></a>
        <div class="imggastonblog">
      <?php $video = get_post_meta($post->ID,'video1', true); //video1 es un campo personalizado, con custom fields
       if (!empty($video)){
           echo "<iframe class='video33' height='500' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
          }elseif (!empty(has_post_thumbnail())){
                     $url = wp_get_attachment_url( get_post_thumbnail_id() );
                    echo '<li class="img_articulos_bg articulos-internos" style="background: url('. $url.')">';
                  }
        else{?>
            <div class="col s12 m12 l12 center-align sombrita">
              <p class='no-hay'>no hay imagen o video disponible</p>
            </div>
         <?php }
           ?>
        </div>
        <div class="col s12 m12 l12 nopadding nomargin">
          <div class="col l5 m8 s5 text-titulo nopadding">
            <?php echo the_category() ;?>
          </div>
          <div class="col l7 m4 s7 text-fecha nopadding">
            <?php echo get_the_date( get_option('date_format') ); ?>
          </div>
        </div>
          <div class="col l12 m12 s12 text-contenido">
            <?php  echo the_title(); ?>
          </div>
          <div class="col l12 m12 s8 offset-s2 text-boton margin-30">
            <div class="col 12 m12 s8 titulo_articulos_home">
              <a href="<?php the_permalink(); ?>">Leer más <i class="material-icons">arrow_forward</i></a>
            </div>
          </div>
        </div>
    </div>
<!-- conetinido -->
<?php endwhile; endif;?>


</div>
<div class="row nopadding">
  <div class="col s12 m12 l10 offset-l1 margin-70 nopadding">
    <div class="col s3 m4 l4 div-tam center-align nopadding">
      <div class="linea"></div>
    </div>
    <div class="col s6 m4 l4 div-tam center-align borde-articulos nopadding">
      MÁS LEÍDAS
    </div>
    <div class="col s3 m4 l4 div-tam center-align nopadding">
      <div class="linea"></div>
    </div>
  </div>
</div>
<div class="row"><!--mas leidas-->
<?php
query_posts('posts_per_page=3&meta_key=post_views_count&orderby=meta_value_num&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
?>
    <div class="col l4 m4 s12" style="margin-bottom:20px; margin-top:15px;">
      <div class="col l12 m12 s12 size relative nopadding">
        <a href="<?php the_permalink(); ?>"></a>
        <div class="imggastonblog">
          <!-- <?php
          if (has_post_thumbnail()) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            echo '<li class="img_articulos_bg articulos-internos" style="background: url('. $url.')">';}?>    -->

        <?php $video = get_post_meta($post->ID, 'video1', true); //video1 es un campo personalizado, con custom fields
       if (!empty($video)){
           echo "<iframe class='video33' height='500' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
          }elseif (!empty(has_post_thumbnail())){
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                   //echo '<img class="fondo-pagevideo2" src="'. $url.'">';
                   echo '<li class="img_articulos_bg articulos-internos" style="background: url('. $url.')">';
                  }
        else{
            echo "no hay imagen o video disponible";
          }
           ?>
        </div>
        <div class="col s12 m12 l12 nopadding nomargin">
          <div class="col l5 m8 s5 text-titulo nopadding">
            <?php echo the_category() ?>
          </div>
          <div class="col l7 m4 s7 text-fecha nopadding">
            <?php echo get_the_date( get_option('date_format') ); ?>
          </div>
        </div>
          <div class="col l12 m12 s12 text-contenido">
            <?php the_title(); ?>
          </div>
          <div class="col l12 m12 s8 offset-s2 text-boton margin-30">
            <div class="col 12 m12 s8 titulo_articulos_home">
              <a href="<?php the_permalink(); ?>">Leer más <i class="material-icons">arrow_forward</i></a>
            </div>
          </div>
        </div>
    </div>
<?php
endwhile; endif;
wp_reset_query();
?>
</div>
</div>

<?php
get_footer();
?>
