<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PhotosController extends AppController {

	public $name = 'Photos';

	public $uses = Array('ImageFile');

	public $components = array('RequestHandler');
	
	public function index($id) {
		$file = $this->ImageFile->findById($id);
		$file = $file['ImageFile']['filename'];
		$file = 'img/resimler/' . $file;
		$this->set('file',$file);
		$this->layout = 'image';
	    $this->render();
	}
}