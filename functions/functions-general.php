<?
/**
 * File for general functions that are not WordPress related 
 *
 * @author         Flurin Dürst
 * @version 	   1.03
 * @since 		   WPegg 0.14
 *
 */


/* GENERAL FUNCTIONS
/===================================================== */

    /* STRING SHORTENER
    /------------------------*/
    // shorten strings and append ...
    function wpegg_shorten($string,$length,$append="...") {
        $string = trim($string);
        if(strlen($string) > $length) {
            $string  = substr($string, 0, $length);
            $string .= $append;
        }
        return $string;
    }

    /* SANITIZER
    /------------------------*/
    function sanitize_output($buffer) {
    	$search = [
    		'/\>[^\S ]+/s',
    		'/[^\S ]+\</s',
    		'/(\s)+/s',
    	];
    	$replace = ['>', '<', '\\1'];
    	$buffer = preg_replace($search, $replace, $buffer);
    	return $buffer;
    }

    /* URL CHECK
    /------------------------*/
    // searches url by string
    function urlcontains($string) {
        if (strpos('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],$string) == true) {
            return true;
        }
    }
