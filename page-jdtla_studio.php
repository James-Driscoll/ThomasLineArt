<?php
/**
 * Template Name: Studio & Research
 * 
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 */

//Get The Header
get_template_parts( array( 'parts/html-header') ); ?>

<?php
$query = new WP_Query( array('post_type' => 'jdtla_studio', 'posts_per_page' => 5 ) );
	while ( $query->have_posts() ) : $query->the_post(); ?>
<?php echo the_title(); ?>

<div class="entry-content">
 <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    }
      the_content();
    ?>
</div>

<?php  wp_reset_postdata(); ?>
<?php endwhile;

//Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>