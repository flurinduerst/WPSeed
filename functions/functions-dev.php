<?
/**
 * Functions used for Development purposes
 *
 * @author         Flurin Dürst
 * @version 	   1.01
 * @since 		   WPegg 0.1
 *
 */


/* ACTIVATABLE
/===================================================== */

 	/* MAINTENANCE MODE
 	/------------------------*/
 	if (false && !is_admin()) {
 	?>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width">
 		<style>
 			* { font-family: 'HelveticaNeue', Arial, Verdana; font-weight: normal; font-style: normal; margin: 0; padding: 0; }
 			body { font-family: 'HelveticaNeue',sans-serif; font-size: 22px; color: #fff; line-height: 1.5; background-color: #6d8b9c; }
 			p:first-of-type { margin-bottom: 2rem; }
 			main { position: absolute; top: 50%; left: 50%; margin: auto; -webkit-transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%); transform: translate(-50%,-50%); }
 			small { opacity: .6; }
 		</style>
 		<main>
 			<p>Zurzeit werden Wartungsarbeiten ausgeführt.<br>Bitte versuchen Sie es später erneut.</p>
 			<p><small>01. Januar 2015, 18.00 Uhr</small></p>
 		</main>
 		<? die();
 	}

	/* REDIRECT NOT-LOGGED-IN TO LOGIN
	/---------------------------------*/
 	if (false && !is_user_logged_in() && is_main_query() && !is_admin() && !is_login_page()){
 		wp_redirect('/admin'); die();
 	}


/* CODING
/===================================================== */

	/* DUMP'N DIE
	/------------------------*/
	function dd($var) {
		echo '<pre>';
		var_dump($var);
		die();
	}

    /* IP CHECKS
    /------------------------*/
	// clus
	function is_clus() {
		return $_SERVER['REMOTE_ADDR'] === '46.140.123.94';
	}

    /* LOGIN PAGE
    /------------------------*/
	function is_login_page() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}
