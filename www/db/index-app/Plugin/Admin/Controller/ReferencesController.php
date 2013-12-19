<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ReferencesController extends AdminAppController {

	public $name = 'References';

	public $uses = 'Reference';

		public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Reference.id'    => 'desc') 
	);

	public function index() {
		$this->set('references', $this->paginate());
	}

	public function add() {
		$Genel = new GenelHelper(new View());
		if (!empty($this->data)) {
			$this->Reference->create();
			if ($this->Reference->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Referans kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Referans kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper(new View());
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid image size', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Reference->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Referans kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Referans kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Reference->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Reference->delete($id)) {
			$this->Session->setFlash(__('<p>Referans silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Referans</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Reference']['id'] = $id;
		$data['Reference']['has_confirm'] = $value;
		if ($this->Reference->save($data)) {
			$this->Session->setFlash(__('<p>Referans ayarlandı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array("action" => "index"));
		}
		$this->Session->setFlash(__('Referans ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}

}