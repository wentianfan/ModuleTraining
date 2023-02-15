<?php

namespace Drupal\amd\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * provide a hello world block.
 * 
 * @Block {
 *  id = "hello world",
 *  admin_label = @Translation("Hello World Block"),
 *  catergory = @Translation("Advanced Module Training")
 * }
 */

class HelloWorld extends blockBase { 
    /**
    * {@inheritdoc}
    */
    public function build() {
        $build = [
            '#markup' => $this->t('Hello, World.'),
        ];
        return $build;
  }
}