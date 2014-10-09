<?php
/*
 *
 * Template Name: Studio
 * 
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<div class="container">
	<div class="studio">

		<?php $query = new WP_Query( array('post_type' => 'jdtla_studio', 'posts_per_page' => 1000 ) );
		while ( $query->have_posts() ) : $query->the_post(); ?>

			<a class="studio-item" href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('medium'); ?>
			</a>

			<?php  wp_reset_postdata();

		endwhile; ?>
	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>