<?php

App::uses('AppController', 'Controller');

class ReferencesController extends AppController {

	public $name = 'References';

	public $uses = 'Reference';

	public function index(){
		$references = $this->Reference->find('all');
		Configure::write("BodyClass", "corporate_about");
		if (!empty($references)) {
			$references = $this->Reference->Image->getImages($references, 'reference');
		}
		$this->set(compact('references'));
	}
}