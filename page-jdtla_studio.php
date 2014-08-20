<?php
/**
 * Template Name: Studioos Page
 *
 * Selectable from a dropdown menu on the edit page screen.
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php

			 query_posts( 'post_type=jdtla_studio');

				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );
					
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php
get_footer();
