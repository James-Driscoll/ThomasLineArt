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
    //Get the header
    get_template_parts( array( 'parts/html-header') );
    ?>

    <div class="left-side">

      <div class="logo">
        <a href="<?php echo get_site_url(); ?>">
          <img height="" width="140" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-smaller.png" alt="Thomas Line Art">
        </a>
      </div>

      <div class="navWrapper">
        <?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
      </div>

      <div class="social">
        <ul>
          <li><a href="https://instagram.com/tomline92/" target="_blank"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://twitter.com/TomLine3" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://vimeo.com/thomasline" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
          <li><a href="https://www.facebook.com/ThomasLineFilmmaker" target="_blank"><i class="fa fa-facebook"></i></a></li>
        </ul>
      </div>

    </div>


    <div class="right-side">
      <div class="inner-container">
        <div class="embed-responsive embed-responsive-16by9">
          <a href="https://vimeo.com/thomasline" target="_blank">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/146631709?title=0&byline=0&portrait=0" width="700" height="394" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </a>
        </div>
      </div>


<?php
//Get the footer
get_template_parts( array( 'parts/html-footer') );
?>
