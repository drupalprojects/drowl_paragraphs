<?php

namespace Drupal\drowl_paragraphs\Plugin\Field\FieldType;

use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;

/**
 * Field type "drowl_paragraphs_settings".
 *
 * @FieldType(
 *   id = "drowl_paragraphs_settings",
 *   label = @Translation("DROWL Paragraphs settings"),
 *   description = @Translation("DROWL Paragraphs settings field."),
 *   category = @Translation("DROWL Paragraphs settings"),
 *   default_widget = "drowl_paragraphs_settings_default",
 *   default_formatter = "drowl_paragraphs_settings_default",
 * )
 */
class DrowlParagraphsSettingsItem extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $output = array();
    $output['columns']['layout_sm_columns'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => FALSE,
    );
    $output['columns']['layout_sm_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );
    $output['columns']['layout_sm_reverse_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );


    $output['columns']['layout_md_columns'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => FALSE,
    );
    $output['columns']['layout_md_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );
    $output['columns']['layout_md_reverse_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );

    $output['columns']['layout_lg_columns'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => FALSE,

    );
    $output['columns']['layout_lg_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );
    $output['columns']['layout_lg_reverse_indent'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );

    $output['columns']['layout_margin_top'] = array(
      'type' => 'varchar',
      'length' => 16,
    );
    $output['columns']['layout_margin_right'] = array(
      'type' => 'varchar',
      'length' => 16,
    );
    $output['columns']['layout_margin_bottom'] = array(
      'type' => 'varchar',
      'length' => 16,
    );
    $output['columns']['layout_margin_left'] = array(
      'type' => 'varchar',
      'length' => 16,

    );
    $output['columns']['layout_padding_top'] = array(
      'type' => 'varchar',
      'length' => 16,

    );
    $output['columns']['layout_padding_right'] = array(
      'type' => 'varchar',
      'length' => 16,
    );
    $output['columns']['layout_padding_bottom'] = array(
      'type' => 'varchar',
      'length' => 16,
    );
    $output['columns']['layout_padding_left'] = array(
      'type' => 'varchar',
      'length' => 16,
    );

    $animations_allowed_count = 4;
    for ($i=1; $i <= $animations_allowed_count; $i++) {
      $output['columns']['style_animation_' . $i . '_events'] = array(
        'type' => 'varchar',
        'length' => 64,
      );
      $output['columns']['style_animation_' . $i . '_animation'] = array(
        'type' => 'varchar',
        'length' => 64,
      );
      $output['columns']['style_animation_' . $i . '_offset'] = array(
        'type' => 'int',
        'size' => 'tiny',
      );
      $output['columns']['style_animation_' . $i . '_delay'] = array(
        'type' => 'int',
        'size' => 'small',
        'unsigned' => TRUE,
      );
      $output['columns']['style_animation_' . $i . '_transition_duration'] = array(
        'type' => 'int',
        'size' => 'small',
        'unsigned' => TRUE,
      );
    }

    $output['columns']['layout_min_height'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );
    $output['columns']['layout_section_width'] = array(
      'type' => 'varchar',
      'length' => 64,
    );
    $output['columns']['layout_align_children_vertical'] = array(
      'type' => 'varchar',
      'length' => 32,
    );
    $output['columns']['layout_align_children_horizontal'] = array(
      'type' => 'varchar',
      'length' => 32,
    );
    $output['columns']['layout_reverse_order'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );

    $output['columns']['style_boxstyle'] = array(
      'type' => 'varchar',
      'length' => 64,
    );
    $output['columns']['style_textalign'] = array(
      'type' => 'varchar',
      'length' => 64,
    );
    $output['columns']['style_textstyle'] = array(
      'type' => 'varchar',
      'length' => 64,
    );
    $output['columns']['style_textcolumns'] = array(
      'type' => 'varchar',
      'length' => 64,
    );
    $output['columns']['classes_additional'] = array(
      'type' => 'varchar',
      'length' => 255,

    );
    return $output;

  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['layout_sm_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns SM'))
      ->setRequired(FALSE);
    $properties['layout_sm_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Indent SM'))
      ->setRequired(FALSE);
    $properties['layout_sm_reverse_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Reverse indent SM'))
      ->setRequired(FALSE);

    $properties['layout_md_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns MD'))
      ->setRequired(FALSE);
    $properties['layout_md_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Indent MD'))
      ->setRequired(FALSE);
    $properties['layout_md_reverse_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Reverse indent MD'))
      ->setRequired(FALSE);

    $properties['layout_lg_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns LG'))
      ->setRequired(FALSE);
    $properties['layout_lg_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Indent LG'))
      ->setRequired(FALSE);
    $properties['layout_lg_reverse_indent'] = DataDefinition::create('integer')
      ->setLabel(t('Reverse indent LG'))
      ->setRequired(FALSE);

    $properties['layout_margin_top'] = DataDefinition::create('string')
      ->setLabel(t('Margin top'))
      ->setRequired(FALSE);
    $properties['layout_margin_right'] = DataDefinition::create('string')
      ->setLabel(t('Margin right'))
      ->setRequired(FALSE);
    $properties['layout_margin_bottom'] = DataDefinition::create('string')
      ->setLabel(t('Margin bottom'))
      ->setRequired(FALSE);
    $properties['layout_margin_left'] = DataDefinition::create('string')
      ->setLabel(t('Margin left'))
      ->setRequired(FALSE);

    $properties['layout_padding_top'] = DataDefinition::create('string')
      ->setLabel(t('Padding top'))
      ->setRequired(FALSE);
    $properties['layout_padding_right'] = DataDefinition::create('string')
      ->setLabel(t('Padding right'))
      ->setRequired(FALSE);
    $properties['layout_padding_bottom'] = DataDefinition::create('string')
      ->setLabel(t('Padding bottom'))
      ->setRequired(FALSE);
    $properties['layout_padding_left'] = DataDefinition::create('string')
      ->setLabel(t('Padding left'))
      ->setRequired(FALSE);

    $animations_allowed_count = 4;
    for ($i=1; $i <= $animations_allowed_count; $i++) {
      $properties['style_animation_' . $i . '_events'] = DataDefinition::create('string')
        ->setLabel(t('Events'))
        ->setRequired(FALSE);
      $properties['style_animation_' . $i . '_animation'] = DataDefinition::create('string')
        ->setLabel(t('Animation'))
        ->setRequired(FALSE);
      $properties['style_animation_' . $i . '_offset'] = DataDefinition::create('string')
        ->setLabel(t('Viewport animation offset trigger'))
        ->setRequired(FALSE);
      $properties['style_animation_' . $i . '_delay'] = DataDefinition::create('integer')
        ->setLabel(t('Animation delay (ms)'))
        ->setRequired(FALSE);
      $properties['style_animation_' . $i . '_transition_duration'] = DataDefinition::create('integer')
        ->setLabel(t('Transition duration (ms)'))
        ->setRequired(FALSE);
    }

    $properties['layout_min_height'] = DataDefinition::create('integer')
      ->setLabel(t('Min height'))
      ->setRequired(FALSE);
    $properties['layout_section_width'] = DataDefinition::create('string')
      ->setLabel(t('Section width'))
      ->setRequired(FALSE);
    $properties['layout_align_children_vertical'] = DataDefinition::create('string')
      ->setLabel(t('Children vertical alignment'))
      ->setRequired(FALSE);
    $properties['layout_align_children_horizontal'] = DataDefinition::create('string')
      ->setLabel(t('Children horizontal alignment'))
      ->setRequired(FALSE);
    $properties['layout_reverse_order'] = DataDefinition::create('boolean')
      ->setLabel(t('Reverse order'))
      ->setRequired(FALSE);
    $properties['style_boxstyle'] = DataDefinition::create('string')
      ->setLabel(t('Box style'))
      ->setRequired(FALSE);
    $properties['style_textalign'] = DataDefinition::create('string')
      ->setLabel(t('Text align'))
      ->setRequired(FALSE);
    $properties['style_textstyle'] = DataDefinition::create('string')
      ->setLabel(t('Text style'))
      ->setRequired(FALSE);
    $properties['style_textcolumns'] = DataDefinition::create('string')
      ->setLabel(t('Text style'))
      ->setRequired(FALSE);
    $properties['classes_additional'] = DataDefinition::create('string')
      ->setLabel(t('Custom classes'))
      ->setRequired(FALSE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    // $item = $this->getValue();
    $item = $this->getValue();
    foreach($item as $key => $value){
      if($key !== '_attributes'){
        // One item is not null
        if($value !== NULL && $value !== ''){
          return FALSE;
        }
      }
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = array();
    return $element;
  }


  /**
   * {@inheritdoc}
   */
  public function preSave() {
    // Sanitize classes_additional:
    $classes_additional = $this->get('classes_additional')->getValue();
    $classes_additional_sanitized = '';
    if(!empty($classes_additional)){
      $classes_additional_array = explode(' ', trim($classes_additional));
      foreach($classes_additional_array as $class){
        $classes_additional_sanitized .= ' ' . trim(\Drupal\Component\Utility\Html::getClass(trim($class)));
      }
    }
    $this->get('classes_additional')->setValue(trim($classes_additional_sanitized));
  }
}
