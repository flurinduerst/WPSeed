/*!
 * Essential javascript functions/variables
 *
 * @author      Flurin Dürst
 * @version     1.0.2
 * @since       WPSeed 0.11.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/


/* Viewport Width
/––––––––––––––––––––––––*/
var $vpWidth = jQuery(window).width();

/* Touch Device
/––––––––––––––––––––––––*/
var $root = $('html');
var isTouch = 'ontouchstart' in document.documentElement;
if (isTouch) {
  $root.attr('data-touch', 'true');
} else {
  $root.attr('data-touch', 'false');
}


/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}
