<?php
/*
 *
 * Template Name: Commercial
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

get_template_parts( array( 'header') );

$query = new WP_Query( array('post_type' => 'commercial', 'posts_per_page' => 1000 ) );
while ( $query->have_posts() ) : $query->the_post();
	get_template_parts( array( 'video') );
endwhile;

get_template_parts( array( 'footer') ); ?>
