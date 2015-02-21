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
		 
	<?php
	$taxonomy = 'jdtla_work_categories';
	$terms = get_terms($taxonomy); // Get all terms of a taxonomy

	foreach ( $terms as $term ) { ?>
			
		Category: <?php echo $term->name; ?>	  
		<?php
		  query_posts( array( 'post_type' => 'jdtla_work', $taxonomy => $term->name) );
		  //the loop start here
		  if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
		  <h3><?php the_title(); ?></h3>
		  <?php the_post_thumbnail('medium'); ?>
		<?php endwhile; endif; wp_reset_query(); ?>


	<?php } ?>


	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>