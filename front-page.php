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

  <?php
  //Get the Header
  get_template_parts( array( 'parts/html-header') );
  ?>

    <div class="embed-responsive embed-responsive-16by9">
      <a href="https://vimeo.com/thomasline" target="_blank">
        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/146631709?title=0&byline=0&portrait=0" width="700" height="394" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </a>
    </div>

  <?php
  //Get the Footer
  get_template_parts( array( 'parts/html-footer') );
  ?>
