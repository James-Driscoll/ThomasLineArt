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

<?php
$meta = rwmb_meta("studio_images");
$image = array("none.jpg");
if ($meta) {
    $image = wp_get_attachment_image_src($meta,"post-medium");
} ?>

<ul class="studio-item">
	<li class="studio-image"><a href="#"><img src="<?php echo $image[0]; ?>" height="230" width="230" /></a></li>
	<li class="studio-title"><h2><?php the_title(); ?></h2></li>
</ul>

<?php  wp_reset_postdata(); ?>
<?php endwhile;

//Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>