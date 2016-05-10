<?php
/**
 * Template Name: About
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

 get_template_parts( array( 'header') );

 if ( have_posts() ) while ( have_posts() ) : the_post();

//    $title =
//    $image = ?>

	<h2><?php echo the_title(); ?></h2>
     <p><?php echo the_content(); ?></p>

  <?php endwhile;

  get_template_parts( array( 'footer' ) ); ?>
