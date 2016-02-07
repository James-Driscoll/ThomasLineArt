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

<?php get_template_parts( array( 'parts/html-header') ); ?>

<div class="embed-responsive embed-responsive-16by9 container">
    <a href="https://vimeo.com/thomasline" target="_blank">
        <iframe src="https://player.vimeo.com/video/146631709" width="800" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </a>
</div>

<?php get_template_parts( array( 'parts/html-footer') ); ?>
