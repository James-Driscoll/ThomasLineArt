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
      <div class="videoWrapper">
        <a href="https://vimeo.com/thomasline" target="_blank">
          <iframe src="https://player.vimeo.com/video/137009360?autoplay=1&loop=1" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </a>
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

<?php
//Get the footer
get_template_parts( array( 'parts/html-footer') );
?>
