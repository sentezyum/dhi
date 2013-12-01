<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PhotosController extends AppController {
	var $name = 'Photos';
	var $uses = Array('ImageFile');
	function index($id) {
		$file = $this->ImageFile->findById($id);
		$file = $file['ImageFile']['filename'];
		$file = 'img/resimler/' . $file;
		$this->set('file',$file);
		$this->layout = 'image';
	    $this->render();
	}
}

?>