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
class DrowlParagraphsSettingsDefaultWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
        'open' => FALSE
      ) + parent::defaultSettings();
  }


  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);
    $element['open'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Display element open by default.'),
      '#default_value' => $this->getSetting('open'),
    );
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = parent::settingsSummary();
    if ($this->getSetting('open')) {
      $summary[] = $this->t('Display element open by default.');
    } else {
      $summary[] = $this->t('Display element closed by default.');
    }
    return $summary;

  }

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

    $element['layout'] = array(
      '#type' => 'horizontal_tabs',
      '#theme_wrappers' => array('horizontal_tabs'),
      '#title' => $this->t('Layout'),
      '#tree' => TRUE,
    );

    $element['layout']['sm'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Small devices'),
      '#group' => 'layout'
    );

    $element['layout']['sm']['layout_sm_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_columns) ? $item->layout_sm_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-columns'),
    ];
    $element['layout']['sm']['layout_sm_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_indent) ? $item->layout_sm_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-indent'),
    ];
    $element['layout']['sm']['layout_sm_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_reverse_indent) ? $item->layout_sm_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-reverse-indent'),
    ];
    //
    //
    //    // Medium Devices
    $element['layout']['md'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Medium devices'),
      '#group' => 'layout'
    );
    $element['layout']['md']['layout_md_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_columns) ? $item->layout_md_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-columns'),
    ];
    $element['layout']['md']['layout_md_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_indent) ? $item->layout_md_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-indent'),
    ];
    $element['layout']['md']['layout_md_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_md_reverse_indent) ? $item->layout_md_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-reverse-indent'),
    ];
    //
    //    // Large Devices
    $element['layout']['lg'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Large devices'),
      '#group' => 'layout'
    );
    $element['layout']['lg']['layout_lg_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_columns) ? $item->layout_lg_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-columns'),
    ];
    $element['layout']['lg']['layout_lg_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation') ,
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_indent) ? $item->layout_lg_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-indent'),
    ];
    $element['layout']['lg']['layout_lg_reverse_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Reverse Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_reverse_indent) ? $item->layout_lg_reverse_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-reverse-indent'),
    ];


    $element['layout']['spacing'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Spacing'),
      '#group' => 'layout'
    );
    $element['layout']['spacing']['layout_margin_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_top) ? $item->layout_margin_top : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-top'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_margin_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_right) ? $item->layout_margin_right : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-right'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_margin_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_bottom) ? $item->layout_margin_bottom : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-bottom'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_margin_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_left) ? $item->layout_margin_left : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-left'),
      '#empty_option' => $this->t('Default'),
    ];

    $element['layout']['spacing']['layout_padding_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_top) ? $item->layout_padding_top : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-top'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_padding_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_right) ? $item->layout_padding_right : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-right'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_padding_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_bottom) ? $item->layout_padding_bottom : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-bottom'),
      '#empty_option' => $this->t('Default'),
    ];
    $element['layout']['spacing']['layout_padding_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_left) ? $item->layout_padding_left : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-left'),
      '#empty_option' => $this->t('Default'),
    ];


    $element['layout']['other'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Other'),
      '#group' => 'layout'
    );
    $element['layout']['other']['layout_min_height'] = [
      '#type' => 'select',
      '#title' => $this->t('Minimum height'),
      '#options' => $percentage_options,
      '#default_value' => isset($item->layout_min_height) ? $item->layout_min_height : 0,
      '#empty_option' => $this->t('- None -'),
      '#required' => FALSE,
      '#description' => $this->t('The minimum height of the element. Mostly used to set the rows items height equally.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-min-height'),
      '#empty_value' => 0,
    ];
    $element['layout']['other']['layout_section_width'] = [
      '#type' => 'select',
      '#title' => $this->t('Section width'),
      '#options' => [
        'viewport_width' => $this->t('Viewport width'),
        'page_width' => $this->t('Page width'),
      ],
      '#default_value' => isset($item->layout_section_width) ? $item->layout_section_width : NULL,
      '#empty_option' => $this->t('- None -'),
      '#required' => FALSE,
      '#description' => $this->t('The width of the element. Viewport width = screen width, Page width = content width.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-section-width'),
    ];
    $element['layout_help'] = [
      '#type' => 'item',
      '#title' => $this->t('Help') . ':',
      '#markup' => $this->t('Help'),
      '#attributes' => ['class' => ['layout-help']],
    ];
    //
    //    // ===================================
    //    // Styling group
    //    // ===================================


    $element['style'] = array(
      '#type' => 'horizontal_tabs',
      '#theme_wrappers' => array('horizontal_tabs'),
      '#title' => $this->t('Style'),
      '#tree' => TRUE,
    );

    $element['style']['style_boxstyle'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Box style'),
      '#group' => 'style'
    );

    $element['style']['style_boxstyle']['style_boxstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Box style'),
      '#options' => [
        'default' => $this->t('Default'),
        'transparent-light' => $this->t('Transparent light'),
        'transparent-dark' => $this->t('Transparent dark'),
        'info' => $this->t('Info'),
        'warning' => $this->t('Warning'),
        'alert' => $this->t('Alarm'),
        'success' => $this->t('Success'),
      ],
      '#empty_option' => $this->t('- None -'),
      '#default_value' => isset($item->style_boxstyle) ? $item->style_boxstyle : '',
      '#description' => $this->t('Predefined styling of this container.'),
      '#wrapper_attributes' => array('class' => 'form-item--style-boxstyle'),
    ];

    $element['style']['animations'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Animations'),
      '#group' => 'layout'
    );
    $animations_allowed_count = 4;
    for ($i=1; $i <= $animations_allowed_count; $i++) {
      $element['style']['animations']['style_animation_' . $i] = [
        '#type' => 'details',
        '#title' => $this->t('Animation') . ' ' . $i,
      ];

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_events'] = [
        '#type' => 'select',
        '#title' => $this->t('Event'),
        '#options' => [
          'enter-viewport' => $this->t('Entering the viewport'),
          'leave-viewport' => $this->t('Leaving the viewport'),
          'hover-element' => $this->t('Hover the element'),
          'hover-section' => $this->t('Hover the (outer) section'),
        ],
        '#required' => FALSE,
        '#multiple' => FALSE,
        '#empty_option' => $this->t('- None -'),
        '#default_value' => isset($item->{'style_animation_'.$i.'_events'}) ? $item->{'style_animation_'.$i.'_events'} : '',
        '#description' => '<ul>
          <li><strong>' . $this->t('Entering the viewport') . ':</strong> ' . $this->t('Animates if the element enters the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Leaving the viewport') . ':</strong> ' . $this->t('Animates if the element leaves the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Hover the element') . ':</strong> ' . $this->t('Animation starts when entering the element with the cursor.') . '</li>
          <li><strong>' . $this->t('Hover the (outer) section') . ':</strong> ' . $this->t('Animation starts when entering the outer section with the cursor.') . '</li>
        </ul>',
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-events'),
      ];

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_animation'] = [
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
        '#default_value' => isset($item->{'style_animation_'.$i.'_animation'}) ? $item->{'style_animation_'.$i.'_animation'} : '',
        '#description' => $this->t('Choose the animation to run on the event.'),
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-animation'),
      ];

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_offset'] = [
        '#type' => 'select',
        '#title' => $this->t('Viewport animation offset trigger'),
        '#options' => array_merge($percentage_negative_options, $percentage_options),
        '#default_value' => isset($item->{'style_animation_'.$i.'_offset'}) ? $item->{'style_animation_'.$i.'_offset'} : '',
        '#empty_option' => $this->t('- None -'),
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

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_delay'] = [
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

    $element['style']['style_textstyle'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Box style'),
      '#group' => 'style'
    );
    $element['style']['style_textstyle']['style_textstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Text alignment / style'),
      '#options' => [
        'text-left' => $this->t('Left aligned'),
        'text-right' => $this->t('Right aligned'),
        'text-center' => $this->t('Centered'),
        'text-justify' => $this->t('Justified'),
        'lead' => $this->t('Lead'),
        $this->t('Columns')->__toString() => array(
          'columns-2' => t('2 Spalten'),
          'columns-3' => t('3 Spalten'),
          'columns-4' => t('4 Spalten'),
          'columns-5' => t('5 Spalten'),
        ),
      ],
      '#required' => FALSE,
      '#multiple' => FALSE,
      '#empty_option' => $this->t('Default'),
      '#default_value' => isset($item->style_textstyle) ? $item->style_textstyle : '',
      '#description' => $this->t('The text alignment / style, if this element contains text.'),
      '#wrapper_attributes' => array('class' => 'form-item--style-textstyle'),
    ];

    // ===================================
    // Expert settings group
    // ===================================
    $element['style']['expert'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-address-book" aria-hidden="true"></i> ' . $this->t('Expert'),
      '#group' => 'style'
    );
    $element['style']['expert']['classes_additional'] = array(
      '#title' => t('Additional classes'),
      '#type' => 'textfield',
      '#default_value' => isset($item->classes_additional) ? $item->classes_additional : '',
      '#description' => $this->t('<strong>Experts:</strong> Enter special CSS classes to apply separated by space.'),
      '#wrapper_attributes' => array('class' => 'form-item--classes-additional'),
    );

    $element['style_help'] = [
      '#type' => 'item',
      '#title' => $this->t('Help') . ':',
      '#markup' => $this->t('Help'),
      '#attributes' => ['class' => ['style-help']],
    ];

    // If cardinality is 1, ensure a label is output for the field by wrapping
    // it in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()->getCardinality() == 1) {
      $element += array(
        '#type' => 'details',
        '#open' => $this->getSetting('open') ? TRUE : FALSE,
      );
    }

    return $element;
  }

  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    // #webksde#JP20171115: Due to unknown reasons (or a core bug?) the form can't handle
    // nested values from field groups etc. So the values have to be a flat key => value array.
    // - Changing #tree to true or false didn't help also we already tested with clean core installation etc.
    // - Perhaps this is expected behaviour an this function exists to create a flat array?
    // - Presumably part of the reason might be that in many cases there is
    //     only the main $element which we already transform into a field group because we need more fields
    // - No suiting issue was found yet. If this hack creates follow-up issues we should perhaps create one.

    // Turn the nested array structure into a flat key => value array.
    $values_flat = [];
    if(!empty($values)){
      foreach($values as $delta => $field){
        $it = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($field));
        foreach($it as $k => $v) {
          $values_flat[$delta][$k] = $v;
        }
      }
    }
    return $values_flat;
  }
}
