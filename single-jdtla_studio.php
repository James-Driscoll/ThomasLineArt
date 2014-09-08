<?php
/**
 * Template Name: Studio & Research
 * 
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

<a class="container studio-item" href="#">
	<img class="studio-image" src="<?php echo $image[0]; ?>" height="230" width="230">
	<h2 class="studio-title"><?php the_title(); ?></h2>
</a/

<?php  wp_reset_postdata(); ?>
<?php endwhile;

//Get The Footer
get_template_parts( array( 'parts/html-footer') ); ?>