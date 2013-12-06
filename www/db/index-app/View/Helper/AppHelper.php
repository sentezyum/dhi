<?php

App::uses('Helper', 'View');

class AppHelper extends Helper {

   public function url($url = null, $full = false) {
        if(!isset($url['language']) && isset($this->request->params['language'])) {
          $url['language'] = $this->params['language'];
        }
        return parent::url($url, $full);
   }
 
}
