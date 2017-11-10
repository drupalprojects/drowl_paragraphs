/**
* @file
* Placeholder file for custom sub-theme behaviors.
*
*/
(function ($, Drupal) {

  Drupal.behaviors.drowl_paragraphs = {
    attach: function (context, settings) {
      $( document ).ready(function() {
          console.log('paragraphs scripts!');
      });
    },
  }
})(jQuery, Drupal);
