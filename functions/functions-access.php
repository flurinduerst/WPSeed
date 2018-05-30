<?php
/**
 * Functions that control site access.
 *
 * @author      Flurin Dürst
 * @version     1.1
 * @since       WPSeed 0.11.4
 *
 */


/* IP CHECK
/––––––––––––––––––––––––*/
// add your own ip here
function is_me() {
  return $_SERVER['REMOTE_ADDR'] === '11.111.111.11';
}

/* LOGIN PAGE
/––––––––––––––––––––––––*/
function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

/* LOGGED-IN-ONLY
/---------------------------------*/
// redirect all users that are not logged-in to login
// remove `false && ` to activate
if (false && !is_user_logged_in() && is_main_query() && !is_admin() && !is_login_page()){
  wp_redirect('/admin'); die();
}

/* MAINTENANCE MODE (GERMAN)
/––––––––––––––––––––––––*/
// show maintenance page if not my ip (is_me() and not logged in as admin)
// remove `false && ` to activate
if (false && !is_admin() && !is_me()) { ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <style>
    * { font-family: 'HelveticaNeue', Arial, Verdana; font-weight: normal; font-style: normal; margin: 0; padding: 0; }
    body { font-family: 'HelveticaNeue',sans-serif; font-size: 22px; color: #fff; line-height: 1.5; background-color: #96c46e; }
    p:first-of-type { margin-bottom: 2rem; }
    main { position: absolute; top: 50%; left: 50%; margin: auto; -webkit-transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%); transform: translate(-50%,-50%); }
    small { opacity: .6; }
  </style>
  <main>
    <p>Zurzeit werden Wartungsarbeiten ausgeführt.<br>Bitte versuchen Sie es später erneut.</p>
    <p><small>01. Januar 2017, 18.00 Uhr</small></p>
  </main>
  <?php die();
}
?>
