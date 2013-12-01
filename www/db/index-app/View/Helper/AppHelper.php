<?php

App::uses('Helper', 'View');

class AppHelper extends Helper {
 
   function url($url = null, $full = false) {
        return parent::url($url, $full);
   }
 
}
