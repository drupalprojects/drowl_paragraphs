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
        'open' => FALSE,
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
    }
    else {
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
      'auto' => $this->t('automatic'),
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
      'sm' => 's',
      'md' => 'm',
      'lg' => 'l',
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
      '#title' => '<i class="fa fa-2x fa-mobile" aria-hidden="true"></i><span class="tab-label">' . $this->t('Small devices') . '</span>',
      '#group' => 'layout',
      '#description' => '<i class="fa fa-info-circle" aria-hidden="true"></i> <strong>' . $this->t('Help') . ':</strong> ' . $this->t('Set width and (reverse) indentation for small and larger devices.'),
    );

    // $element['layout_help'] = [
    //   '#type' => 'item',
    //   '#title' => '<i class="fa fa-info-circle" aria-hidden="true"></i> ' . $this->t('Help') . ':',
    //   '#markup' => $this->t('Help'),
    //   '#attributes' => ['class' => ['layout-help']],
    // ];

    $element['layout']['sm']['layout_sm_columns'] = [
      '#type' => 'select',
      '#title' => $this->t('Columns'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_sm_columns) ? $item->layout_sm_columns : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-columns form-item--inline'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-indent form-item--inline'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-sm-reverse-indent form-item--inline'),
    ];

    // Medium Devices
    $element['layout']['md'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-2x fa-tablet" aria-hidden="true"></i><span class="tab-label">' . $this->t('Medium devices') . '</span>',
      '#group' => 'layout',
      '#description' => '<i class="fa fa-info-circle" aria-hidden="true"></i> <strong>' . $this->t('Help') . ':</strong> ' . $this->t('Set width and (reverse) indentation for medium and larger devices.'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-columns form-item--inline'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-indent form-item--inline'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-md-reverse-indent form-item--inline'),
    ];

    // Large Devices
    $element['layout']['lg'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-2x fa-desktop" aria-hidden="true"></i><span class="tab-label">' . $this->t('Large devices') . '</span>',
      '#group' => 'layout',
      '#description' => '<i class="fa fa-info-circle" aria-hidden="true"></i> <strong>' . $this->t('Help') . ':</strong> ' . $this->t('Set width and (reverse) indentation for large devices.'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-columns form-item--inline'),
    ];
    $element['layout']['lg']['layout_lg_indent'] = [
      '#type' => 'select',
      '#title' => $this->t('Indentation'),
      '#options' => $cols_options,
      '#default_value' => isset($item->layout_lg_indent) ? $item->layout_lg_indent : NULL,
      '#empty_option' => $this->t('- None -'),
      '#empty_value' => 0,
      '#required' => FALSE,
      '#field_suffix' => '<span class="form-item__suffix"> / 12</span>',
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-indent form-item--inline'),
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
      '#wrapper_attributes' => array('class' => 'form-item--layout-lg-reverse-indent form-item--inline'),
    ];


    $element['layout']['spacing'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-2x fa-window-maximize" aria-hidden="true"></i><span class="tab-label">' . $this->t('Spacings') . '</span>',
      '#group' => 'layout',
      '#description' => '<i class="fa fa-info-circle" aria-hidden="true"></i> <strong>' . $this->t('Help') . ':</strong> ' . $this->t('Custom spacings - use with care, this could possibly harm the default styling.'),
    );
    // Add further wrapper for the margin (& padding) fields (just for style purposes)
    $element['layout']['spacing']['margin_wrapper'] = [
      '#type' => 'container',
      '#attributes' => ['class' => ['margin-wrapper']],
    ];
    $element['layout']['spacing']['margin_wrapper']['layout_margin_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_top) ? $item->layout_margin_top : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-top'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['layout_margin_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_right) ? $item->layout_margin_right : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-right'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['layout_margin_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_bottom) ? $item->layout_margin_bottom : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-bottom'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['layout_margin_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Margin left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_margin_left) ? $item->layout_margin_left : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-margin-left'),
      '#empty_option' => '-',
    ];
    // Add further inner wrapper for the padding fields (just for style purposes)
    $element['layout']['spacing']['margin_wrapper']['padding_wrapper'] = [
      '#type' => 'container',
      '#attributes' => ['class' => ['padding-wrapper']],
      // Add some further elements / markup
      '#prefix' => '<strong class="margin-label">' . $this->t('Outer') . '</strong><strong class="padding-label">' . $this->t('Inner') . '</strong>',
      '#suffix' => '<i class="content-placeholder fa fa-align-left fa-3x" aria-hidden="true"></i>',
    ];
    $element['layout']['spacing']['margin_wrapper']['padding_wrapper']['layout_padding_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding top'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_top) ? $item->layout_padding_top : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-top'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['padding_wrapper']['layout_padding_right'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding right'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_right) ? $item->layout_padding_right : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-right'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['padding_wrapper']['layout_padding_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding bottom'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_bottom) ? $item->layout_padding_bottom : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-bottom'),
      '#empty_option' => '-',
    ];
    $element['layout']['spacing']['margin_wrapper']['padding_wrapper']['layout_padding_left'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding left'),
      '#options' => $distance_options,
      '#default_value' => isset($item->layout_padding_left) ? $item->layout_padding_left : '',
      '#wrapper_attributes' => array('class' => 'form-item--layout-padding-left'),
      '#empty_option' => '-',
    ];


    $element['layout']['other'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-2x fa-ellipsis-h" aria-hidden="true"></i><span class="tab-label">' . $this->t('Other') . '</span>',
      '#group' => 'layout',
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
        'viewport-width' => $this->t('Viewport width'),
        'page-width' => $this->t('Page width'),
      ],
      '#default_value' => isset($item->layout_section_width) ? $item->layout_section_width : NULL,
      '#empty_option' => $this->t('- None -'),
      '#required' => FALSE,
      '#description' => $this->t('Overrides the container width, ignoring the parent container width. Viewport width = screen width, Page width = content width.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-section-width'),
    ];
    $element['layout']['other']['layout_reverse_order'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Reverse order'),
      '#default_value' => isset($item->layout_reverse_order) ? $item->layout_reverse_order : FALSE,
      '#required' => FALSE,
      '#description' => $this->t('Changes the order of a fixed layout. Eg: If the image is left and the text right, the image is moved to the right and the text to the left.'),
      '#wrapper_attributes' => array('class' => 'form-item--layout-section-width'),
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
      '#title' => '<i class="fa fa-2x fa-paint-brush" aria-hidden="true"></i><span class="tab-label">' . $this->t('Box Style') . '</span>',
      '#group' => 'style',
    );
    $element['style']['style_boxstyle']['style_boxstyle'] = [
      '#type' => 'select',
      '#title' => $this->t('Box style'),
      '#options' => [
        'default' => $this->t('Default'),
        'primary' => $this->t('Primary'),
        'secondary' => $this->t('Secondary'),
        'light' => $this->t('Light'),
        'dark' => $this->t('Dark'),
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
      '#title' => '<i class="fa fa-2x fa-magic" aria-hidden="true"></i><span class="tab-label">' . $this->t('Animations') . '</span>',
      '#group' => 'layout',
      '#description' => '<i class="fa fa-info-circle" aria-hidden="true"></i> <strong>' . $this->t('Help') . ':</strong> ' . $this->t('Set animations for this container, based on specific events.'),
    );
    $animations_allowed_count = 4;
    for ($i = 1; $i <= $animations_allowed_count; $i++) {
      $element['style']['animations']['style_animation_' . $i] = [
        '#type' => 'details',
        '#title' => $this->t('Animation') . ' ' . $i,
      ];
      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_events'] = [
        '#type' => 'select',
        '#title' => $this->t('Event trigger'),
        '#options' => [
          'enter-viewport' => $this->t('Entering the viewport'),
          'leave-viewport' => $this->t('Leaving the viewport'),
          'hover' => $this->t('Hover the element.'),
        ],
        '#required' => FALSE,
        '#multiple' => FALSE,
        '#empty_option' => $this->t('- None -'),
        '#default_value' => isset($item->{'style_animation_' . $i . '_events'}) ? $item->{'style_animation_' . $i . '_events'} : '',
        '#description' => '<ul>
          <li><strong>' . $this->t('Entering the viewport') . ':</strong> ' . $this->t('Animates if the element enters the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Leaving the viewport') . ':</strong> ' . $this->t('Animates if the element leaves the viewport (by scrolling).') . '</li>
          <li><strong>' . $this->t('Hover the element') . ':</strong> ' . $this->t('Animation starts when entering the element with the cursor.') . '</li>
        </ul>',
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-events'),
      ];

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_offset'] = [
        '#type' => 'select',
        '#title' => $this->t('Viewport animation event trigger offset'),
        '#options' => [
          '0' => '0',
          '10' => $this->t('@percent% visible', ['@percent' => '10']),
          '20' => $this->t('@percent% visible', ['@percent' => '20']),
          '30' => $this->t('@percent% visible', ['@percent' => '30']),
          '40' => $this->t('@percent% visible', ['@percent' => '40']),
          '50' => $this->t('@percent% visible', ['@percent' => '50']),
          '60' => $this->t('@percent% visible', ['@percent' => '60']),
          '70' => $this->t('@percent% visible', ['@percent' => '70']),
          '80' => $this->t('@percent% visible', ['@percent' => '80']),
          '90' => $this->t('@percent% visible', ['@percent' => '90']),
          '100' => $this->t('@percent% visible', ['@percent' => '100']),
        ],
        '#default_value' => isset($item->{'style_animation_' . $i . '_offset'}) ? $item->{'style_animation_' . $i . '_offset'} : 0,
        '#empty_option' => $this->t('- None -'),
        '#empty_value' => 0,
        '#required' => FALSE,
        '#description' => $this->t('Entering the viewport') . '/' . $this->t('Leaving the viewport') . ': ' . $this->t('Offset for the animation to start if the element is visible for x %.'),
        '#states' => [
          'visible' => [
            'select[name$="[style][animations][style_animation_' . $i . '][style_animation_' . $i . '_events"]' => [
              'value' => [
                'enter-viewport',
                'leave-viewport',
              ],
            ],
          ],
        ],
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-offset'),
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
        '#default_value' => isset($item->{'style_animation_' . $i . '_animation'}) ? $item->{'style_animation_' . $i . '_animation'} : '',
        '#description' => $this->t('Choose the animation to run on the event.'),
        '#states' => [
          'visible' => [
            'select[name$="[style][animations][style_animation_' . $i . '][style_animation_' . $i . '_events"]' => ['filled' => TRUE],
          ],
        ],
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-animation'),
      ];

      $element['style']['animations']['style_animation_' . $i]['style_animation_' . $i . '_delay'] = [
        '#title' => t('Animation start delay'),
        '#type' => 'number',
        '#min' => '0',
        '#step' => '1',
        '#default_value' => isset($item->{'style_animation_' . $i . '_delay'}) ? $item->{'style_animation_' . $i . '_delay'} : 0,
        '#field_suffix' => 'ms',
        '#description' => $this->t('Delay the animation start. Value in milliseconds (1000ms = 1s)'),
        '#states' => [
          'visible' => [
            'select[name$="[style][animations][style_animation_' . $i . '][style_animation_' . $i . '_events"]' => ['filled' => TRUE],
          ],
        ],
        '#wrapper_attributes' => array('class' => 'form-item--style-animation-delay'),
      ];
    }

    $element['style']['style_textstyle'] = array(
      '#type' => 'details',
      '#title' => '<i class="fa fa-2x fa-align-left" aria-hidden="true"></i><span class="tab-label">' . $this->t('Text Style') . '</span>',
      '#group' => 'style',
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
          'text-columns--2' => t('2 Spalten'),
          'text-columns--3' => t('3 Spalten'),
          'text-columns--4' => t('4 Spalten'),
          'text-columns--5' => t('5 Spalten'),
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
      '#title' => '<i class="fa fa-2x fa-user-secret" aria-hidden="true"></i><span class="tab-label">' . $this->t('Expert') . '</span>',
      '#group' => 'style',
    );
    $element['style']['expert']['classes_additional'] = array(
      '#title' => t('Additional classes'),
      '#type' => 'textfield',
      '#default_value' => isset($item->classes_additional) ? $item->classes_additional : '',
      '#description' => $this->t('<strong>Experts:</strong> Enter special CSS classes to apply separated by space.'),
      '#wrapper_attributes' => array('class' => 'form-item--classes-additional'),
    );

    // If cardinality is 1, ensure a label is output for the field by wrapping
    // it in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()
        ->getCardinality() == 1) {
      $element += array(
        '#type' => 'details',
        '#open' => $this->getSetting('open') ? TRUE : FALSE,
      );
    }

    return $element;
  }

  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    // Turn the nested array structure into a flat key => value array.
    $values_flat = [];
    if (!empty($values)) {
      foreach ($values as $delta => $field) {
        $it = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($field));
        foreach ($it as $k => $v) {
          $values_flat[$delta][$k] = $v;
        }
      }
    }
    return $values_flat;
  }
}
