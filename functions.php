<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author      Flurin Dürst
 * @version     1.3
 * @since       WPSeed 0.1
 *
 */

/* ACCESS CONTROL
/===================================================== */
  require('functions/functions-access.php');


/* DEVELOPER TOOLKIT
/===================================================== */
  require('functions/functions-dev.php');


/* WP SETUP & SETTINGS
/===================================================== */
  require('functions/functions-wpsetup.php');


/* BACKEND
/===================================================== */
  require('functions/functions-backend.php');


/* ELEMENTS
/===================================================== */
  // Elements for ACF Flexible Content
  // » https://www.advancedcustomfields.com/resources/flexible-content/
  require('functions/functions-elements.php');

?>
