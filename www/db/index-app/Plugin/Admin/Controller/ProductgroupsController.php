<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ProductgroupsController extends AdminAppController {

	public $name = 'Productgroups';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Productgroup.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Productgroups'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','ürün grupları'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('productgroups', $this->paginate());
		
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Productgroup']['name'] = $Genel->ilk_harf($this->data['Productgroup']['name']);
			if ($this->data['Productgroup']['order'] == "") {$this->data['Productgroup']['order'] = 10000;}
			$this->Productgroup->create();
			if ($this->Productgroup->save($this->data)) {
				$this->Session->setFlash(__('<p>Ürün grubu kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Ürün grubu kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		$this->set('groups', $this->Productgroup->generatetreelist($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış ürün grubu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Productgroup']['name'] = $Genel->ilk_harf($this->data['Productgroup']['name']);
			if ($this->data['Productgroup']['order'] == "") {$this->data['Productgroup']['order'] = 10000;}
			if ($this->Productgroup->save($this->data)) {
				$this->Session->setFlash(__('<p>Ürün grubu kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Ürün grubu kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Productgroup->read(null, $id);
		}
		$this->set('groups', $this->Productgroup->generatetreelist($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Yanlış ürün grubu', true));
			$this->redirect(array('action'=>'index'));
		}
		$kontrol = Array();
		$kontrol = $this->Productgroup->Product->find('all',Array('conditions' => Array('Product.productgroup_id' => $id)));		
		if (empty($kontrol)) {		
		if ($this->Productgroup->delete($id)) {
			$this->Session->setFlash(__('<p>Ürün grubu silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		} else {
			$this->Session->setFlash(__('<p>Bağlı ürünler olduğundan ürün grubu silemedi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ürün grubu silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış ürün grubu</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Productgroup']['id'] = $id;
		$data['Productgroup']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Productgroup->save($data)) {
				$this->Session->setFlash(__('<p>Ürün grubu ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Ürün grubu ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>