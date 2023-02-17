<?php

namespace Drupal\amd\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a greeting block.
 *
 * @Block(
 *   id = "greeting",
 *   admin_label = @Translation("Greeting"),
 *   category = @Translation("Custom")
 * )
 */
class Greeting extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
