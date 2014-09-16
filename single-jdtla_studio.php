<?php
/**
 * 
 * This is the template for displaying a single Studio custom post type.
 * 
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<div class="container">
	<div class="studio">

			<a class="studio-item" href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full'); ?>
				<h2 class="studio-title"><?php the_title(); ?></h2>
			</a>

	</div>
</div>

<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>