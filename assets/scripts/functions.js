/*!
 * All sorts javascript/jQuery functions
 *
 * @author      Flurin Dürst
 * @version     3.7.0
 * @since       WPSeed 0.12
 * was main.js until 3.4.1
 *
 */


/*==================================================================================
  Functions
==================================================================================*/
$(function(){

/* Global Settings
/––––––––––––––––––––––––*/
// custom vars that need to be global

  // get current language
  var active_lang = $('html').attr('data-lang');


  /* Hamburger switch
  /––––––––––––––––––––––––*/
  $(function(){
    $(document).on('click', '#hamburger', function (event) {
      // show overlay
      $('#menu_main').toggleClass('hidden_mobile');
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


  /* Modernizr Fix: 'object-fit'
  /––––––––––––––––––––––––––––––––*/
  // displays images with the object-fit attribute as background-images for older browsers
  $(function(){
    if ( ! Modernizr.objectfit ) {
      // $('.InternetExplorer img.modernizr-of').each(function () { --> add option for .InternetExplorer to documentation --> see get_browser_name
      $('img.modernizr-of').each(function () {
        // Check if image has attribute 'object-fit'
        var $img = $(this);
        imgUrl = $img.prop('src');
        classes = $img.attr("class");
        if (imgUrl) {
          // Replace img with a div containing the image as background-image and get background-image value from object-fit
          $img.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ')"></div>');
        }
      });
    }
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

});
