<?php

/**
 * @file
 * Contains date_filter.module.
 */

use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Implements hook_help().
 */
function date_filter_help($route_name, RouteMatchInterface $route_match) {
  switch ($route_name) {
    // Main module help for the date_filter module.
    case 'help.page.date_filter':
      $output = '';
      $output .= '<h3>' . t('About') . '</h3>';
      $output .= '<p>' . t('Provides a custom date filter for news, events, people.') . '</p>';
      return $output;

    default:
  }
}

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Implements hook_form_FORM_ID_alter().
 */
function date_filter_form_views_exposed_form_alter(&$form, FormStateInterface $form_state, $form_id) {
  if (isset($form['#id']) && $form['#id'] == 'views-exposed-form-news-events-press-lists-page-events-list') {

    $options = &drupal_static(__FUNCTION__);
    if (is_null($options)) {
      $cid = 'date_filter:events:year';
      $data = \Drupal::cache()->get($cid);
      if (!$data) {
        $options = [];
        $options['all'] = new TranslatableMarkup('- All -');
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'events')
          ->condition('status', 1)
          ->sort('field_events_event_dates', 'ASC');
        $result = $query->execute();
        if ($result) {
          $nodes = Node::loadMultiple($result);
          foreach ($nodes as $node) {
            $date = $node->field_events_event_dates->value;
            if ($date) {
              $date = new DrupalDateTime($date, new DateTimeZone('UTC'));
              $year = $date->format('Y');
              if (!isset($options[$year])) {
                $options[$year] = $year;
              }
            }
          }
        }

        $cache_tags = ['node:events:year'];
        \Drupal::cache()->set($cid, $options, CacheBackendInterface::CACHE_PERMANENT, $cache_tags);
      }
      else {
        $options = $data->data;
      }

    }
    
    $form['year'] = [
      '#title' => new TranslatableMarkup('By year'),
      '#type' => 'select',
      '#options' => $options,
      '#size' => NULL,
      '#default_value' => 'All',
    ];
    
  }
}