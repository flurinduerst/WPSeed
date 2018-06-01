<?php
/**
 * WordPress-setup including settings, wp-setup, theme support, cleanups
 *
 * @author      Flurin Dürst
 * @version     1.12.0
 * @since       WPSeed 0.1.6
 *
 */


/*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
      1.1 Set Locale
      1.2 Preload Fonts
      1.3 Load OG Tags
      1.4 General Settings
  2.0 THEME SETUP
      2.1 Enqueue Scripts/Styles
      2.1 Setup WP-Menus
      2.3 Get Cache-Busted CSS-File
  3.0 THEME SUPPORT
  4.0 WPHEAD CLEANUP
==================================================================================*/



/*==================================================================================
  1.0 Theme Settings
==================================================================================*/


/* 1.1 SET LOCALE
/––––––––––––––––––––––––*/
// Define Local Time, Date and Language-Location
// » http://php.net/manual/de/function.setlocale.php
setlocale(LC_ALL, 'de_CH.UTF-8');

/* 1.2 PRELOAD FONTS
/––––––––––––––––––––––––*/
// (pre-)loads all fonts into the page header
// add your desired fonts and font-types into $font_names and $font_formats
function wpseed_load_fonts() {
  // define fonts
  $font_names = [
    'ubuntu-v11-latin-regular',
    'ubuntu-v11-latin-500',
    'ubuntu-v11-latin-700'
  ];
  // define font-formats for all fonts
  $font_formats = [
    'woff',
    'woff2'
  ];
  // define font folder
  $font_folder = '/dist/fonts/';
  // loop through fonts
  foreach($font_names as $font_name) {
    // loop through font-formats
    foreach($font_formats as $font_format) {
      $path = get_bloginfo('template_url').$font_folder.$font_name.'.'.$font_format;
      echo '<link rel="preload" href="'.$path.'" as="font" type="font/'.$font_format.'" crossorigin="anonymous">'."\r\n";
    }
  }
}


/* 1.3 LOAD OG Tags
/––––––––––––––––––––––––*/
// loads all open graph tags » http://ogp.me/
// use wpseed_load_ogtags(true) to also display the og:image tag
function wpseed_load_ogtags($ogimg = false) {
  echo '<meta property="og:title" content="'.get_bloginfo('name').'">
  <meta property="og:type" content="website">
  <meta property="og:url" content="'.get_bloginfo('url').'">
  <meta property="og:site_name" content="'.get_bloginfo('name').'">
  <meta property="og:description" content="'.get_bloginfo('description').'">';
  if ($ogimg) :
  echo '<meta property="og:image" content="'.get_bloginfo('template_url').'/dist/images/ogimg.jpg">
  <meta property="og:image:secure_url" content="'.get_bloginfo('template_url').'/dist/images/ogimg.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="400">
  <meta property="og:image:height" content="300">
  <meta property="og:image:alt" content="A shiny red apple with a bite taken out">';
  endif;
}


/* 1.4 GENERAL SETTINGS
/––––––––––––––––––––––––*/

// Load Textdomain (based on locale de_CH)
load_theme_textdomain('WPSeed', get_template_directory() . '/languages');

// Disable Backend Theme-Editor
function wpseed_remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'wpseed_remove_editor_menu', 1);

// Disable Admin Bar
add_filter('show_admin_bar', '__return_false');

// Reset Image-Processing
add_filter('jpeg_quality', function($arg){return 100;});
add_filter( 'wp_editor_set_quality', function($arg){return 100;});

// Reset thumbnail dimensions (for CSS-Scaling of Images)
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);



/*==================================================================================
  2.0 THEME SETUP
==================================================================================*/


/* 2.1 ENQUEUE SCRIPTS/STYLES
/––––––––––––––––––––––––*/
// enqueues  sctipts and styles
// » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function wpseed_enqueue_scripts_and_styles() {
  // jQuery (from wp core)
  wp_deregister_script( 'jquery' );
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4');
  wp_enqueue_script( 'jquery' );
  // scripts
  wp_register_script('wpseed/scripts', get_template_directory_uri() . '/dist/script.min.js', false, array( 'jquery' ), true);
  wp_enqueue_script('wpseed/scripts');
  // styles
  wp_enqueue_style('wpseed/styles', get_template_directory_uri() . wpseed_get_cachebusted_css(), false, null);
}
add_action('wp_enqueue_scripts', 'wpseed_enqueue_scripts_and_styles');


/* 2.2 SETUP WP-MENUS
/––––––––––––––––––––––––*/
// » https://codex.wordpress.org/Function_Reference/register_nav_menus
function wpseed_register_theme_menus() {
  register_nav_menus([
    'mainmenu' => __('Mainmenu'),
    'submenu' => __('Submenu')
  ]);
}
add_action( 'init', 'wpseed_register_theme_menus');


/* 2.3 GET CACHE-BUSTED CSS-FILE
/---------------------------*/
// get the url to the busted css-file, or the default css-file if working locally (on the TLD `.vm`)
// the busted css file is generated by `gulp cachebust` and is located through dist/rev-manifest.json
function wpseed_get_cachebusted_css() {
  $current_tld = substr(strrchr(get_bloginfo('url'),"."),1);
  if ($current_tld == 'vm') :
    $css_src = '/dist/style.min.css';
  else :
    $css_manifest_url = get_template_directory_uri() . '/dist/rev-manifest.json';
    $css_manifest_content = json_decode(file_get_contents($css_manifest_url), true);
    $css_src = '/dist/'.$css_manifest_content['style.min.css'];
  endif;
  return $css_src;
}



/*==================================================================================
  3.0 THEME SUPPORT
==================================================================================*/

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



/*==================================================================================
  4.0 WPHEAD CLEANUP
==================================================================================*/
// removes unused stuff from wp_head()

function wpseed_wphead_cleanup () {
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
add_action('after_setup_theme', 'wpseed_wphead_cleanup');


?>
