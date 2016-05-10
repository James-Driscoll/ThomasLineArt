<?php
  /**
   * Template Name: Homepage
   *
   * @package     WordPress
   * @subpackage  Starkers
   * @since       Starkers 4.0
   *
   * Please see /external/starkers-utilities.php for info on get_template_parts()
   */
?>

<body <?php body_class(); ?> id="body-background">

<?php get_template_parts( array( 'header') ); ?>

<div class="embed-responsive embed-responsive-16by9">
    <a href="https://vimeo.com/thomasline" target="_blank">
        <iframe src="<?php the_field('vimeo_video_embed'); ?>" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </a>
</div>

<?php get_template_parts( array( 'footer') ); ?>
