/**
* @file
* DROWL Paragraphs frontend JavaScript
*
*/
(function ($, Drupal) {
  Drupal.behaviors.drowl_paragraphs_frontend = {
    attach: function (context, settings) {
      $( document ).ready(function() {
        if($('.paragraph.animated').data('animations')){
          var animatedParagraph = $('.paragraph.animated');
          var animations = animatedParagraph.data('animations');
          var animationCount = animations.length;
          for (var i = 0; i < animationCount; i++) {
            var animationObj = animations[animationCount];
            var animationEvent = animationObj.event;
            var animationAnimation = animationObj.animation;
            var animationOffset = animationObj.offset;
            var animationDelay = animationObj.delay;
            switch(animationEvent) {
              case '':

                break;
              case '':

                break;
              }
                animatedParagraph.addClass(animationAnimation);
          }
        }
      });
    },
  }
})(jQuery, Drupal);
