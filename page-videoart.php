<?php
/*
 *
 * Template Name: Video Art
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

get_template_parts( array( 'header') );

$query = new WP_Query( array('post_type' => 'videoart', 'posts_per_page' => 1000 ) );
while ( $query->have_posts() ) : $query->the_post();
	get_template_parts( array( 'video') );
endwhile;

get_template_parts( array( 'footer') ); ?>
