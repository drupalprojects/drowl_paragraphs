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

    // Load drowl_paragraphs.toppincs.inc file for reading topping data.
    module_load_include('inc', 'drowl_paragraphs');

    // $item is where the current saved values are stored.
    $item =& $items[$delta];

//    $element += array(
//      '#type' => 'fieldset',
//    );

    // Eg. Markup field
    // array(
    //   '#markup' => 'Some arbitrary markup.',
    // );

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
      '-10' => '-10%',
      '-20' => '-20%',
      '-30' => '-30%',
      '-40' => '-40%',
      '-50' => '-50%',
      '-60' => '-60%',
      '-70' => '-70%',
      '-80' => '-80%',
      '-90' => '-90%',
      '-100' => '-100%',
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

    $element['paragraphs_settings'] = array(
      '#type' => 'vertical_tabs',
      '#default_tab' => 'edit-vt_layout',
    );

    // ===================================
    // Layout group
    // ===================================
    $element['vt_layout'] = array(
      '#type' => 'details',
      '#title' => $this->t('Layout'),
      '#group' => 'paragraphs_settings',
      '#open' => TRUE,
    );

    $element['vt_layout']['layout'] = array(
      '#type' => 'horizontal_tabs',
      '#tree' => TRUE,
      '#prefix' => '<div id="layout-wrapper">',
      '#suffix' => '</div>',
    );

    // Small Devices
    $element['vt_layout']['layout']['sm'] = array(
      '#type' => 'details',
      '#title' => $this->t('Small'),
    );
    $element['vt_layout']['layout']['sm']['columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->columns) ? $item->columns : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['sm']['advanced'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Advanced Settings'),
    );
    $element['vt_layout']['layout']['sm']['advanced']['indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->indent) ? $item->indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['sm']['advanced']['reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->reverse_indent) ? $item->reverse_indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];


    // Medium Devices
    $element['vt_layout']['layout']['md'] = array(
      '#type' => 'details',
      '#title' => $this->t('Medium'),
    );
    $element['vt_layout']['layout']['md']['columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->columns) ? $item->columns : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['md']['advanced'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Advanced Settings'),
    );
    $element['vt_layout']['layout']['md']['advanced']['indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->indent) ? $item->indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['md']['advanced']['reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->reverse_indent) ? $item->reverse_indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];

    // Large Devices
    $element['vt_layout']['layout']['lg'] = array(
      '#type' => 'details',
      '#title' => $this->t('Large'),
    );
    $element['vt_layout']['layout']['lg']['columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->columns) ? $item->columns : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['lg']['advanced'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Advanced Settings'),
    );
    $element['vt_layout']['layout']['lg']['advanced']['indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->indent) ? $item->indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];
    $element['vt_layout']['layout']['lg']['advanced']['reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->reverse_indent) ? $item->reverse_indent : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#suffix' => '/12',
    ];


    $element['vt_layout']['layout']['distances'] = array(
      '#type' => 'details',
      '#title' => $this->t('Distances'),
      '#description' => $this->t('Set margins and paddings for this container.'),
    );
    $element['vt_layout']['layout']['distances']['margin_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->margin_top) ? $item->margin_top : 'none',
    ];
    $element['vt_layout']['layout']['distances']['margin_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->margin_right) ? $item->margin_right : 'default',
    ];
    $element['vt_layout']['layout']['distances']['margin_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->margin_bottom) ? $item->margin_bottom : 'default',
    ];
    $element['vt_layout']['layout']['distances']['margin_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->margin_left) ? $item->margin_left : 'default',
    ];

    $element['vt_layout']['layout']['distances']['padding_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->padding_top) ? $item->padding_top : 'default',
    ];
    $element['vt_layout']['layout']['distances']['padding_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->padding_right) ? $item->padding_right : 'default',
    ];
    $element['vt_layout']['layout']['distances']['padding_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->padding_bottom) ? $item->padding_bottom : 'default',
    ];
    $element['vt_layout']['layout']['distances']['padding_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->padding_left) ? $item->padding_left : 'default',
    ];



    $element['vt_layout']['layout']['misc'] = array(
      '#type' => 'details',
      '#title' => $this->t('Other settings'),
    );
    $element['vt_layout']['layout']['misc']['min_height'] = [
      '#type' => 'select',
      '#title' => $this->t('Minimum height'),
      '#options' => $percentage_options,
      '#default_value' => isset($item->min_height) ? $item->min_height : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#description' => $this->t('TODO'),
    ];
    $element['vt_layout']['layout']['misc']['section_width'] = [
      '#type' => 'select',
      '#title' => $this->t('Section width'),
      '#options' => [
        'viewport_width' => $this->t('Viewport width'),
        'page_width' => $this->t('Page width'),
      ],
      '#default_value' => isset($item->fullsize) ? $item->fullsize : NULL,
      '#empty_option' => $this->t('Unset'),
      '#empty_value' => NULL,
      '#required' => FALSE,
      '#description' => $this->t('TODO'),
    ];

    // ===================================
    // Styling group
    // ===================================
    $element['vt_style'] = array(
      '#type' => 'details',
      '#title' => $this->t('Style'),
      '#group' => 'paragraphs_settings',
    );

    $element['vt_style']['style'] = array(
      '#type' => 'horizontal_tabs',
      '#tree' => TRUE,
      '#prefix' => '<div id="style-wrapper">',
      '#suffix' => '</div>',
    );

    $element['vt_style']['style']['boxstyle'] = array(
      '#type' => 'details',
      '#title' => $this->t('Box style'),
    );
    $element['vt_style']['style']['boxstyle']['boxstyle'] = [
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
      '#default_value' => isset($item->boxstyle) ? $item->boxstyle : 'default',
      '#description' => $this->t('Predefined styling of this container.'),
    ];


    $element['vt_style']['style']['animations'] = array(
      '#type' => 'details',
      '#title' => $this->t('Animations'),
    );


    $animations_allowed_count = 4;
    for ($i=1; $i <= $animations_allowed_count; $i++) {

      $element['vt_style']['style']['animations'][$i] = [
        '#type' => 'details',
        '#title' => $this->t('Animation') . ' ' . $i,
      ];

      $element['vt_style']['style']['animations'][$i]['events'] = [
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
        '#default_value' => isset($item->events) ? $item->events : NULL,
        '#description' => '<ul>
          <li><strong>' . $this->t('Entering the viewport') . ':</strong> ' . $this->t('Animates if the element enters the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Leaving the viewport') . ':</strong> ' . $this->t('Animates if the element leaves the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Hover the element') . ':</strong> ' . $this->t('Animation starts when entering the element with the cursor.') . '</li>
          <li><strong>' . $this->t('Hover the (outer) section') . ':</strong> ' . $this->t('Animation starts when entering the outer section with the cursor.') . '</li>
        </ul>',
      ];
      $element['vt_style']['style']['animations'][$i]['offset'] = [
        '#type' => 'select',
        '#title' => $this->t('Offset'),
        '#options' => array_merge($percentage_negative_options, $percentage_options),
        '#default_value' => isset($item->offset) ? $item->offset : NULL,
        '#empty_option' => $this->t('Unset'),
        '#empty_value' => NULL,
        '#required' => FALSE,
        '#description' => $this->t('Offset for the animation to start.'),
        '#states' => [
          'visible' => [
            'select[name="field_vt_style_animations_events"]' => [
              'value' => [
                'enter_viewport',
                'leave_viewport'
              ]
            ]
          ]
        ]
      ];
      $element['vt_style']['style']['animations'][$i]['delay'] = [
        '#title' => t('Delay'),
        '#type' => 'textfield',
        '#default_value' => isset($item->delay) ? $item->delay : '',
        '#suffix' => 'ms',
        '#description' => $this->t('Pause the animation, before running.'),
      ];
      $element['vt_style']['style']['animations'][$i]['animation'] = [
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
        '#default_value' => isset($item->animation) ? $item->animation : NULL,
        '#description' => $this->t('Choose the animation to run on the event.'),
      ];
    }

    $element['vt_style']['style']['textstyle'] = array(
      '#type' => 'details',
      '#title' => $this->t('Text style'),
    );
    $element['vt_style']['style']['textstyle']['textstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Text style'),
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
      '#default_value' => isset($item->textstyle) ? $item->textstyle : 'default',
      '#description' => $this->t('TODO'),
    ];

    // ===================================
    // Expert settings group
    // ===================================
    $element['vt_expert'] = array(
      '#type' => 'details',
      '#title' => $this->t('Expert'),
      '#group' => 'paragraphs_settings',
    );
    $element['vt_expert']['classes_additional'] = array(
      '#title' => t('Additional classes'),
      '#type' => 'textfield',
      '#default_value' => isset($item->classes_additional) ? $item->classes_additional : '',
      '#description' => $this->t('<strong>Experts:</strong> Enter special CSS classes to apply separated by space.'),
    );

    return $element;
  }
}
