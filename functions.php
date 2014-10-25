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
  add_theme_support( 'post-thumbnails' ); 


  /* --------------------------------------------------
   * Register Custom Menu
    -------------------------------------------------- */
  register_nav_menus(
    array(
      'top_navigation' => "Top Navigation Menu"
    )
  );


  /* -------------------------------------------------------
      Custom Post Types
  ------------------------------------------------------- */
  //hook into the init action and call create_book_taxonomies when it fires
  add_action( 'init', 'custom_post_studio');
  add_action( 'init', 'custom_post_work');

  function custom_post_studio() {

    // creating (registering) the custom type 
    register_post_type( 'jdtla_studio', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
      // let's now add all the options for this post type
      array('labels' => array(
        'name' => __('Studios', 'post type general name'), /* The Title of the Group */
        'singular_name' => __('Custom Post', 'post type singular name'), /* The individual type */
        'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
        'add_new_item' => __('Add New Studio'), /* Add New Display Title */
        'edit' => __( 'Edit' ), /* Edit Dialog */
        'edit_item' => __('Edit Studio'), /* Edit Display Title */
        'new_item' => __('New Studio'), /* New Display Title */
        'view_item' => __('View Studios'), /* View Display Title */
        'search_items' => __('Search Studios'), /* Search Custom Type Title */ 
        'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
        'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
        'parent_item_colon' => ''
        ), /* end of arrays */
        'description' => __( 'This is the Studio custom post type.' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array( 'title', 'editor', 'thumbnail')
      ) /* end of options */
    ); /* end of register post type */

  }

  function custom_post_work() {

    // creating (registering) the custom type 
    register_post_type( 'jdtla_work', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
      // let's now add all the options for this post type
      array('labels' => array(
        'name' => __('Works', 'post type general name'), /* The Title of the Group */
        'singular_name' => __('Custom Post', 'post type singular name'), /* The individual type */
        'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
        'add_new_item' => __('Add New Work'), /* Add New Display Title */
        'edit' => __( 'Edit' ), /* Edit Dialog */
        'edit_item' => __('Edit Work'), /* Edit Display Title */
        'new_item' => __('New Work'), /* New Display Title */
        'view_item' => __('View Work'), /* View Display Title */
        'search_items' => __('Search Works'), /* Search Custom Type Title */ 
        'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
        'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
        'parent_item_colon' => ''
        ), /* end of arrays */
        'description' => __( 'This is the Work custom post type.' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array( 'title', 'editor', 'thumbnail')
      ) /* end of options */
    ); /* end of register post type */

  } 

  /* --------------------------------------------------
   Custom Work Categories
  -----------------------------------------------------*/
  //hook into the init action and call create_book_taxonomies when it fires
  add_action( 'init', 'create_category_taxonomies', 0 );

  //create two taxonomies, genres and writers for the post type "book"
  function create_category_taxonomies()   {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name' => "Work Categories",
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

    register_taxonomy('categories','jdtla_work', array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'uqery_var' => true,
      'rewrite' => array( 'slug' => 'categories' ),
    ));
  }


  /* -------------------------------------------------------
      Make the site private
  ------------------------------------------------------- */
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