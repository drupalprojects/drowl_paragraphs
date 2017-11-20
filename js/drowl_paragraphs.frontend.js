/**
 * @file
 * DROWL Paragraphs frontend JavaScript
 *
 */
(function ($, Drupal) {
  Drupal.behaviors.drowl_paragraphs_frontend = {
    attach: function (context, settings) {
      $(document).ready(function () {
        didScroll = false;
        var animatedParagraphs = $('.paragraph.has-animation', context);
        animatedParagraphs.each(function () {
          if ($(this).data('animations')) {
            // It really has animations ;):
            var $animatedParagraph = $(this);
            var animations = $animatedParagraph.data('animations');
            var animationCount = animations.length;
            for (var i = 0; i < animationCount; i++) {
              // Skip early if required values are missing:
              if (!animations[i].event || !animations[i].animation) {
                continue;
              }
              var animationObj = animations[i];
              // We have to use an anonymous function otherwise the references are wrong (see https://stackoverflow.com/questions/7749090/how-to-use-setinterval-function-within-for-loop):
              (function (i, $animatedParagraph, animationObj) {
                // Animation data array variables:
                var animationEvent = animationObj.event;
                var animationName = animationObj.animation;
                var animationOffset = animationObj.offset;
                var animationDelay = animationObj.delay;

                // Calculated values:
                var animationOffsetPx = 0;
                if (animationOffset != 0) {
                  // Calculate - 100 to 100 vh to px
                  var animationOffsetPercent = (100 / animationOffset) * -1;
                  animationOffsetPx = Math.round($animatedParagraph.outerHeight() / animationOffsetPercent);
                }

                // Scroll related animations
                if (animationEvent === 'enter-viewport') {
                  setInterval(function () {
                    if (didScroll) {
                      // Check if in viewport
                      if (!$animatedParagraph.hasClass('in-scope') && verge.inViewport($animatedParagraph.get(0), animationOffsetPx)) {
                        // We always have to set an indicator if the element was
                        // in scope to detect leave-viewport
                        $animatedParagraph.addClass('in-scope');

                        // Add the deservered animation
                        Drupal.behaviors.drowl_paragraphs_frontend.animate($animatedParagraph, animationName, animationDelay);
                      }
                      else if ($animatedParagraph.hasClass('in-scope') && !verge.inViewport($animatedParagraph.get(0), animationOffsetPx)) {
                        // No more in scope:
                        $animatedParagraph.removeClass('in-scope');
                      }
                    }
                  }, 100);
                }
                else if (animationEvent === 'leave-viewport') {
                  setInterval(function () {
                    if (didScroll) {
                      // Check if no more in viewport
                      if ($animatedParagraph.hasClass('leave-viewport-was-in-scope') && !verge.inViewport($animatedParagraph.get(0), animationOffsetPx)) {
                        // Only run if the element was in scope before
                        // Otherwise we'd never know if  the element has not
                        // been visible yet.
                        Drupal.behaviors.drowl_paragraphs_frontend.animate($animatedParagraph, animationName, animationDelay);
                        $animatedParagraph.removeClass('leave-viewport-was-in-scope');
                      } else if (!$animatedParagraph.hasClass('leave-viewport-was-in-scope') && verge.inViewport($animatedParagraph.get(0), animationOffsetPx)) {
                        // No more in scope:
                        $animatedParagraph.addClass('leave-viewport-was-in-scope');
                      }
                    }
                  }, 100);
                }
                else if (animationEvent === 'hover') {
                  $animatedParagraph.mouseenter(function () {
                    Drupal.behaviors.drowl_paragraphs_frontend.animate($animatedParagraph, animationName, animationDelay);
                  });
                }
              })(i, $animatedParagraph, animationObj);
            }
          }
        });

        // Scroll events best practice:
        // https://johnresig.com/blog/learning-from-twitter/
        $(window).scroll(function () {
          didScroll = true;
        });
        setInterval(function () {
          if (didScroll) {
            didScroll = false;
          }
        }, 200);
      });
    },
    animate: function ($container, animationName, animationDelay, callback) {
      var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      animationDelay = (typeof animationDelay === 'undefined') ? 0 : animationDelay;
      setTimeout(function () {
        $container.addClass('animated ' + animationName).one(animationEnd, function () {
          $(this).removeClass('animated ' + animationName);
          if (callback) {
            callback();
          }
        });
      }, animationDelay);
      return this;
    }
  }
})(jQuery, Drupal);
