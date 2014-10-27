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
			<?php $title = False; ?>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post();
				if (pa_in_taxonomy("categories", "video")) {
					if ($title == False) { ?>
						<h1 class="pc-title">Video</h1>
						<?php $title = True;
					} ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
				<?php  wp_reset_postdata(); ?>
			<?php endwhile; ?>
		</div>

		<div class="pc pc-2">
			<?php $title = False; ?>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post();
				if (pa_in_taxonomy("categories", "2-D")) {
					if ($title == False) { ?>
						<h1 class="pc-title">2-D</h1>
						<?php $title = True;
					} ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
				<?php  wp_reset_postdata(); ?>
			<?php endwhile; ?>
		</div>

		<div class="pc pc-3">
			<?php $title = False; ?>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post();
				if (pa_in_taxonomy("categories", "3-D")) {
					if ($title == False) { ?>
						<h1 class="pc-title">3-D</h1>
						<?php $title = True;
					} ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
				<?php  wp_reset_postdata(); ?>
			<?php endwhile; ?>
		</div>

		<div class="pc pc-4">
			<?php $title = False; ?>
			<?php $query = new WP_Query( array('post_type' => 'jdtla_work', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post();
				if (pa_in_taxonomy("categories", "installation")) {
					if ($title == False) { ?>
						<h1 class="pc-title">Installation</h1>
						<?php $title = True;
					} ?>
					<a class="work-item" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
				<?php  wp_reset_postdata(); ?>
			<?php endwhile; ?>
		</div>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>