<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ServicesController extends AdminAppController {

	public $name = 'Services';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Service.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Services'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','Hizmetlerimiz'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('services', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Service']['link'] = $Genel->seo_tr($this->data['Service']['name']);
			$this->Service->create();
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(__('<p>Hizmet kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Hizmet kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}
	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Hizmet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Service']['link'] = $Genel->seo_tr($this->data['Service']['name']);
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(__('<p>Hizmet kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Hizmet kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Service->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Yanlış Hizmet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Service->delete($id)) {
			$this->Session->setFlash(__('<p>Hizmet silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('<p>Hizmet silinemedi</p>', true),'default',array('class' => 'message info'));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Hizmet</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Service']['id'] = $id;
		$data['Service']['has_confirm'] = $value;
			if ($this->Service->save($data)) {
				$this->Session->setFlash(__('<p>Hizmet ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			}
		
		$this->Session->setFlash(__('Hizmet ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>