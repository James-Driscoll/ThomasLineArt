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

<div class="centre all container">
	<div class="">
		<div class="video-page">
			<?php $query = new WP_Query( array('post_type' => 'jdtla_video', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="video">
					<iframe class="feature" src="<?php the_field('video_embed'); ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<div class="video_details">
						<strong class="camera"><?php the_field('camera'); ?></strong>, <span class="video_duration"><?php the_field('duration'); ?></span>
						<h3 class="synopsis-title">Synopsis -</h3>
						<p class="synopsis-text"><?php the_content(); ?></p>
					</div>
					<?php  wp_reset_postdata(); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>


<?php get_template_parts( array( 'parts/html-footer') ); ?>
