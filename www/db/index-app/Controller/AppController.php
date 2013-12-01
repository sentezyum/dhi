<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
  public $helpers = array('Html','Form','Genel','Session');
	
  public $components = array('Cookie','Session');

  public function beforeFilter() {
      $this->set("title_for_layout","Kültür Koridoru");
  }
}