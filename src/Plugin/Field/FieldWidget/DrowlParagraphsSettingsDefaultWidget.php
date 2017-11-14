<?php

namespace Drupal\drowl_paragraphs\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Field widget "drowl_paragraphs_settings_default".
 *
 * @FieldWidget(
 *   id = "drowl_paragraphs_settings_default",
 *   label = @Translation("DROWL Paragraphs settings default"),
 *   field_types = {
 *     "drowl_paragraphs_settings",
 *   }
 * )
 */
class DrowlParagraphsSettingsDefaultWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    // $item is where the current saved values are stored.
    $item =& $items[$delta];

    // Common options:
    $cols_options = [
      '1' => '1',
      '2' => '2',
      '3' => '3',
      '4' => '4',
      '5' => '5',
      '6' => '6',
      '7' => '7',
      '8' => '8',
      '9' => '9',
      '10' => '10',
      '11' => '11',
      '12' => '12',
    ];

    $percentage_options = [
      '10' => '10%',
      '20' => '20%',
      '30' => '30%',
      '40' => '40%',
      '50' => '50%',
      '60' => '60%',
      '70' => '70%',
      '80' => '80%',
      '90' => '90%',
      '100' => '100%',
    ];

    $percentage_negative_options = [
      '-100' => '-100%',
      '-90' => '-90%',
      '-80' => '-80%',
      '-70' => '-70%',
      '-60' => '-60%',
      '-50' => '-50%',
      '-40' => '-40%',
      '-30' => '-30%',
      '-20' => '-20%',
      '-10' => '-10%',
    ];

    $distance_options = [
      'default' => $this->t('Default'),
      'xxs' => 'xxs',
      'xs' => 'xs',
      's' => 's',
      'm' => 'm',
      'l' => 'l',
      'xl' => 'xl',
      'xxl' => 'xxl',
    ];

    // ===================================
    // Layout
    // ===================================
    
    // Small Devices
//    $element = array(
//      '#type' => 'item',
//      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i>' . $this->t('Small'),
//    );
//
    $element['layout_sm_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns') . ' (small)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_columns) ? $item->layout_sm_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-columns'),
    ];
    $element['layout_sm_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation') . ' (small)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_indent) ? $item->layout_sm_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-indent'),
    ];
    $element['layout_sm_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation') . ' (small)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_reverse_indent) ? $item->layout_sm_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-reverse-indent'),
    ];
//
//
//    // Medium Devices
////    $element = array(
////      '#type' => 'item',
////      '#title' => $this->t('Medium'),
////    );
    $element['layout_md_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns') . ' (medium)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_columns) ? $item->layout_md_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-columns'),
    ];
    $element['layout_md_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation') . ' (medium)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_indent) ? $item->layout_md_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-indent'),
    ];
    $element['layout_md_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation') . ' (medium)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_reverse_indent) ? $item->layout_md_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-reverse-indent'),
    ];
//
//    // Large Devices
////    $element = array(
////      '#type' => 'item',
////      '#title' => $this->t('Large'),
////    );
    $element['layout_lg_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns') . ' (large)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_columns) ? $item->layout_lg_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-columns'),
    ];
    $element['layout_lg_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation') . ' (large)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_indent) ? $item->layout_lg_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-indent'),
    ];
    $element['layout_lg_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation') . ' (large)',
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_reverse_indent) ? $item->layout_lg_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-reverse-indent'),
    ];


////    $element = array(
////      '#type' => 'item',
////      '#title' => $this->t('Distances'),
////      '#description' => $this->t('Set margins and paddings for this container.'),
////    );
    $element['layout_margin_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_top) ? $item->layout_margin_top : 'none',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-top'),
    ];
    $element['layout_margin_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_right) ? $item->layout_margin_right : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-right'),
    ];
    $element['layout_margin_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_bottom) ? $item->layout_margin_bottom : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-bottom'),
    ];
    $element['layout_margin_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_left) ? $item->layout_margin_left : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-left'),
    ];

    $element['layout_padding_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_top) ? $item->layout_padding_top : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-top'),
    ];
    $element['layout_padding_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_right) ? $item->layout_padding_right : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-right'),
    ];
    $element['layout_padding_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_bottom) ? $item->layout_padding_bottom : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-bottom'),
    ];
    $element['layout_padding_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_left) ? $item->layout_padding_left : 'default',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-left'),
    ];



////    $element = array(
////      '#type' => 'item',
////      '#title' => $this->t('Other settings'),
////    );
    $element['layout_min_height'] = [
      '#type' => 'select',
      '#title' => $this->t('Minimum height'),
      '#options' => $percentage_options,
      '#default_value' => isset($item->layout_min_height) ? $item->layout_min_height : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#description' => $this->t('The minimum height of the element. Mostly used to set the rows items height equally.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-min-height'),
    ];
    $element['layout_section_width'] = [
      '#type' => 'select',
      '#title' => $this->t('Section width'),
      '#options' => [
        'viewport_width' => $this->t('Viewport width'),
        'page_width' => $this->t('Page width'),
      ],
      '#default_value' => isset($item->layout_section_width) ? $item->layout_section_width : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#description' => $this->t('The width of the element. Viewport width = screen width, Page width = content width.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-section-width'),
    ];
//
//    // ===================================
//    // Styling group
//    // ===================================
////    $element = array(
////      '#type' => 'item',
////      '#title' => $this->t('Style'),
////      '#group' => 'paragraphs_settings',
////    );

    $element['style_boxstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Box style'),
      '#options' => [
        'default' => $this->t('Default'),
        'transparent-light' => $this->t('Transparent light'),
        'transparent-dark' => $this->t('Transparent dark'),
        'info' => $this->t('Info'),
        'warning' => $this->t('Warning'),
        'altert' => $this->t('Alarm'),
        'success' => $this->t('Success'),
      ],
      '#required' => TRUE,
      '#default_value' => isset($item->style_boxstyle) ? $item->style_boxstyle : 'default',
      '#description' => $this->t('Predefined styling of this container.'),
      '#wrapper_attributes' => array('class' => 'form-item--style-boxstyle'),
    ];


////    $element['animations'] = array(
////      '#type' => 'item',
////      '#title' => $this->t('Animations'),
////    );


    $animations_allowed_count = 4;
    for ($i=1; $i <= $animations_allowed_count; $i++) {
//      $element['animations'] = [
//        '#type' => 'item',
//        '#title' => $this->t('Animations'),
//      ];
//      $element['style_animation_' . $i] = [
//        '#type' => 'item',
//        '#title' => $this->t('Animation') . ' ' . $i,
//      ];

      $element['style_animation_' . $i . '_events'] = [
        '#type' => 'select',
        '#title' => $this->t('Event'),
        '#options' => [
          'enter_viewport' => $this->t('Entering the viewport'),
          'leave_viewport' => $this->t('Leaving the viewport'),
          'hover_element' => $this->t('Hover the element'),
          'hover_section' => $this->t('Hover the (outer) section'),
        ],
        '#required' => FALSE,
        '#multiple' => FALSE,
        '#empty_option' => $this->t('- None -'),
        '#default_value' => isset($item->{'style_animation_'.$i.'_events'}) ? $item->{'style_animation_'.$i.'_events'} : NULL,
        '#description' => '<ul>
          <li><strong>' . $this->t('Entering the viewport') . ':</strong> ' . $this->t('Animates if the element enters the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Leaving the viewport') . ':</strong> ' . $this->t('Animates if the element leaves the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Hover the element') . ':</strong> ' . $this->t('Animation starts when entering the element with the cursor.') . '</li>
          <li><strong>' . $this->t('Hover the (outer) section') . ':</strong> ' . $this->t('Animation starts when entering the outer section with the cursor.') . '</li>
        </ul>',
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-events'),
      ];

      $element['style_animation_' . $i . '_animation'] = [
        '#type' => 'select',
        '#title' => $this->t('Animation'),
        '#options' => [
          $this->t('Attention Seekers')->__toString() => [
            'bounce' => $this->t('bounce'),
            'flash' => $this->t('flash'),
            'pulse' => $this->t('pulse'),
            'rubberBand' => $this->t('rubberBand'),
            'shake' => $this->t('shake'),
            'swing' => $this->t('swing'),
            'tada' => $this->t('tada'),
            'wobble' => $this->t('wobble'),
            'jello' => $this->t('jello'),
          ],
          $this->t('Bouncing Entrances')->__toString() => [
            'bounceIn' => $this->t('bounceIn'),
            'bounceInDown' => $this->t('bounceInDown'),
            'bounceInLeft' => $this->t('bounceInLeft'),
            'bounceInRight' => $this->t('bounceInRight'),
            'bounceInUp' => $this->t('bounceInUp'),
          ],
          $this->t('Bouncing Exits')->__toString() => [
            'bounceOut' => $this->t('bounceOut'),
            'bounceOutDown' => $this->t('bounceOutDown'),
            'bounceOutLeft' => $this->t('bounceOutLeft'),
            'bounceOutRight' => $this->t('bounceOutRight'),
            'bounceOutUp' => $this->t('bounceOutUp'),
          ],
          $this->t('Fading Entrances')->__toString() => [
            'fadeIn' => $this->t('fadeIn'),
            'fadeInDown' => $this->t('fadeInDown'),
            'fadeInDownBig' => $this->t('fadeInDownBig'),
            'fadeInLeft' => $this->t('fadeInLeft'),
            'fadeInLeftBig' => $this->t('fadeInLeftBig'),
            'fadeInRight' => $this->t('fadeInRight'),
            'fadeInRightBig' => $this->t('fadeInRightBig'),
            'fadeInUp' => $this->t('fadeInUp'),
            'fadeInUpBig' => $this->t('fadeInUpBig'),
          ],
          $this->t('Fading Exits')->__toString() => [
            'fadeOut' => $this->t('fadeOut'),
            'fadeOutDown' => $this->t('fadeOutDown'),
            'fadeOutDownBig' => $this->t('fadeOutDownBig'),
            'fadeOutLeft' => $this->t('fadeOutLeft'),
            'fadeOutLeftBig' => $this->t('fadeOutLeftBig'),
            'fadeOutRight' => $this->t('fadeOutRight'),
            'fadeOutRightBig' => $this->t('fadeOutRightBig'),
            'fadeOutUp' => $this->t('fadeOutUp'),
            'fadeOutUpBig' => $this->t('fadeOutUpBig'),
          ],
          $this->t('Flippers')->__toString() => [
            'flip' => $this->t('flip'),
            'flipInX' => $this->t('flipInX'),
            'flipInY' => $this->t('flipInY'),
            'flipOutX' => $this->t('flipOutX'),
            'flipOutY' => $this->t('flipOutY'),
          ],
          $this->t('Lightspeed')->__toString() => [
            'lightSpeedIn' => $this->t('lightSpeedIn'),
            'lightSpeedOut' => $this->t('lightSpeedOut'),
          ],
          $this->t('Rotating Entrances')->__toString() => [
            'rotateIn' => $this->t('rotateIn'),
            'rotateInDownLeft' => $this->t('rotateInDownLeft'),
            'rotateInDownRight' => $this->t('rotateInDownRight'),
            'rotateInUpLeft' => $this->t('rotateInUpLeft'),
            'rotateInUpRight' => $this->t('rotateInUpRight'),
          ],
          $this->t('Rotating Exits')->__toString() => [
            'rotateOut' => $this->t('rotateOut'),
            'rotateOutDownLeft' => $this->t('rotateOutDownLeft'),
            'rotateOutDownRight' => $this->t('rotateOutDownRight'),
            'rotateOutUpLeft' => $this->t('rotateOutUpLeft'),
            'rotateOutUpRight' => $this->t('rotateOutUpRight'),
          ],
          $this->t('Sliding Entrances')->__toString() => [
            'slideInUp' => $this->t('slideInUp'),
            'slideInDown' => $this->t('slideInDown'),
            'slideInLeft' => $this->t('slideInLeft'),
            'slideInRight' => $this->t('slideInRight'),
          ],
          $this->t('Sliding Exits')->__toString() => [
            'slideOutUp' => $this->t('slideOutUp'),
            'slideOutDown' => $this->t('slideOutDown'),
            'slideOutLeft' => $this->t('slideOutLeft'),
            'slideOutRight' => $this->t('slideOutRight'),
          ],
          $this->t('Zoom Entrances')->__toString() => [
            'zoomIn' => $this->t('zoomIn'),
            'zoomInDown' => $this->t('zoomInDown'),
            'zoomInLeft' => $this->t('zoomInLeft'),
            'zoomInRight' => $this->t('zoomInRight'),
            'zoomInUp' => $this->t('zoomInUp'),
          ],
          $this->t('Zoom Exits')->__toString() => [
            'zoomOut' => $this->t('zoomOut'),
            'zoomOutDown' => $this->t('zoomOutDown'),
            'zoomOutLeft' => $this->t('zoomOutLeft'),
            'zoomOutRight' => $this->t('zoomOutRight'),
            'zoomOutUp' => $this->t('zoomOutUp'),
          ],
          $this->t('Specials')->__toString() => [
            'hinge' => $this->t('hinge'),
            'jackInTheBox' => $this->t('jackInTheBox'),
            'rollIn' => $this->t('rollIn'),
            'rollOut' => $this->t('rollOut'),
          ],
        ],
        '#required' => FALSE,
        '#multiple' => FALSE,
        '#empty_option' => $this->t('- None -'),
        '#default_value' => isset($item->{'style_animation_'.$i.'_animation'}) ? $item->{'style_animation_'.$i.'_animation'} : NULL,
        '#description' => $this->t('Choose the animation to run on the event.'),
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-animation'),
      ];

      $element['style_animation_' . $i . '_offset'] = [
        '#type' => 'select',
        '#title' => $this->t('Viewport animation offset trigger'),
        '#options' => array_merge($percentage_negative_options, $percentage_options),
        '#default_value' => isset($item->{'style_animation_'.$i.'_offset'}) ? $item->{'style_animation_'.$i.'_offset'} : NULL,
        '#empty_option' => $this->t('- None -'),
        '#empty_value' => NULL,
        '#required' => FALSE,
        '#description' => $this->t('Entering the viewport') . '/' . $this->t('Leaving the viewport') . ': ' . $this->t('Offset for the animation to start if the element is visible for x %.'),
        '#states' => [
          'visible' => [
            'select[name="field_vt_style_animations_events"]' => [
              'value' => [
                'enter_viewport',
                'leave_viewport'
              ]
            ]
          ]
        ],
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-offset'),
      ];

      $element['style_animation_' . $i . '_delay'] = [
        '#title' => t('Animation start delay'),
        '#type' => 'number',
        '#min' => '0',
        '#step' => '1',
        '#default_value' => isset($item->{'style_animation_'.$i.'_delay'}) ? $item->{'style_animation_'.$i.'_delay'} : 0,
        '#field_suffix' => 'ms',
        '#description' => $this->t('Delay the animation start. Value in milliseconds (1000ms = 1s)'),
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-delay'),
      ];
    }
//
    $element['style_textstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Text alignment / style'),
      '#options' => [
        'default' => $this->t('default'),
        'text_left' => $this->t('Left aligned'),
        'text_right' => $this->t('Right aligned'),
        'text_center' => $this->t('Centered'),
        'text_justify' => $this->t('Justified'),
        'lead' => $this->t('Lead'),
        $this->t('Columns')->__toString() => array(
          'columns_2' => t('2 Spalten'),
          'columns_3' => t('3 Spalten'),
          'columns_4' => t('4 Spalten'),
          'columns_5' => t('5 Spalten'),
        ),
      ],
      '#required' => TRUE,
      '#multiple' => FALSE,
      '#default_value' => isset($item->style_textstyle) ? $item->style_textstyle : 'default',
      '#description' => $this->t('The text alignment / style, if this element contains text.'),
      '#wrapper_attributes' => array('class' => 'form-item--style-textstyle'),
    ];

    // ===================================
    // Expert settings group
    // ===================================
//    $element['vt_expert'] = array(
//      '#type' => 'details',
//      '#title' => $this->t('Expert'),
//    );
    $element['classes_additional'] = array(
      '#title' => t('Additional classes'),
      '#type' => 'textfield',
      '#default_value' => isset($item->classes_additional) ? $item->classes_additional : '',
      '#description' => $this->t('<strong>Experts:</strong> Enter special CSS classes to apply separated by space.'),
      '#wrapper_attributes' => array('class' => 'form-item--classes-additional'),
    );

    // If cardinality is 1, ensure a label is output for the field by wrapping
    // it in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()->getCardinality() == 1) {
      $element += array(
        '#type' => 'details',
        '#open' => FALSE,
      );
    }

    return $element;
  }

}
