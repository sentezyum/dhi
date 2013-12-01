<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class UserTypesController extends AdminAppController {

	public $name = 'UserTypes';
	public $paginate = array( 
	    	'limit' => 25,
	        'order'    => array( 
	            'id'    => 'desc') 
	); 
	public function beforeFilter() {
		if ($this->Session->read('User.admin') != 1) {
	    	$this->redirect('/'); 
	    }
	}
	public function index() {
		$this->UserType->recursive = 0;
		$temp = $this->paginate('UserType',Array('UserType.admin' => 0));
		$this->set('userTypes', $temp);
		if (count($temp) == 0) {$this->Session->setFlash(__('<p>Kayıtlı kullanıcı türü yok!</p>', true),'default',array('class' => 'message info'));}
		
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['UserType']['name'] = $Genel->ilk_harf($this->data['UserType']['name']);
			$this->data['UserType']['panel_giris'] = 1;
			$this->UserType->create();
			if ($this->UserType->save($this->data)) {
				$this->Session->setFlash(__('<p>Kullanıcı türü kaydedildi</p>', true),'default',array('class' => 'message info'));
				$page = $this->{$this->modelClass}->getPageNumber($this->{$this->modelClass}->id, $this->paginate['limit'],$this->paginate['order']);
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Kullanıcı türü kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('<p>Yanlış kullanıcı türü</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action' => 'index'));
		}
		$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
		if (!empty($this->data)) {
			$this->data['UserType']['name'] = $Genel->ilk_harf($this->data['UserType']['name']);
			$this->data['UserType']['panel_giris'] = 1;
			if ($this->UserType->save($this->data)) {
				$this->Session->setFlash(__('<p>Kullanıcı türü kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Kullanıcı türü kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserType->read(null, $id);
		}
			$this->set('page',$page);
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış kullanıcı türü</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$hata = 0;
		$kontrol = $this->UserType->findById($id);
		if (count($kontrol['User']) > 0) {$hata = 1;}
		if ($hata == 0) {
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->UserType->delete($id)) {
				$this->Session->setFlash(__('<p>Kullanıcı türü silindi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		} else {
				$this->Session->setFlash(__('<p>Bağlı kullanıcılar olduğundan silinemedi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Kullanıcı türü silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>