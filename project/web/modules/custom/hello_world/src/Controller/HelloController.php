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
    //ksm($name);
    //ksm(gettype($nid)); 
    //ksm($node->getTitle());
    //ksm($node->toLink());  
    //following lines are the same function as $link = $node->toLink();
    //$output = $this->t("Hi @person! The title of this node is @title", ['@person' => $name, '@title' => $node->getTitle()]);
    //$url = Url::fromRoute('entity.node.canoical', ['node' =>$nid]);
	  //ksm($url);
	  //$link = Link::fromTestAndUrl($node->getTitle(), $url);
	  //ksm($link); 
    $node= Node::load($nid);
    if (!$node){
      $output = $this->t("The @input is not a valid page id.", ['@input' =>$nid]);
      return [
        '#type' => 'markup',
        '#markup' => $output,
      ];
    }      
      $link = $node->toLink();
      $output = $this->t("Hi @person! The title of this node is @title", ['@person' => $name, '@title' => $link->toString()]);
      return [
        '#type' => 'markup',
        '#markup' => $output,
      ];
  }

  //teacher's code
    // $output = [];
    // if (is_numeric($nid)) {
    //   $node = Node::load($nid);
    //   if ($node) {
    //     $title = $node->toLink()->toString();
    //     $output = $this->t('Hello @name! The title of the node is @title', ['@name' => $name, '@title' => $title]);
    //   }
    //   else {
    //     $output = $this->t('Hey :name! That nid does not exists!', [':name' => $name]);
    //   }
    // }
    // else {
    //   $output = $this->t('Hey :name! That nid should be a number!', [':name' => $name]);
    // }

    // return [
    //   '#type' => 'markup',
    //   '#markup' => $output,
    // ];


}


  

