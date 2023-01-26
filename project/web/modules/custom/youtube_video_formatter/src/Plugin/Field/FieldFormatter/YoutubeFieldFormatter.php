<?php

namespace Drupal\youtube_video_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

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
      ];
    }

    return $elements;
  }

}

