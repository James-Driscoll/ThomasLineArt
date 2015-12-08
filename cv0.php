<?php
/**
 * Template Name: CV
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//Get the header(s)
get_template_parts( array( 'parts/html-header') );

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="content page-cv">
   	<h2 class="description"><?php echo the_content(); ?></h2>
</div>


 <?php endwhile;
 //Get the footer(s)
 get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>
