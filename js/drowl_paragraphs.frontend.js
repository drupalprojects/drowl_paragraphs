/**
* @file
* DROWL Paragraphs frontend JavaScript
*
*/
(function ($, Drupal) {

  Drupal.behaviors.drowl_paragraphs_frontend = {
    attach: function (context, settings) {
      $( document ).ready(function() {
          console.log('paragraphs frontend scripts!');

          // data-animations [[{"event":"enter-viewport","animation":"shake","offset":"0","delay":"2"},{"event":"leave-viewport","animation":"rubberBand","offset":"0","delay":"0"}]]
          console.log($('.paragraph.animated'));
          console.log($('.paragraph.animated').data('animations'));
      });
    },
  }
})(jQuery, Drupal);
