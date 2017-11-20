/**
 * @file
 * DROWL Paragraphs frontend JavaScript
 *
 */
(function ($, Drupal) {
  Drupal.behaviors.drowl_paragraphs_frontend = {
    attach: function (context, settings) {
      $(document).ready(function () {
        var animatedParagraphs = $('.paragraph.has-animation', context);
        animatedParagraphs.each(function () {
          if ($(this).data('animations')) {
            // It really has animations ;):
            var animatedParagraph = $(this);
            var animations = animatedParagraph.data('animations');
            var animationCount = animations.length;
            for (var i = 0; i < animationCount; i++) {
              // Animation data array variables:
              var animationObj = animations[i];
              var animationEvent = animationObj.event;
              var animationName = animationObj.animation;
              var animationOffset = animationObj.offset;
              var animationDelay = animationObj.delay;

              // Helper variables:
              var viewportHeight = verge.viewportH();

              // Calculated values:
              var animationOffsetPx = 0;
              if (animationOffset != 0) {
                // Calculate - 100 to 100 vh to px
                animationOffsetPx = viewportHeight / animationOffset;
              }

              // Scroll related animations
              didScroll = false;
              switch (animationEvent) {
                case 'enter-viewport':
                  setInterval(function () {
                    if (didScroll) {
                      // Check if in viewport
                      if (!animatedParagraph.hasClass('in-scope') && verge.inViewport(animatedParagraph.get(0), animationOffsetPx)) {
                        // We always have to set an indicator if the element was
                        // in scope to detect leave-viewport
                        animatedParagraph.addClass('in-scope');

                        // Add the deservered animation
                        Drupal.behaviors.drowl_paragraphs_frontend(animationName, animationDelay);
                      }
                    }
                  }, 250);
                  break;
                case 'leave-viewport':
                  setInterval(function () {
                    if (didScroll) {
                      // Check if no more in viewport
                      if (animatedParagraph.hasClass('was-in-scope') && !verge.inViewport(animatedParagraph.get(0), animationOffsetPx)) {
                        // Only run if the element was in scope before
                        // Otherwise we'd never know if  the element has not
                        // been visible yet.
                        Drupal.behaviors.drowl_paragraphs_frontend(animationName, animationDelay);
                        animatedParagraph.removeClass('was-in-scope');
                      }
                    }
                  }, 250);
                  break;
                case 'hover':
                  $animatedParagraph.mouseenter(function () {
                    Drupal.behaviors.drowl_paragraphs_frontend(animationName, animationDelay);
                  });
                  break;
              }

              // Scroll events best practice:
              // https://johnresig.com/blog/learning-from-twitter/
              $(window).scroll(function () {
                didScroll = true;
              });
              setInterval(function () {
                if (didScroll) {
                  didScroll = false;
                }
              }, 250);
            }
          }
        });
      });
    },
    animate: function (animationName, animationDelay, callback) {
      var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      animationDelay = (typeof animationDelay === 'undefined') ? 0 : animationDelay;

      setTimeout(function () {
        $(this).addClass('animated ' + animationName).one(animationEnd, function () {
          $(this).removeClass(animationName);
          if (callback) {
            callback();
          }
        });
      }, animationDelay);
      return this;
    }
  }
})(jQuery, Drupal);
