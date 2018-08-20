<?php
/**
 * The starting point for setting up a new theme.
 * Go through this file to setup your preferences
 *
 * @author      Flurin Dürst
 * @version     2.0.1
 * @since       WPSeed 0.1.6
 *
 * was part of 'functions-wpsetup.php' before 2.0.0
 *
 */


/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 LOCALE SETTING
  2.0 FONTS
  3.0 GOOGLE TAG MANAGER
  4.0 OPEN TAG IMAGE
  5.0 SETUP WP-MENUS
=======================================================*/



/*==================================================================================
  1.0 LOCALE SETTING
==================================================================================*/
// Define local time, date and language-location (PHP-only, does not affect WordPress)
// => http://php.net/manual/function.setlocale.php
setlocale(LC_ALL, 'de_CH.UTF-8');



/*==================================================================================
  2.0 FONTS
==================================================================================*/


/* TYPEKIT
/––––––––––––––––––––––––*/
// enqueue Typekit font-kits => WPSeed_enqueue()
// add your Typekit Kit-ID or leave empty to not enqueue any kit
$typekit_id = '';


/* SELF-HOSTED
/––––––––––––––––––––––––*/
// preload self-hosted fonts => WPSeed_preload_fonts()
// define font-names and font-formats for all fonts that need preloading (usally the same as in assets/styles/fonts.scss)
$font_names = ['asap-v7-latin-regular','asap-v7-latin-500','asap-v7-latin-700'];
$font_formats = ['woff','woff2'];



/*==================================================================================
  3.0 GOOGLE TAG MANAGER
==================================================================================*/
// embed the GTM-scripts into head and body => WPSeed_gtm()
// add your GTM_id (for example 'GTM-ABC1234') or leave empty to not enqueue any GTM-script
$GTM_id = '';



/*==================================================================================
  4.0 OPEN TAG IMAGE
==================================================================================*/
// open graph tags are returned by default => WPSeed_ogtags()
// add your og-image credentials here or leave ['active', false] to not emped an og-image
$ogimg = [
  ['active', false],
  ['path', '/dist/images/ogimg.jpg'],
  ['height', '300'],
  ['width', '400'],
  ['alt', 'true']
];



/*==================================================================================
  5.0 SETUP WP-MENUS
==================================================================================*/
// loads wordpress-menus, add your custom menus here or remove if not needed
// by default, only 'mainmenu' is shown
// => https://codex.wordpress.org/Function_Reference/register_nav_menus
function wpseed_register_theme_menus() {
  register_nav_menus([
    'mainmenu' => __('Mainmenu'),
    'submenu' => __('Submenu')
  ]);
}
add_action( 'init', 'wpseed_register_theme_menus');



?>
