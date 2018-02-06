/*!
 * All sorts javascript/jQuery functions
 *
 * @author      Flurin Dürst
 * @version     3.4.0
 * @since       WPSeed 0.12
 * was main.js until 3.4.0
 *
 */


/* Functions
/===================================================== */

/* Hamburger switch
/------------------------*/
$(function(){
  $(document).on('click', '#hamburger', function (event) {
    // show overlay
    $('#nav_main').toggleClass('hiddenmobile');
    // switch icon
    $('#hamburger').toggleClass('is-active');
    // prevent content scrolling
    $('html').toggleClass('noscroll');
  });
});

/* WOW
/------------------------*/
// http://mynameismatthieu.com/WOW/
$(function(){
  new WOW().init();
});
