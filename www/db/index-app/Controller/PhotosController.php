<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PhotosController extends AppController {

	public $name = 'Photos';

	public $uses = Array('ImageFile');

	public $components = array('RequestHandler');
	
	public function index() {
		$file = $this->ImageFile->findById($this->request->params["id"]);
		$this->response->modified($file['Image']['modified']);
		$file = $file['ImageFile']['filename'];
		$file = 'img/resimler/' . $file;
	    $this->autoRender = false;
	    ob_start();
		$imagedata = file_get_contents($file);
		$length = strlen($imagedata);
		header('Accept-Ranges: bytes');
		header('Content-Length: '.$length);
		$fsize = filesize($file); 
		$path_parts = pathinfo($file); 
		$ext = strtolower($path_parts["extension"]);
		switch ($ext) { 
		      case "gif": $ctype="image/gif"; break; 
		      case "png": $ctype="image/png"; break; 
		      case "jpeg": $ctype="image/jpeg"; break; 
		      case "jpg": $ctype="image/jpg"; break; 

		    }
		header('Content-Type: ' . $ctype);
		print($imagedata);
		ob_end_flush();
		RequestHandlerComponent::respondAs($ctype);
	}
}