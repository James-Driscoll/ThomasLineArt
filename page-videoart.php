<?php
/*
 *
 * Template Name: Video Art
 *
 * @package WordPress
 * @subpackage ThomasLineArt
 *
 */

get_template_parts( array( 'parts/html-header') ); ?>

<?php $query = new WP_Query( array('post_type' => 'videoart', 'posts_per_page' => 1000 ) );
while ( $query->have_posts() ) : $query->the_post();

	$vimeo = get_field('vimeo_video_embed', false, false);
	$camera = get_field('video_camera', false, false);
	$duration = get_field('video_duration', false, false);
	$tags = get_field('video_tags', false, false);
	$synopsis = get_field('video_synopsis', false, false); ?>

	<div class="video">
		<iframe id="vim_vid" class="feature" src="<?php echo $vimeo; ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		<div class="video_details">
			<strong class="video_camera"><?php echo $video_camera; ?></strong>, <span class="video_duration"><?php echo $video_duration; ?></span>
			<span class="video_tags"><?php echo $video_tags; ?></span>
			<h3 class="video_synopsis-title">Synopsis -</h3>
			<p class="video_synopsis-text"><?php echo $video_synopsis; ?></p>
		</div>
		<?php  wp_reset_postdata(); ?>
	</div>
<?php endwhile; ?>


<?php get_template_parts( array( 'parts/html-footer') ); ?>
