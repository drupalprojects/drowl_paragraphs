/**
* @file
* Placeholder file for custom sub-theme behaviors.
*
*/
(function ($, Drupal) {

  Drupal.behaviors.drowl_paragraphs_backend = {
    attach: function (context, settings) {
      $( document ).ready(function( ) {
          // Spacings Widget: Change the counterpart value to the same value as the changed one.
          // Disabled - seems more disturbing als helpful.

          // function changeCounterpartIfEmpty($elem1, $elem2){
          //   var elem1_current_value = $elem1.val();
          //   var elem2_current_value = $elem2.val();
          //   $elem1.on('change', function( event ){
          //     event.stopImmediatePropagation();
          //     elem1_current_value = $elem1.val();
          //     elem2_current_value = $elem2.val();
          //     if(elem2_current_value == ""){
          //       $elem2.val($(this).val());
          //     }
          //   });
          //   $elem2.on('change', function( event ){
          //     event.stopImmediatePropagation();
          //     elem1_current_value = $elem1.val();
          //     elem2_current_value = $elem2.val();
          //     if(elem1_current_value == ""){
          //       $elem1.val($(this).val());
          //     }
          //   });
          // }
          // $('[data-drupal-selector*="layout-spacing"]').each(function(){
          //   // console.log($(this));
          //   var $spacings_widget_wrapper = $(this);
          //   var $margin_top_input = $spacings_widget_wrapper.find('.form-item--layout-margin-top .form-select');
          //   var $margin_right_input = $spacings_widget_wrapper.find('.form-item--layout-margin-right .form-select');
          //   var $margin_bottom_input = $spacings_widget_wrapper.find('.form-item--layout-margin-bottom .form-select');
          //   var $margin_left_input = $spacings_widget_wrapper.find('.form-item--layout-margin-left .form-select');
          //   var $padding_top_input = $spacings_widget_wrapper.find('.form-item--layout-padding-top .form-select');
          //   var $padding_right_input = $spacings_widget_wrapper.find('.form-item--layout-padding-right .form-select');
          //   var $padding_bottom_input = $spacings_widget_wrapper.find('.form-item--layout-padding-bottom .form-select');
          //   var $padding_left_input = $spacings_widget_wrapper.find('.form-item--layout-padding-left .form-select');
          //   // Define counterparts
          //   changeCounterpartIfEmpty($margin_top_input, $margin_bottom_input);
          //   changeCounterpartIfEmpty($margin_left_input, $margin_right_input);
          //   changeCounterpartIfEmpty($padding_top_input, $padding_bottom_input);
          //   changeCounterpartIfEmpty($padding_left_input, $padding_right_input);
          // });
      });
    },
  }
})(jQuery, Drupal);
