<?php
/**
 * Functions used for development purposes.
 *
 * @author      Flurin Dürst
 * @version     2.2.1
 * @since       WPegg 0.1.0
 *
 */


/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 is ajax/pjax request
    1.3 variables
    1.4 string shortener
    1.5 url check
    1.6 environment check
    1.7 browser check
    1.8 slugify

  2.0 OUTPUT TOOLKIT
    2.1 google tag manager
    2.2 sanitizer
    2.3 blog related

  3.0 ACCESS TOOLKIT
    3.1 ip check
    3.2 login page
    3.3 logged-in-only
=======================================================*/



/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 is AJAX/PJAX Request
/––––––––––––––––––––––––*/
function is_ajax_request() {
  return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
function is_pjax_request() {
  return !empty($_SERVER['X-PJAX']) && $_SERVER['X-PJAX'] === true;
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$loremipsum = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
  $string = trim($string);
  if(strlen($string) > $length) {
    $string  = substr($string, 0, $length);
    $string .= $append;
  }
  return $string;
}


/* 1.5 URL CHECK
/––––––––––––––––––––––––*/
// searche url by string
// note: also consider using basename($url) or basename(dirname($url)) => http://php.net/manual/de/function.basename.php
function urlcontains($string) {
  if (strpos('https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],$string) == true) {
    return true;
  }
}


/* 1.6 ENVIRONMENT CHECK
/––––––––––––––––––––––––*/
// check the current staging environment (i.E. preview, beta, production)
// assuming your using subdomains for staging (i.E. beta.domain.com)
// usage: if (environemtn('production')) // dev, preview, beta, production
// always returns true if $check_staging is set to `false`
function environment($stage) {
  GLOBAL $check_staging, $stages;
  if (!$check_staging) {
    return true;
  }
  elseif (array_key_exists($stage, $stages)) {
    if ($stages[$stage] == $_SERVER['SERVER_NAME']) {
        return true;
      }
    else {
      return false;
    }
  }
}


/* 1.7 BROWSER CHECK
/------------------------*/
function get_browser_name() {
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  if (strpos($user_agent, 'Chrome')) return 'Chrome';
  elseif (strpos($user_agent, 'Safari')) return 'Safari';
  elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
  elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
  elseif (strpos($user_agent, 'Edge')) return 'Edge';
  elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'InternetExplorer';
  return 'Other';
}


/* 1.8 SLUGIFY
/––––––––––––––––––––––––*/
// create slugs
// example: "LORÖM %< 123+ ipsüm!" will be "loroem-123-ipsuem-"
function slugify($text) {
  // trim (remove whitespace before/after string)
  $text = trim($text, '-');
  // replace umlaute
  $text = preg_replace (['/ä/','/ö/','/ü/','/ß/'] , ['ae','oe','ue','ss'], $text);
  // replace special symbols
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // set lowercase
  $text = strtolower($text);
  return $text;
 }



/*==================================================================================
  2.0 OUTPUT TOOLKIT
==================================================================================*/


/* 2.1 GOOGLE TAG MANAGER
/––––––––––––––––––––––––*/
// outputs one of the two parts of the Google Tag Manager scripts
// Usage: gtm('head', 'GTM-1234567) and gtm('body', 'GTM-1234567)
function WPSeed_gtm($type) {
  if (environment('production')) {
    GLOBAL $GTM_id;
    if ($GTM_id) {
      if ($type == 'head') {
        ?>
          <!-- Google Tag Manager -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','<?= $GTM_id ?>');</script>
        <?
      } elseif ($type == 'body') { ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $GTM_id ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?
      }
    }
  }
}


/* 2.2 SANITIZER
/––––––––––––––––––––––––*/
function sanitize_output($buffer) {
  $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'];
  $replace = ['>', '<', '\\1'];
  $buffer = preg_replace($search, $replace, $buffer);
  return $buffer;
}


/* 2.3 BLOG RELATED
/––––––––––––––––––––––––*/
// return formatted post-date in current language
function get_the_date_german() {
  $months_de = ['Januar','Februar','März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
  return get_the_date('d.').' '.$months_de[intval(get_the_date('m'))-1].' '.get_the_date('Y');
}


// edit «read more» button
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
  return ' <span class="readmore"><a href="' . get_permalink() . '">[mehr...]</a>';
}



/*==================================================================================
  3.0 ACCESS TOOLKIT
==================================================================================*/

/* 3.1 IP CHECK
/––––––––––––––––––––––––*/
// add your own ip here
function is_me() {
  return $_SERVER['REMOTE_ADDR'] === '11.111.111.11';
}


/* 3.2 LOGIN PAGE
/––––––––––––––––––––––––*/
function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


/* 3.3 RESTRICT ACCES IF NOT LOGGEDIN
/––––––––––––––––––––––––––––––––––––*/
// redirect all users that are not logged-in to login
// remove `false && ` to activate
if (false && !is_user_logged_in() && is_main_query() && !is_admin() && !is_login_page()){
  wp_redirect('/admin'); die();
}

?>
