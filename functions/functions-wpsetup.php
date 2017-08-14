<?php
/**
 * WordPress Setup including
 * menus, theme-support settings, general settings and a wp_head cleaner
 *
 * @author      Flurin Dürst
 * @version     1.7.0
 * @since       WPSeed 0.1.6
 *
 */


/* THEME SETUP
/===================================================== */

  /* ENQUEUE SCRIPTS
  /------------------------*/
  // enqueue sctipts
  // » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  function wpseed_enqueue_scripts_and_styles() {
    # jquery.js (from wp core)
    wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4');
    wp_enqueue_script( 'jquery' );
    # main.js
    wp_register_script('wpseed/scripts', get_template_directory_uri() . '/dist/script.min.js', false, array( 'jquery' ), true);
    wp_enqueue_script('wpseed/scripts');
    # wow.js
    wp_register_script('wowjs', get_template_directory_uri() . '/bower_components/wow/dist/wow.min.js', false, array( 'wowjs' ), true);
    wp_enqueue_script('wowjs');
    # main.css
    wp_enqueue_style('wpseed/styles', get_template_directory_uri() . '/dist/style.min.css', false, null);
    # fonts
    wp_enqueue_style('google/fonts', 'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700', false, null);
  }
  add_action('wp_enqueue_scripts', 'wpseed_enqueue_scripts_and_styles');

  /* SETUP WP-MENUS
  /------------------------*/
  // » https://codex.wordpress.org/Function_Reference/register_nav_menus
  function register_theme_menus() {
    register_nav_menus([
      'mainmenu' => __('Mainmenu'),
      'submenu' => __('Submenu')
    ]);
  }
  add_action( 'init', 'register_theme_menus');


/* THEME SUPPORT
/===================================================== */

  /* GENERAL
  /---------------------------------*/
  function wpseed_theme_features()  {

    // Enable plugins to manage the document title
    // » http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support( 'title-tag');

    // Add Theme Support for Menus
    // » http://codex.wordpress.org/Navigation_Menus
    add_theme_support('menus');

    // Add Theme Support for Post thumbnails
    // » http://codex.wordpress.org/Post_Thumbnails
    // » http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // » http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

  }
  add_action( 'after_setup_theme', 'wpseed_theme_features');


/* GENERAL SETTINGS
/===================================================== */

  /* Time, Locale, Language
  /------------------------*/
  // Define Local Time, Date and Language-Location
  // » http://php.net/manual/de/function.setlocale.php
  setlocale(LC_ALL, 'de_CH.UTF-8');

  // Load theme textdomain (based on locale de_CH)
  // » https://codex.wordpress.org/Function_Reference/load_theme_textdomain
  load_theme_textdomain('WPSeed', get_template_directory() . '/languages');

  /* Disable Backend Theme-Editor
  /------------------------------*/
  function remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
  }
  add_action('_admin_menu', 'remove_editor_menu', 1);

  /* Disable Admin Bar
  /------------------------------*/
  add_filter('show_admin_bar', '__return_false');

  /* Set image processing quality to 100%
  /-------------------------------------*/
  add_filter('jpeg_quality', function($arg){return 100;});
  add_filter( 'wp_editor_set_quality', function($arg){return 100;});

  /* Remove html hardcoded thumbnail dimensions (for CSS-Scaling of Images)
  /------------------------------------------------------------------------*/
  function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
  }
  add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* WPHEAD CLEANUP
/===================================================== */
// removes unused stuff from wp_head()
function wphead_cleanup () {
  // remove the generator meta tag
  remove_action('wp_head', 'wp_generator');
  // remove wlwmanifest link
  remove_action('wp_head', 'wlwmanifest_link');
  // remove RSD API connection
  remove_action('wp_head', 'rsd_link');
  // remove wp shortlink support
  remove_action('wp_head', 'wp_shortlink_wp_head');
  // remove next/previous links (this is not touching blog-posts)
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  // remove generator name from RSS
  add_filter('the_generator', '__return_false');
  add_filter('show_admin_bar','__return_false');
  // disable emoji support
  remove_action( 'wp_head', 'print_emoji_detection_script', 7);
  remove_action( 'wp_print_styles', 'print_emoji_styles');
  // disable automatic feeds
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
  // remove rest API link
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
  // remove oEmbed link
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('wp_head', 'wp_oembed_add_host_js');
  // remove canonical links
  remove_action('wp_head', 'rel_canonical');
}
add_action('after_setup_theme', 'wphead_cleanup');


?>
