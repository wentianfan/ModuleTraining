<?php

namespace Drupal\youtube_video_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'youtube_video_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "youtube_video_formatter",
 *   module = "youtube_video_formatter",
 *   label = @Translation("YouTube Video"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class YoutubeFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'youtube_video',
        '#youtube_id' => $item->value,
        '#width' => $this->getSetting('width'), 
        '#height' => $this->getSetting('height'), 
      ];
    }

    return $elements;
  }

  /**
   * {@inheritdoc} 
   */

  public static function defaultSettings() {
    return[
      'width' => '',
      'height' => '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm (array $form, FormStateInterface $form_state ){
    $element['width'] = [
      'type' => 'number',
      'title' => 'video width',
      'default_value' => '800',
      '#required' => TRUE,
    ];

    $element['height'] = [
      'type' => 'number',
      'title' => 'video height',
      'default_value' => '600',
      '#required' => TRUE,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary(){
    $summary = [];

    $summary[] = 'The width is '. $this->getSetting('width');
    $summary[] = 'The height is '. $this->getSetting('height');

    return $summary;
  } 

}

