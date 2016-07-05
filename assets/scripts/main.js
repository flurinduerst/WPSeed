/**
 * All sorts javascript/jQuery functions go here
 *
 * @author      Flurin Dürst
 * @version     3.1
 * @since       WPSeed 0.12
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


/* Initialize Fastclick
/------------------------*/
// » https://github.com/ftlabs/fastclick
FastClick.attach(document.body);
