<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class ServisimizController extends AppController {
	var $name='Servisimiz';
	var $uses = 'Imagegallery';
	function index() {
		$images = $this->Imagegallery->find('all');
		$images = $this->Imagegallery->Image->getImages($images,'Imagegallery');
		$this->set('images',$images);
	}
	function view() {
		$id = $this->params['id'];
		$temp = $this->Imagegallery->findById($id);
		$images[0] = $temp;
		$images = $this->Imagegallery->Image->getImages($images,'Imagegallery');
		$this->set('images',$images[0]);
	}
}
?>
