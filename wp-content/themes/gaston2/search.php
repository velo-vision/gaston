<?php get_header(); ?>
<div class="row">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>		

	<h2 class="titulo-busqueda">Resultados de Busqueda</h2>
<div class="col l12 m12 s12 historial" style="margin-top:50px;">
<a href="<?php the_permalink(); ?>" style="color:#000;" >
    <div class="col s12 m12 l6 imagenfija">        
      <?php $video = get_post_meta($post->ID, 'video1', true);
		if (!empty($video)){     			
			 echo "<iframe class='video2' height='554' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
			}else{
		if (has_post_thumbnail()){
	          $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	          echo '<li class="fondo-pagevideo2" style="background: url('. $url.')">';   
				}
			} ?>               
    </div></a>
    <div class="col s12 m6 l6">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l12 historial-title">
                <p class="titulo-categorias" id="post-<?php the_ID(); ?>">
                    <a class="a" href="<?php the_permalink() ?>" ><?php the_title(); ?></a>
                </p>
            </div>
            <div class="col l6 m6 s6 text-subtitle">
                <p><a class="a" href="<?php the_permalink() ?>" ><?php echo the_category() ?></a></p>
            </div>
            <div class="col l6 m6 s6 text-subtitle center nopadding">
                <p><?php echo get_the_date( get_option('date_format') ); ?></p>
            </div>
            <div class="col l12 m12 s12 text-historial">
                <p><?php echo get_the_excerpt( get_the_ID() ) ?></p>
            </div>
            <div class="col l6 m6 s6 text-compartir">
                <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                <span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l12">
        <p><small><?php the_time('l, F jS, Y') ?></small></p>
        <p>Posteado en <?php the_category(', ') ?></p>
    </div>
</div>
<?php endwhile; ?>
<?php else : ?>
    <div class="row">
        <div class="col s12 m12 l12 center-align">
            <p>¡Ups! Lo Sentimos, No encontramos coincidencias, Intenta con otra Busqueda...</p>
            <div class="s12 m4 offset-m4 l4 offset-l4 ">
                <img src="<?php bloginfo('template_url'); ?>/images/no-found.jpg">
            </div>
        </div>
    </div>	
<?php endif; ?>
<div class="row"> 
     <div class="col s12 m12 offset-m4 l4 offset-l4 pagination paginacion center-align ">
        <?php pagination('anterior', 'siguiente'); ?>
    </div>      
</div>
</div>
<?php get_footer(); ?>