/**
 * All sorts javascript/jQuery functions go here
 *
 * @author      Flurin Dürst
 * @version     3.0
 * @since       WPSeed 0.12
 *
 */

 /* General Variables & Presets
/===================================================== */

  /* Viewport Width
  /------------------------*/
  var $vpWidth = jQuery(window).width();

  /* Touch Device
  /------------------------*/
  var $root = $('html');
  var isTouch = 'ontouchstart' in document.documentElement;
  if (isTouch) {
    $root.attr('data-touch', 'true');
  } else {
    $root.attr('data-touch', 'false');
  }
  /* Initialize Fastclick
  /------------------------*/
  //» https://github.com/ftlabs/fastclick
  FastClick.attach(document.body);


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
    $('html').toggleClass('noscroll');
  });
});
