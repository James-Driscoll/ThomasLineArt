<?php
/**
 * 
 * This is the template for displaying a single Work custom post type.
 * 
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<div class="container">
	<div class="cp-single">
            
	    <?php if (have_posts()) ?>
	        <?php while (have_posts()) : the_post(); ?>

				<?php the_post_thumbnail('large'); ?>
				<h1 class="title"><?php the_title(); ?></h1>
				<h3 class="description"><?php the_content(); ?></h3>

 			<?php endwhile; ?>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>