<?php

namespace Drupal\hello_world\Controller; 

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
*Class HelloController
*Provides methods for responding to different routes.
**/

class HelloController extends ControllerBase {

    /**
   * Hello world.
   */
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

 /**
   * print person and node.
   */

   public function helloNameNode($name, $nid){
    $node= Node::load(1);
    ksm($node->getTitle());
    ksm($node->toLink());
  
    $output = $this->t("Hi @person! The title of this node is @title", ['@person' => $name, '@title' => $node->getTitle()]);
    $url = Url::fromRoute('entity.node.canoical', ['node' =>$nid]);
	  ksm($url);
	  $link = Link::fromTestAndUrl($node->getTitle(), $url);
	  ksm($link);

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }
                                   
}    

