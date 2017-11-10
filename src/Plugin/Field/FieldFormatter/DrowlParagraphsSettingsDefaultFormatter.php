<?php

namespace Drupal\drowl_paragraphs\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Field formatter "drowl_paragraphs_settings_default".
 *
 * @FieldFormatter(
 *   id = "drowl_paragraphs_settings_default",
 *   label = @Translation("DROWL Paragraphs settings default"),
 *   field_types = {
 *     "drowl_paragraphs_settings",
 *   }
 * )
 */
class DrowlParagraphsSettingsDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $output = array();
    return $output;

  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    return $summary;

  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $output = array();

    // Iterate over every field item and build a renderable array
    // (I call them rarray for short) for each item.
    foreach ($items as $delta => $item) {

      $build = array();

      // TODO - hier weiter!

      // Render burrito name. Nothing fancy as such.
      // We build a "container" element, within which we render
      // 2 child elements: one, the label of the property (Name);
      // two, the value of the property (The name of the burrito
      // as entered by the user).
      $build['name'] = array(
        '#type' => 'container',
        '#attributes' => array(
          'class' => array('burrito__name'),
        ),
        'label' => array(
          '#type' => 'container',
          '#attributes' => array(
            'class' => array('field__label'),
          ),
          '#markup' => t('Name'),
        ),
        'value' => array(
          '#type' => 'container',
          '#attributes' => array(
            'class' => array('field__item'),
          ),
          // We use #plain_text instead of #markup to prevent XSS.
          // plain_text will clean up the burrito name and render an
          // HTML entity encoded string to prevent bad-guys from
          // injecting JavaScript.
          '#plain_text' => $item->name,
        ),
      );

      $output[$delta] = $build;

    }

    return $output;

  }

}
