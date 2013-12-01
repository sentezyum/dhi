<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');
App::uses('GenelHelper', 'View/Helper');

class ArticlesController extends AppController {

	var $name = 'Articles';
	var $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Article.id'    => 'desc') 
	); 
	function index() {
		$this->set('articles', $this->paginate(array('Article.user_id'=>$this->Session->read('User.id'))));
	}
        function all() {
		$this->set('articles', $this->paginate(array('Article.has_confirm'=>1)));
	}
	function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Article']['name'];
			$this->Article->create();
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('<p>Yazı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Yazı kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Yazı', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Article']['name'];
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('<p>Yazı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Yazı kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Article->read(null, $id);
		}
		$this->set("users",$this->Article->User->getList(Array('conditions' => Array('User.user_type_id' => $userTypeId))));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Article->delete($id)) {
			$this->Session->setFlash(__('<p>Yazı silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>