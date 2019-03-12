<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author      Flurin Dürst
 * @version     2.1
 * @since       WPSeed 0.1
 *
 */


/*==================================================================================
  DEVELOPER TOOLKIT
==================================================================================*/
// functions used for development purposes like debuggers sanitizers or IP-checks
require('functions/functions-dev.php');



/*==================================================================================
  WP SETUP & SETTINGS
==================================================================================*/
// WP-setup and preferences + general settings, filters, theme support & more
require('functions/functions-setup.php');
require('functions/functions-settings.php');



/*==================================================================================
  GUTENBERG ACF
==================================================================================*/
// bundles all custom Gutenberg-blocks created with ACF
require('functions/functions-gutenberg.php');



/*==================================================================================
  CUSTOM
==================================================================================*/
// custom functions like shortcodes should be added here
require('functions/functions-custom.php');



?>
