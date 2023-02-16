<?php

namespace Drupal\amd\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a hello user block.
 *
 * @Block(
 *   id = "hello_user",
 *   admin_label = @Translation("Hello User"),
 *   category = @Translation("Custom")
 * )
 */
class HelloUserBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $user = User::load(\Drupal::currentUser()->id());
    $transform = \Drupal::services('text_transformer');

    $build['content'] = [
      '#markup' => $this->t('Hello,' . $transform->reverse($user->getAccountName())),
    ];
    return $build;
  }

}
