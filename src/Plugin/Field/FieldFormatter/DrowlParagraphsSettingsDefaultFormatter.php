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
      $build = array(
        '#type' => 'container',
        'value' => array()
      );
      if(!empty($item)){
        foreach($item as $key => $value){
          $build['value'][$key] = [
            '#type' => 'container',
            '#title' => $value->getName(),
            '#attributes' => array(
              'class' => \Drupal\Component\Utility\Html::cleanCssIdentifier($value->getName()),
            ),
            '#plain_text' => $value->getValue(),
            // '#markup' => t('Name'),
          ];
        }
      }
      $output[$delta] = $build;
    }
    return $output;
  }

}
