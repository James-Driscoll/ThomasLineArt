<?php

  error_reporting(E_ALL); //Turn on Error reporting

  /* Starkers Items*/
  require_once( 'external/starkers-utilities.php' );
  add_filter( 'body_class', 'add_slug_to_body_class' );


  /* --------------------------------------------------
  Location Rewriting based on the URL, including templating!
  -----------------------------------------------------*/

  // REWRITE RULES
  add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
  add_filter('query_vars','wp_insertMyRewriteQueryVars');
  add_filter('init','flushRules');

  // Remember to flush_rules() when adding rules
  function flushRules(){
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
  }

  // Adding a new rule
  function wp_insertMyRewriteRules($rules){
    $newrules = array();
    //If the URL matches any of the locations, do an internal re-write.
    $locations = require("locations.php");
    $newrules['(.?.+?)(/[0-9]+)?/('.$locations.')'] = 'index.php?pagename=$matches[1]&page=$matches[2]&placename=$matches[3]';
    return $newrules + $rules;
  }

  // Adding the id var so that WP recognizes it
  function wp_insertMyRewriteQueryVars($vars){
    array_push($vars, 'placename');
    return $vars;
  }

  //Modify buffer here, and then return the updated code
  function location_callback($buffer) {
    //{##around #location# and surrounding areas##|## or this ##}
    $location = get_query_var("placename");
    
    //Replace any instances of #location# with the actual location (based on the URL)
    $location = str_replace("-"," ",$location);
    $location = ucwords($location);

    //We have a location! lets remove the stuff we don't want (from the | onwards)
    $buffer = str_replace('$location',$location,$buffer);
    if (strlen($location)){
      $buffer = preg_replace("/\|(.*?)}%/","%",$buffer);
    } else {
      $buffer = preg_replace("/%{(.*?)}\|/","%",$buffer);
    }
      $buffer = str_replace(array("%{","}%"),"",$buffer);
    return $buffer;
  }

  function buffer_start() { ob_start("location_callback"); }
  function buffer_end() { ob_end_flush(); }

  add_action('wp', 'buffer_start');
  add_action('wp_footer', 'buffer_end');

  /* -------------------------------------------------------
  	Post Thumbnails
  ------------------------------------------------------- */
  add_image_size( 'post-background', 960, 345, true );
  add_image_size( 'post-large', 450, 350, true );
  add_image_size( 'post-medium', 230, 230, true );
  add_image_size( 'post-small', 60, 60, true );
  add_image_size( 'post-thumb', 100,100, true );

  add_image_size( 'page-heading', 580, 260, true );
  add_image_size( 'page-casestudy', 221, 105, true );

  /* --------------------------------------------------
   * Register Custom Menu
    -------------------------------------------------- */
  register_nav_menus(
          array(
              'top_navigation' => "Main Navigation Menu",
          )
      );

  /* -------------------------------------------------------
      Custom Post Types
  ------------------------------------------------------- */
  //hook into the init action and call create_book_taxonomies when it fires
  add_action( 'init', 'create_post_types');

  //create two taxonomies, genres and writers for the post type "book"
  function create_post_types() {

    /* ------------------------
    Client Post Type
    --------------------------*/
    $labels = array(
      'name' => 'Studios & Research',
      'singular_name' => 'Studio & Research',
      'add_new' => 'New Studio & Research',
      'add_new_item' => 'Add New Studio & Research',
      'edit_item' => 'Edit Studio & Research',
      'new_item' => 'New Studio & Research',
      'all_items' => 'All Studios & Research',
      'view_item' => 'View Studio & Research',
      'search_items' => 'Search Studios & Research',
      'not_found' =>  'No tudios & Research found',
      'not_found_in_trash' => 'No Studios & Research found in trash',
      'parent_item_colon' => '',
      'menu_name' => 'Studios & Research'
    );
    
    $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'studio'),
      'capability_type' => 'post',
      'has_archive' => true,
      'show_in_admin_bar' => true,
      'hierarchical' => false,
      'menu_position' => 4,
      'supports' => array( 'title'),
      'menu_icon' => get_stylesheet_directory_uri()."/images/admin/studio.png",
    );

    register_post_type('product', $args);

  }

  /* --------------------------------------------------
   Custom Categories
  -----------------------------------------------------*/
  //hook into the init action and call create_book_taxonomies when it fires
  add_action( 'init', 'create_category_taxonomies', 0 );

  //create two taxonomies, genres and writers for the post type "book"
  function create_category_taxonomies()   {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name' => "Product Categories",
      'singular_name' => "Category",
      'search_items' =>  "Search Categories",
      'all_items' => "All Product Categories",
      'parent_item' => "Parent Category",
      'parent_item_colon' => "Parent Category:",
      'edit_item' => "Edit Category",
      'update_item' => "Update Category",
      'add_new_item' => "Add New Category",
      'new_item_name' => "New Category",
      'menu_name' => "Categories",
    );

    register_taxonomy('categories','product', array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'uqery_var' => true,
      'rewrite' => array( 'slug' => 'categories' ),
    ));
  }

  /* -------------------------------------------------------
      Custom Meta
  ------------------------------------------------------- */
  // Re-define meta box path and URL
  define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri())."meta/" );
  define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH  )."meta/" );

  add_action( 'init', 'create_metaboxes');

  function create_metaboxes(){
    require "meta/meta-box.php";
    $prefix     = 'p';
    $meta_boxes[] = array(
      'id'    => $prefix . 'pricing',
      'title' => 'Pricing & Range',
      'pages' => array( 'product'),
      'fields' => array(
        array(
          'name' => "Current Price:",
          'id' => $prefix."price-current",
          "type" => "text"
        ),
        array(
          'name' => "Old Price:",
          'id' => $prefix."price-old",
          "type" => "text"
        ),
        array(
          'name' => "Range:",
          'id' => $prefix."range",
          "type" => "text"
        ),
        array(
          'name'             => 'Gallery:',
          'id'               => $prefix . 'images',
          'type'             => 'plupload_image',
          'max_file_uploads' => 16,
        ),
      )
    );

    $meta_boxes[] = array(
      'id'    => $prefix . 'quantity',
      'title' => 'Quantity',
      'pages' => array( 'product'),
      'fields' => array(
        array(
          'name' => "Bottle Quantity",
          'id' => $prefix."bottle-quantity",
          "type" => "text"
        ),
        array(
          'name' => "Unit",
          'id' => $prefix."unit",
          "type" => "text"
        ),
      )
    );

    $meta_boxes[] = array(
      'id'    => $prefix . 'background',
      'title' => 'Background Image',
      'pages' => array( 'product','page'),
      'context' => 'side',
      'priority' => 'low',
      'fields' => array(
        array(
          'name' => "",
          'id' => $prefix."background",
          "type" => "plupload_image",
          "max_file_uploads" => 1
        ),
      )
    );

    if (class_exists( 'RW_Meta_Box' )) {
      foreach ( $meta_boxes as $meta_box ) {
        new RW_Meta_Box( $meta_box );
      }
    }
  }



  //Make the site private
  function is_local(){
    $whitelist = array('127.0.0.1');
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
  }

  function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
  }

  if (isset($_GET["importer"])) {
    require "importer.php";
  }