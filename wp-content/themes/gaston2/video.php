<?php
/**
Template Name: video
**/
  require("functions.php");
  get_header();
?>

<!-- the loop etc.. -->
<?php

?>
<div class="row">
    <?php
    global $post;
    $args = array("posts_per_page" => 1, "offset"=> 0, "category" => 19 );
    $myposts = get_posts( $args );

    foreach( $myposts as $post ) : setup_postdata($post); ?>

		<div class="col l10 offset-l1 m12 s12">
			<div class="col l12 m12 s12 titulo-anterior">
				<?php the_title(); ?>
			</div>
			<div class="col l12 m12 s12 Subtitulo-informacion">
				<div class="col l12 m12 s12">
					<div class="item-content lista-cara nomargin">
              <figure-anterior class="hide-on-small-only">
                <?php echo get_avatar( $comment, 60 ); ?>
              </figure-anterior>
                <ul>
                  <li>
                    <p class="nomargin text-redes" style="margin-top:20px;">POR: <?php the_author_posts_link() ?> // <time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time></p>
                  </li>
                  <li>
                    <p class="nomargin text-redes"><i class="fa fa-facebook" aria-hidden="true"></i><?php echo ' '  . esc_attr( get_the_author_meta( 'facebook' ) ); ?></p>
                  </li>
                  <li>
                    <p class="nomargin text-redes"><i class="fa fa-instagram" aria-hidden="true"></i><?php echo ' '  . esc_attr( get_the_author_meta( 'instagram' ) ); ?></p>
                  </li>
                  <li>
                    <p class="nomargin text-redes"><i class="fa fa-twitter" aria-hidden="true"></i><?php echo ' '  . esc_attr( get_the_author_meta( 'twitter' ) ); ?></p>
                  </li>
                </ul>
              </div>
				</div>
			</div>
		</div>
<div class="col s12 m12 l12">
	<div class="col l10 offset-l1 m12 s12">
	<?php 
		$video = get_post_meta($post->ID, 'video1', true);
    		if (!empty($video)){  
    			//echo "El valor de campo es = " . $video;
    			echo "<iframe class='video' height='554' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
    			}else{
					if (has_post_thumbnail()) {
				          $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );                    
				          //echo "<img src='". $url."' class='img_articulos_bg' />";
				          echo '<li class="fondo-pagevideo" style="background: url('. $url.')">';
           
    							}
					} ?>
	</div>
</div>
<div class="col s12 m12 l12">
	<div class="col l10 offset-l1 m12 s12">
		<div class="col l6 m6 s6 tags-compartir" style="padding-top: 15px;">
			<span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
      		<span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
		</div>
	</div>
</div>
<div class="col l10 offset-l1 m12 s12">
	<div class="col s12 m6 l6">
		<div class="col l12 m12 s12 texto-contenido imagenvideopage">
			<?php echo the_content() ?>
		</div>
		<div class="col l12 m12 s12 margin-70 nopadding">
			<form>
				<div class="fb-comments" data-href="http://localhost/wpgaston/" data-width="550" data-numposts="5"></div>
      <!--<div class="fb-comments" data-href="http://capa2.developer.velosoft.net/gaston/" data-width="500" data-numposts="5"></div>--> 
			</form>				
		</div>
	</div>
	<div class="col l6 center texto-tags">
		<p class="nomargin borde-tags">TAGS</p>
		<div class="col l12 pleca-tags">
			<?php the_tags('<li class="tag">','</li><li class="tag">','</li>'); ?>
		</div>
		<div class="col l12 m12 s12 tags" style="margin-top:50px;">
			<p class="nomargin borde-tags">VIDEOS SUGERIDOS</p>
			<img src="<?php bloginfo('template_url'); ?>/images/video-anterior/video7.png" alt="">
		</div>
		<div class="col l12 m12 s12 text-imagen">
			<p>Los libros para emprenderores que marcaron mi vida</p>
		</div>
		<div class="col l12 m12 s12 tags-comentario">
			<p>
				1,200 reproducciones
			</p>
		</div>
		<div class="row">
			<div class="col l12 m12 s12 tags-flecha">
				<div class="col l6 m6 s6">
					<p>
						<i class="material-icons">keyboard_backspace</i> Anterior
					</p>
				</div>
				<div class="col l6 m6 s6">
					<p>
						Siguiente <i class="material-icons">arrow_forward</i>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
----


	<?php endforeach; ?>
	>	
</div>

<?php
  get_footer();
?>