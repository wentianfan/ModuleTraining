<?php

/**
 * @file
 * Implement hook_form_alter
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