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

    $build['content'] = [
      '#markup' => $this->t('Hello,' . $user->getAccountName()),
    ];
    return $build;
  }

}
