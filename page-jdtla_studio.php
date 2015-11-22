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


<div class="left-side side all">
  <div class="logoWrapper">
	<a href="<?php echo get_site_url(); ?>">
	  <img class="logo "height="152" width="200" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-medium.png" alt="Thomas Line Art">
	</a>
  </div>
  <div class="nav">
	<?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
  </div>
</div>

<div class="centre all">
	<div class="container">
		<div class="cp-page">

			<?php $query = new WP_Query( array('post_type' => 'jdtla_studio', 'posts_per_page' => 1000 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<a class="item" href="<?php the_permalink() ?>">
					<?php the_post_thumbnail('medium'); ?>
				</a>

				<?php  wp_reset_postdata();
			endwhile; ?>
		</div>
	</div>
</div>

<div class="right-side side all">
  <div class="social">
	<ul>
	  <li><a href="https://instagram.com/tomline92/" target="_blank"><i class="fa fa-instagram"></i></a></li>
	  <li><a href="https://twitter.com/TomLine3" target="_blank"><i class="fa fa-twitter"></i></a></li>
	  <li><a href="https://vimeo.com/thomasline" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
	</ul>
  </div>
</div>



<?php //Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>
