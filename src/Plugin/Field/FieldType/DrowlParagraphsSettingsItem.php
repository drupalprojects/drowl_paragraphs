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

    module_load_include('inc', 'drowl_paragraphs');

    $output = array();
/*
    $output['columns']['layout_sm_columns'] = array(
      'type' => 'int',
      'size' => 2,
      'unsigned' => TRUE,
    );
    $output['columns']['layout_md_columns'] = array(
      'type' => 'int',
      'size' => 2,
      'unsigned' => TRUE,
    );
    $output['columns']['layout_lg_columns'] = array(
      'type' => 'int',
      'size' => 2,
      'unsigned' => TRUE,
    );

    $output['columns']['layout_misc_min_height'] = array(
      'type' => 'int',
      'size' => 3,
    );
    $output['columns']['layout_misc_fullsize'] = array(
      'type' => 'varchar',
      'length' => 255,
    );
    $output['columns']['layout_distances_margin_top'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_margin_right'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_margin_bottom'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_margin_left'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_padding_top'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_padding_right'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_padding_bottom'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );
    $output['columns']['layout_distances_padding_left'] = array(
      'type' => 'varchar',
      'length' => 16,
      'not null' => TRUE,
      'default' => '',
    );


    $output['columns']['style_boxstyle'] = array(
      'type' => 'varchar',
      'length' => 128,
    );

    $output['columns']['expert_classes_additional'] = array(
      'type' => 'varchar',
      'length' => 255,
      'not null' => TRUE,
      'default' => '',
    );
*/

    return $output;

  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

    module_load_include('inc', 'drowl_paragraphs');

    $properties['layout_sm_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns SM'))
      ->setRequired(FALSE);

    $properties['layout_md_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns MD'))
      ->setRequired(FALSE);

    $properties['layout_xl_columns'] = DataDefinition::create('integer')
      ->setLabel(t('Columns XL'))
      ->setRequired(FALSE);

    return $properties;

  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {

//    $item = $this->getValue();

    // TODO - Is this ok?
    return FALSE;
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
    $output = array();
    return $output;
  }
}
