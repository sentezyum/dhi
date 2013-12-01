<?php


App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ArticlesController extends AdminAppController {

	public $name = 'Articles';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Article.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Articles'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','yazı'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('articles', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Article']['name'] = $Genel->ilk_harf($this->data['Article']['name']);
			$this->Article->create();
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('<p>Yazı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Yazı kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		$this->loadModel("ArticleSetting");
		$settings = $this->ArticleSetting->findById(1);
		$settings = $settings['ArticleSetting'];
		$userTypeId = $settings['user_type_id'];
		$this->set("users",$this->Article->User->getList(Array('conditions' => Array('User.user_type_id' => $userTypeId))));
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Yazı', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Article']['name'] = $Genel->ilk_harf($this->data['Article']['name']);
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

	public function delete($id = null) {
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
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Yazı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Article']['id'] = $id;
		$data['Article']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Article->save($data)) {
				$this->Session->setFlash(__('<p>Yazı ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Yazı ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>