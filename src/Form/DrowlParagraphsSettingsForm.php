<?php

/**
 * @file
 * Contains \Drupal\drowl_paragraphs\Form\DrowlParagraphsSettingsForm.
 */

namespace Drupal\drowl_paragraphs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Administration settings form.
 */
class DrowlParagraphsSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'drowl_paragraphs_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drowl_paragraphs.settings');
    $settings = $config->get();


    $form['defaults'] = [
      '#type' => 'details',
      '#attributes' => [
        'id' => 'drowl-paragraphs-defaults-wrapper',
      ],
      '#title' => $this->t('Defaults'),
      '#description' => $this->t('Set the global defaults for DROWL paragraphs.'),
    ];

    $form['defaults']['container_slides'] = [
      '#type' => 'details',
      '#title' => $this->t('Container Slides'),
      '#description' => $this->t('Configuration for paragraph type "Container Slide"'),
    ];
    $slide_amount_options = array_combine(range(1, 10), range(1, 10));
    $form['defaults']['container_slides']['default_slide_amount_sm'] = [
      '#type' => 'select',
      '#title' => $this->t('Visible elements (Small devices)'),
      '#description' => $this->t('Set the number of slide elements to show on small devices'),
      '#default_value' => !empty($settings['defaults']['container_slides']['default_slide_amount_sm']) ? $settings['defaults']['container_slides']['default_slide_amount_sm'] : 1,
      '#options' => $slide_amount_options,
    ];
    $form['defaults']['container_slides']['default_slide_amount_md'] = [
      '#type' => 'select',
      '#title' => $this->t('Visible elements (Medium devices)'),
      '#description' => $this->t('Set the number of slide elements to show on medium devices'),
      '#default_value' => !empty($settings['defaults']['container_slides']['default_slide_amount_md']) ? $settings['defaults']['container_slides']['default_slide_amount_md'] : 1,
      '#options' => $slide_amount_options,
    ];
    $form['defaults']['container_slides']['default_slide_amount_lg'] = [
      '#type' => 'select',
      '#title' => $this->t('Visible elements (Large devices)'),
      '#description' => $this->t('Set the number of slide elements to show on large devices'),
      '#default_value' => !empty($settings['defaults']['container_slides']['default_slide_amount_lg']) ? $settings['defaults']['container_slides']['default_slide_amount_lg'] : 1,
      '#options' => $slide_amount_options,
    ];

    $form['defaults']['breakpoint_mapping_sizes_fallback'] = [
      '#type' => 'details',
      '#title' => $this->t('Breakpoint mapping fallbacks'),
      '#description' => $this->t('Fallback values if breakpoint mappings can not be determined.'),
    ];
    $form['defaults']['breakpoint_mapping_sizes_fallback']['md'] = [
      '#type' => 'textfield',
      '#size' => 5,
      '#title' => $this->t('Breakpoint fallback (Medium devices) in px'),
      '#description' => $this->t('The fallback value to use when the breakpoint could not be determined from Drupal breakpoints.yml (Breakpoint mapping)'),
      '#default_value' => !empty($settings['defaults']['breakpoint_mapping_sizes']['breakpoint_mapping_sizes_fallback_md']) ? $settings['defaults']['breakpoint_mapping_sizes']['breakpoint_mapping_sizes_fallback_md'] : 640,
    ];

    $form['defaults']['breakpoint_mapping_sizes_fallback']['lg'] = [
      '#type' => 'textfield',
      '#size' => 5,
      '#title' => $this->t('Breakpoint fallback (Large devices) in px'),
      '#description' => $this->t('The fallback value to use when the breakpoint could not be determined from Drupal breakpoints.yml (Breakpoint mapping)'),
      '#default_value' => !empty($settings['defaults']['breakpoint_mapping_sizes']['breakpoint_mapping_sizes_fallback_lg']) ? $settings['defaults']['breakpoint_mapping_sizes']['breakpoint_mapping_sizes_fallback_lg'] : 1024,
    ];


    // ===================== BREAKPOINTS ===================================
    $breakpointManager = \Drupal::service('breakpoint.manager');
    $breakpoint_group = $form_state->hasValue(array(
      'breakpoints',
      'breakpoint_group',
    )) ? $form_state->getValue(array(
      'breakpoints',
      'breakpoint_group',
    )) : (isset($settings['breakpoint_group']) ? $settings['breakpoint_group'] : 'seven');


    $form['breakpoints'] = [
      '#type' => 'details',
      '#attributes' => [
        'id' => 'drowl-paragraphs-breakpoints-wrapper',
      ],
      '#title' => $this->t('Breakpoint mapping'),
      '#description' => $this->t('Define the breakpoint mapping for DROWL paragraphs Small / Medium / Large settings, for example for slick.'),
    ];

    $form['breakpoints']['breakpoint_group'] = [
      '#type' => 'select',
      '#title' => $this->t('Breakpoint group'),
      '#default_value' => $breakpoint_group,
      '#options' => $breakpointManager->getGroups(),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::breakpointMappingFormAjax',
        'wrapper' => 'drowl-paragraphs-breakpoint-mapping',
      ],
    ];

    $form['breakpoints']['breakpoint_mapping'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'drowl-paragraphs-breakpoint-mapping',
      ],
    ];

    $breakpoints = $breakpointManager->getBreakpointsByGroup($breakpoint_group);
    foreach ($breakpoints as $breakpoint_id => $breakpoint) {
      foreach ($breakpoint->getMultipliers() as $multiplier) {
        // We have to explode group and id here for the array otherwise config will not save it and throw an exception because dots are not allowed as keys in configuration.
        $breakpoint_id_exploded = explode('.', $breakpoint_id);
        $group = $breakpoint_id_exploded[0];
        $id = $breakpoint_id_exploded[1];
        $label = $multiplier . ' ' . $breakpoint->getLabel() . ' [' . $breakpoint->getMediaQuery() . ']';
        $form['breakpoints']['breakpoint_mapping'][$group][$id][$multiplier] = [
          '#type' => 'details',
          '#title' => $label,
        ];

        $form['breakpoints']['breakpoint_mapping'][$group][$id][$multiplier]['size_mapping'] = [
          '#title' => $this->t('Map device size'),
          '#type' => 'select',
          '#options' => [
            'sm' => $this->t('Small devices'),
            'md' => $this->t('Medium devices'),
            'lg' => $this->t('Large devices'),
          ],
          '#default_value' => isset($settings['breakpoint_mapping'][$group][$id][$multiplier]['size_mapping']) ? $settings['breakpoint_mapping'][$group][$id][$multiplier]['size_mapping'] : NULL,
        ];
      }
    }
    // ===================== BREAKPOINTS END ===================================

    $form['#tree'] = TRUE;
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('drowl_paragraphs.settings');
    $form_values = $form_state->getValues();

    $breakpoint_group = $form_values['breakpoints']['breakpoint_group'];
    $breakpoint_mapping = $form_values['breakpoints']['breakpoint_mapping'];
    // Calculate min / max for breakpoints
    $breakpoint_mapping_sizes = array();
    if (!empty($breakpoint_mapping)) {
      $breakpoint_mapping_sizes = self::breakpointMappingToDeviceSizes($breakpoint_mapping);
    }

    $config->set('breakpoint_group', $breakpoint_group)
      ->set('breakpoint_mapping', $breakpoint_mapping)
      ->set('breakpoint_mapping_sizes', $breakpoint_mapping_sizes)
      ->set('defaults', $form_values['defaults'])
      ->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * Get the form for mapping breakpoints to image styles.
   */
  public function breakpointMappingFormAjax($form, FormStateInterface $form_state) {
    return $form['breakpoints']['breakpoint_mapping'];
  }

  protected static function getMinMaxFromMediaQuery($mediaQuery) {
    $re = '/\d*(min-width|max-width):\s*(\d+\s?)(px|em|rem)/';
    preg_match_all($re, $mediaQuery, $matches, PREG_SET_ORDER, 0);
    $result = array();
    if (!empty($matches)) {
      $matches_count = count($matches);
      if ($matches_count <= 2) {
        foreach ($matches as $match) {
          $match_count = count($match);
          if ($match_count == 4) {
            $lastResult = [
              'mediaQuery' => $mediaQuery,
              'type' => $match[1], // min-width / max-width
              'size' => $match[2], // 1200
              'unit' => $match[3], // px / em / rem
            ];
            $result[$match[1]] = $lastResult;
          }
          if ($matches_count == 1) {
            if ($lastResult['type'] == 'max-width') {
              // Add pseudo entry for the min-width (starting from 0)
              $result['min-width'] = [
                'mediaQuery' => $mediaQuery,
                'type' => 'min-width', // min-width / max-width
                'size' => 0, // 1200
                'unit' => $lastResult['unit'], // px / em / rem
              ];
            }
            elseif ($lastResult['type'] == 'min-width') {
              // Add pseudo entry for the max-width to ensure we always deliver both values:
              // This is a bit dirty. Remove if it leads to more problems than it solves.
              $result['max-width'] = [
                'mediaQuery' => $mediaQuery,
                'type' => 'max-width', // min-width / max-width
                'size' => 99999999, // 1200
                'unit' => $lastResult['unit'], // px / em / rem
              ];
            }
          }
          elseif ($matches_count == 0) {
            \Drupal::logger('drowl_paragraphs')
              ->notice('getMinMaxFromMediaQuery: No matches in @mediaQuery. Query not supported. That may lead to unwanted conditions.', array('@mediaQuery' => $mediaQuery));
          }
        }
      }
    }
    else {
      \Drupal::logger('drowl_paragraphs')
        ->notice('getMinMaxFromMediaQuery: More than 2 matches in @mediaQuery. Query not supported. That may lead to unwanted conditions.', array('@mediaQuery' => $mediaQuery));
    }
    return $result;
  }

  protected function breakpointMappingToDeviceSizes(array $breakpoint_mapping = array()) {
    $breakpoint_mapping_sizes = [];
    if (!empty($breakpoint_mapping)) {
      foreach ($breakpoint_mapping as $group => $idArray) {
        foreach ($idArray as $id => $multiplierArray) {
          foreach ($multiplierArray as $multiplier => $size) {
            $sizeMapping = $size['size_mapping'];
            $breakpointManager = \Drupal::service('breakpoint.manager');
            $breakpoints = $breakpointManager->getBreakpointsByGroup($group);
            $breakpoint = $breakpoints[$group . '.' . $id];
            $mediaQuery = $breakpoint->getMediaQuery();
            $minMaxArray = self::getMinMaxFromMediaQuery($mediaQuery);
            if (!empty($minMaxArray)) {
              foreach ($minMaxArray as $type => $values) {
                if (!empty($breakpoint_mapping_sizes[$sizeMapping][$type])) {
                  $compare = $breakpoint_mapping_sizes[$sizeMapping][$type];
                  if ($type == 'max-width' && (int) $values['size'] > (int) $compare['size']) {
                    // Override if compared max-width is higher
                    $breakpoint_mapping_sizes[$sizeMapping][$type] = $values;
                  }
                  elseif ($type == 'min-width' && (int) $values['size'] < (int) $compare['size']) {
                    // Override if compared max-width is higher
                    $breakpoint_mapping_sizes[$sizeMapping][$type] = $values;
                  }
                }
                else {
                  // No values for this size yet:
                  $breakpoint_mapping_sizes[$sizeMapping][$type] = $values;
                }
              }
            }
          }
        }
      }
    }
    return $breakpoint_mapping_sizes;
  }

}
