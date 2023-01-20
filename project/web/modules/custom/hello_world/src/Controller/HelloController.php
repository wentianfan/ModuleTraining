<?php

namespace Drupal\hello_world\Controller; 

use Drupal\Core\Controller\ControllerBase;

/**
*Class HelloController
*Provides methods for responding to different routes.
**/

class HelloController extends ControllerBase {
    public function hello($name = NULL) {
        if ($name) {
            $output = $this->t("Hello @person", ['@person' => $name]);
          }
          else {
            $output = $this->t("Hello world!");
          }
          return [
            '#type' => 'markup',
            '#markup' => $output,
        ];
    }
}    

