
<?php
/**
Template Name: prensa
**/

  get_header();
?>

<!-- Inicia blog -->
<div class="row">
	<?php 
	global $post;
	$ran=mt_rand(10,12);
// $random=1;
	$args = array( "posts_per_page" => 3, "offset"=> 0, "category" => $ran);
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) : setup_postdata($post); ?>
	<div class="col l12 m12 s12 historial" style="margin-top:20px;">
		<a href="<?php the_permalink(); ?>" style="color:#000;" >
			<div class="col s12 m6 l6">
				<?php 
				if (has_post_thumbnail()) {
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );    								 
					//echo "<img src='". $url."' class='img_articulos_bg' />";
					echo '<li class="img_articulos_bg" style="background: url('. $url.')">';
				}?>
			</div></a>
			<div class="col s12 m6 l6 nopadding">
				<div class="col s12 m12 l12 nopadding">
					<div class="col s12 m12  l12 historial-title">
						<p><?php the_title(); ?></p>
					</div>
					<div class="col s12 m12 l12 nopadding">
						<div class="col l6 m6 s6 text-subtitle">
							<p><?php echo the_category() ?></p>
						</div>
						<div class="col l6 m6 s6 text-subtitle">
							<p><?php echo get_the_date( get_option('date_format') ); ?></p>
						</div>
					</div>					
					<div class="col l12 m12 s12 text-historial">
						<p><?php echo get_the_excerpt( get_the_ID() ) ?></p>
					</div>
					<div class="col l6 m6 s12 text-compartir">
						<span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
						<span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>


<!-- Fin Blog -->
<!-- Botones -->
<div class="row">
	<div class="col l4 offset-l4 m6 offset-m3 s12 articulos">
		<div class="col l12 m12 s12 center">
			<p>
				<!-- <i class="material-icons">keyboard_backspace</i> Más articulos <i class="material-icons">arrow_forward</i> -->
			</p>
		</div>
	</div>
</div>
<!-- Fin Botones -->
<?php
get_footer();
?>
