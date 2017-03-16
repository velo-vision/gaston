<?php get_header(); ?>
<!-- Contenido del post -->
<?php if ( have_posts() ) : the_post(); ?>

  <div class="row">
      <div class="col l10 offset-l1 m12 s12">
        <div class="col l12 m12 s12 titulo-anterior nomargin">
          <h1 style="text-transform: capitalize;"><?php the_title(); ?></h1>
        </div>
        <div class="col l12 m12 s12 Subtitulo-informacion nomargin">
          <div class="col l12 m12 s12 nomargin">
            <div class="item-content lista-cara nomargin"> 
                <ul>
                <li>
                  <?php the_author_image_size($width, $height, $author_id = null); ?>
                </li>
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
    </div>
    <div class="row">
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
    <div class="row nomargin">
      <div class="col l10 offset-l1">
        <div class="col l6 m12 s12 tags-compartir" style="padding: 15px;">
          <!--<p class="nomargin"><i class="fa fa-share-alt" aria-hidden="true"></i>compartir</p> -->
          <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
          <span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col s12 m12 l10 offset-l1">
    		<div class="col s12 m6 l6 nopadding">
    			<div class="col l12 texto-contenido  imagenvideopage">
    				<p class="margin-30"><?php the_content(); ?>
    				</p>
    			</div>
    			<div class="col l12 m12 s12">
    				<form><!--cometarios face-->
    				<div class=" s12 m12 l12fb-comments" data-href="http://capa2.developer.velosoft.net/gaston/" data-width="500" data-numposts="5"></div>
              <!--<div class="fb-comments" data-href="http://capa2.developer.velosoft.net/gaston/" data-width="500" data-numposts="5"></div>--> 
    				</form>                       
    			</div>          
    		</div>
     
        <?php else : ?>
          <p><?php ('Ups!, esta entrada no existe.'); ?></p>
        <?php endif; ?>
        <!---->
        <div class="col s12 m6 l6 center texto-tags">
          <p class="nomargin borde-tags">TAGS</p>
          <div class="col l12 m12 s12 pleca-tags">
            <ul class="tags">
              <?php the_tags('<li class="tag">','</li><li class="tag">','</li>'); ?>
            </ul>
          </div>
          <div class="col l12 m12 s12 tags" style="margin-top:50px;">
            <p class="nomargin borde-tags">ARTÍCULOS SUGERIDOS</p>
          </div>
          <div class="col l12 m12 s12 text-imagen slider-articulos slider-single-taps"><!---->
          
            <?php 
           // $ran=mt_rand(8,12);
            //echo $ran;    
            $args = array( "posts_per_page" => 3, "offset"=>0, "the_category" =>1,);
            $myposts = get_posts( $args ); ?>
            <ul id="sliderseis">            
          <?php           
          foreach( $myposts as $post ) : setup_postdata($post);?>
          <li>
            <div class="col l12 m12 s12 historial">           
              <a href="<?php the_permalink(); ?>" style="color:#000;" >               
              <div class="col l12 m12 s12">
              <div class="s12 m12 l12">
                  <?php $video = get_post_meta($post->ID, 'video1', true);
                    if (!empty($video)){                
                        echo "<iframe class='video2' height='554' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
                    }else{
                        if (has_post_thumbnail()){
                            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );                    
//echo "<img src='". $url."' class='img_articulos_bg' />";
                            echo '<li class="fondo-pagevideo2" style="background: url('. $url.')">';   
                        }
                    } ?>
                </div>
                <div class="col l12 historial-title">
                  <p><?php the_title(); ?></p>
                </div>            
              </div>
              </a>            
            </div>
            </li>
            <?php endforeach; ?>            
            </ul>
          </div>
          <div class="col l12 m12 s12 tags-flecha" style="padding: 0px;">
            <div class="col l6 m6 s6">
              <i class="material-icons .hide-on-small-only">keyboard_backspace</i><span>Anterior</span>
            </div>
            <div class="col l6 m6 s6">

              <p class="flechas-mov">Siguiente <i class="material-icons .hide-on-small-only">arrow_forward</i></p>
            </div>
          </div>
        </div>
    					
    		<!---->
    	</div>
    </div>
<!--<section>

 
    <h1><?php //the_title(); ?></h1>
    <time datatime="<?php //the_time('Y-m-j'); ?>"><?php// the_time('j F, Y'); ?></time>
    <?php //the_category (); ?>
    <?php //the_content(); ?>
    <?php //the_tags('<ul><li>','</li><li>','</li></ul>'); ?>  
    <address>Por <?php //the_author_posts_link() ?></address> 
  
  
  </section> -->
 <?php //wp_link_pages(); 
 ?>


<?php get_footer(); ?>