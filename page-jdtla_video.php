<?php
/*
 *
 * Template Name: Video Art
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

get_template_parts( array( 'parts/html-header') ); ?>

		<?php $query = new WP_Query( array('post_type' => 'jdtla_video', 'posts_per_page' => 1000 ) );
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="video">
				<iframe id="vim_vid" class="feature" src="<?php the_field('vimeo_video_embed'); ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="video_details">
					<strong class="video_camera"><?php the_field('camera'); ?></strong>, <span class="video_duration"><?php the_field('duration'); ?></span>
					<span class="video_tags"><?php the_field('tags'); ?></span>
					<h3 class="video_synopsis-title">Synopsis -</h3>
					<p class="video_synopsis-text"><?php the_content(); ?></p>
				</div>
				<?php  wp_reset_postdata(); ?>
			</div>
		<?php endwhile; ?>


<?php get_template_parts( array( 'parts/html-footer') ); ?>
