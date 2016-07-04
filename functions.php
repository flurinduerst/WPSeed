<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author      Flurin Dürst
 * @version     1.2
 * @since       WPSeed 0.1
 *
 */

/* GENERAL
/===================================================== */
  require('functions/functions-general.php');


/* DEVELOPMENT
/===================================================== */
  require('functions/functions-dev.php');


/* WP SETUP & SETTINGS
/===================================================== */
  require('functions/functions-wpsetup.php');


/* WORDPRESS
/===================================================== */
  require('functions/functions-wp.php');


/* PLUGIN RELATED
/===================================================== */
  // Elements for ACF Flexible Content
  // » https://www.advancedcustomfields.com/resources/flexible-content/
  require('functions/functions-elements.php');

?>
