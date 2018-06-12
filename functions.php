<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author      Flurin Dürst
 * @version     2.0
 * @since       WPSeed 0.1
 *
 */


/*==================================================================================
  DEVELOPER TOOLKIT
==================================================================================*/
require('functions/functions-dev.php');



/*==================================================================================
  WP SETUP & SETTINGS
==================================================================================*/
require('functions/functions-setup.php');
require('functions/functions-settings.php');



/*==================================================================================
  BLOCKS
==================================================================================*/
// Blocks using the ACF Flexible Content
// » https://www.advancedcustomfields.com/resources/flexible-content/
require('functions/functions-blocks.php');



/*==================================================================================
  CUSTOM
==================================================================================*/
require('functions/functions-custom.php');



?>
