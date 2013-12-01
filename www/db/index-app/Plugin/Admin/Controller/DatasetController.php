<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class DatasetController extends AdminAppController {

	public $name = 'Dataset';
	public $uses = Array();
	public function index() {
		$this->layout = 'login';
		
	}

}
?>