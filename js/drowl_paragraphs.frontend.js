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
      });
    },
  }
})(jQuery, Drupal);
