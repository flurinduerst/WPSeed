/*!
 * All sorts javascript/jQuery functions
 *
 * @author      Flurin Dürst
 * @version     3.5.0
 * @since       WPSeed 0.12
 * was main.js until 3.4.1
 *
 */


/*==================================================================================
  Functions
==================================================================================*/


/* Hamburger switch
/––––––––––––––––––––––––*/
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
/––––––––––––––––––––––––*/
// http://mynameismatthieu.com/WOW/
$(function(){
  new WOW().init();
});


/* Smooth Anchor Scrolling
/––––––––––––––––––––––––*/
// https://css-tricks.com/snippets/jquery/smooth-scrolling/
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // define custom offset (examples: 50 or -200 or (".anchor").height();)
    var custom_offset = 0;
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top + custom_offset
        }, 500, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
