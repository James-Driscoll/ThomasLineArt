<?php
/**
 * Template Name: Index Template
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//Get the header(s)
get_template_parts( array( 'parts/html-header') ); ?>


    <div class="content">
        <div class="container">
            
            <?php if (have_posts()) ?>
              <?php while (have_posts()) : the_post(); 
                $meta = rwmb_meta("pimages");
                $image = array("none.jpg");
                  if ($meta) {
                    $image = wp_get_attachment_image_src($meta,"post-thumb");
                  }
            ?>
                    
        <div class="studio-image">
            <?php
              if ($image) {
            ?>
            
            <img src="<?php echo $image[0]; ?>"> 

            <?php
              }
            ?>

        </div>

        <div  class="blog-item" <?php post_class(); ?>>
            <a class="item" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starkers' ), the_title_attribute( 'echo=0' ) ); ?><i><?php echo get_the_date("d"); ?></i>">
                <h2 class="blog-title"><?php the_title(); ?></h2>
                <h3 class="blog-date"><?php echo mysql2date('l j M Y - h:i:s', $post->post_date); ?></h3>
                <h4 class="blog-copy"><?php the_excerpt(); ?></h4>
            </a>
        </div>

          <?php endwhile; ?>
        </div>
   </div>

 <?php 
   //Get the footer(s)
   get_template_parts( array( 'parts/footer','parts/html-footer' ) );
?>