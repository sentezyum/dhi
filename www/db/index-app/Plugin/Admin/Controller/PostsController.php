<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class PostsController extends AdminAppController {

	public $name = 'Posts';

	public $uses = array("Post");

	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Post.id'    => 'desc') 
	);

	public function index() {
		$this->set('posts', $this->paginate());
	}

	public function add() {
		$Genel = new GenelHelper(new View());
		if (!empty($this->data)) {
			$this->request->data['Post']['user_id'] = $this->Session->read('User.id');
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Haber kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Haber kaydedilemedi</p>', true),'default',array('class' => 'message info'));
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
			$this->request->data['Post']['user_id'] = $this->Session->read('User.id');
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Haber kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Haber kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Post->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('<p>Haber silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Haber</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Post']['id'] = $id;
		$data['Post']['has_confirm'] = $value;
			if ($this->Post->save($data)) {
				$this->Session->setFlash(__('<p>Haber ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array("action" => "index"));
			}
		
		$this->Session->setFlash(__('Haber ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>