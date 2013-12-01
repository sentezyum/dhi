<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class HataController extends AdminAppController {

	public $name = 'Hata';
	public $uses = '';
	public function modul_yok($modulName) {
		$this->set('modulName',$modulName);
	}


}
?>