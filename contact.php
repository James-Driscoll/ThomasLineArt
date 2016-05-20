<?php
/**
 * Template Name: Contact
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

 get_template_parts( array( 'header') );

 if ( have_posts() ) while ( have_posts() ) : the_post();

     $page_heading = get_field('page_heading');
     $page_content = get_field('page_content'); ?>

 	<h2><?php echo $page_heading; ?></h2>
     <div><?php echo $page_content; ?></div>

 <?php endwhile;

 get_template_parts( array( 'footer' ) ); ?>
