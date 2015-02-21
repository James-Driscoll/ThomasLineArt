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

<div class="page-work container">
		 
	<?php
	$taxonomy = 'jdtla_work_categories';
	$terms = get_terms($taxonomy); // Get all terms of a taxonomy

	foreach ( $terms as $term ) { ?>	
		<h1 class="pc-title"><?php echo $term->name; ?></h1>
		<?php query_posts( array( 'post_type' => 'jdtla_work', $taxonomy => $term->name) );
	  	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  		<a class="item" href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('medium'); ?>
			</a>
		<?php endwhile; endif; wp_reset_query();
	} ?>

</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>