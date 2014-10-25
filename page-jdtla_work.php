<?php
/*
 *
 * Template Name: Work
 * 
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<div class="container">
	<div class="page-studio">

		<div class="pc pc-1">
			<h1>Video</h1>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php if (pa_in_taxonomy("categories", "video")) { ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>

				<?php  wp_reset_postdata();

			endwhile; ?>
		</div>

		<div class="pc pc-2">
			<h1>2-D</h1>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php if (pa_in_taxonomy("categories", "2-D")) { ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>

				<?php  wp_reset_postdata();

			endwhile; ?>
		</div>

		<div class="pc pc-3">
			<h1>3-D</h1>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php if (pa_in_taxonomy("categories", "3-D")) { ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>

				<?php  wp_reset_postdata();

			endwhile; ?>
		</div>

		<div class="pc pc-4">
			<h1>Instalation</h1>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php if (pa_in_taxonomy("categories", "installation")) { ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>

				<?php  wp_reset_postdata();

			endwhile; ?>
		</div>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>