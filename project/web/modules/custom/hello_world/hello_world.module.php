<?php

/**
 * @file
 * Implements hook_form_alter().
 */

function hello_world_form_alter (&$form, \Drupal\Core\Form\FormStateInterface &$form_state, $form_id){
    //ksm($form);
    //ksm($form_id);
    //ksm($form_state);    

    if ($form_id === 'node_artical_form') {
        ksm($form);
        $form['options']['#open'] = TRUE;
    }
}

function hello_world_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id) {
    if ($form_id === 'node_article_form') {
    $forms = [
      'node_page_form',
      'node_article_form',
    ];
    if (in_array($form_id, $forms)) {
      $form['options']['#open'] = TRUE;
    }
  }   
}
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Change title of Promotion Options element in node article form.
 */
function hello_world_form_node_article_form_alter (&$form, \Drupal\Core\Form\FormStateInterface &$form_state, $form_id){
    $form['options']['title'] = "Promotion options for the articles";
    //they have the same function
    //$user = \Drupal::currentUser();
    //$user = \Drupal::service('current_user');
    $user = \Drupal::currentUser();
    $form['field_tags']['#access'] = $user->hasPermission('administer content');
    //same function as above two lines
    //$form['field_tags']['#access'] = \Drupal::currentUer()->hasPermission('administer content');
    
}

function hello_world_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id) {
    if ($form_id === 'node_article_form') {
        $forms = [
            'node_page_form',
            'node_article_form',
        ];
        if (in_array($form_id, $forms)) {
            $form['options']['#open'] = TRUE;
        }
    }
}