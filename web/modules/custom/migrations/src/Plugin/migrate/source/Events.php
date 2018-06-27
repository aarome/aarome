<?php
/**
 * @file
 * Contains Drupal\migrations\Plugin\migrate\source\Events
 */
namespace Drupal\migrations\Plugin\migrate\source;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "events"
 * )
 */
class Events extends SqlBase {
  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('node', 'n')
      ->fields('n', [
          'nid',
          'title',
          'type'
        ])
      ->condition('n.type','events','=');
    return $query;
  }
  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'nid' => $this->t('Legacy identifier'),
      'title' => $this->t('Title')
    ];
    return $fields;
  }
  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'nid' => [
        'type' => 'integer',
        'alias' => 'n',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    // Get Node revision body and teaser/summary value.
    $body_data = $this->select('field_data_body')
      ->fields('field_data_body', ['body_value', 'language'])
      ->condition('entity_id', $row->getSourceProperty('nid'), '=')
      ->condition('field_data_body.language', 'en', '=')
      ->execute()
      ->fetchAll();
    $row->setSourceProperty('language', $body_data[0]['language']);  
    $row->setSourceProperty('body', $body_data[0]['body']);
    return parent::prepareRow($row);
  }

}