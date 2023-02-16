<?php

namespace Drupal\amd;

/**
 * 
 */

class TransformText {

    /**
     * reverse text
     * 
     * @param string $text
     * @return void
     */
    public function reverse($text){
        return strrev($text);
    }

    /**
     * uppercase text
     * 
     * @param string $text
     * @return void
     */
    public function uppercase($text){
        return strtoupper($text);
    }

    /**
     * titlecase text
     * 
     * @param string $text
     * @return void
     */
    public function titleCase($text){
        return ucfirst($text);
    }
}