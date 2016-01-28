<?php
/*
 *
 * Template Name: Video Art
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>


<div class="centre all">
	<div class="container">
		<div class="cp-page">
			<?php $query = new WP_Query( array('post_type' => 'jdtla_video', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<iframe src="<?php the_field('video_embed'); ?>" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<p><?php the_field('camera'); ?></p>
				<p><?php the_field('duration'); ?></p>
				<p><?php the_content(); ?></p>
				<?php  wp_reset_postdata();
			endwhile; ?>
		</div>
	</div>
</div>


<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>
