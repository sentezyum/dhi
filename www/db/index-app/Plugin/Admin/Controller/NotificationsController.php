<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class NotificationsController extends AdminAppController {

	public $name = 'Notifications';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Notification.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Notifications'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','duyuru'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('notifications', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Notification']['name'] = $Genel->ilk_harf($this->data['Notification']['name']);
			$this->data['Notification']['link'] = $Genel->seo_tr($this->data['Notification']['name']);
			$this->Notification->create();
			if ($this->Notification->save($this->data)) {
				$this->Session->setFlash(__('<p>Duyuru kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Duyuru kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Duyuru', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			$this->data['Notification']['name'] = $Genel->ilk_harf($this->data['Notification']['name']);
			$this->data['Notification']['link'] = $Genel->seo_tr($this->data['Notification']['name']);
			if ($this->Notification->save($this->data)) {
				$this->Session->setFlash(__('<p>Duyuru kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Duyuru kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Notification->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Yanlış Duyuru', true));
			$this->redirect(array('action'=>'index'));
		}
		$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
		if ($this->Notification->delete($id)) {
			$this->Session->setFlash(__('<p>Duyuru silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
		}
		$this->Session->setFlash(__('Duyuru Silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Duyuru</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Notification']['id'] = $id;
		$data['Notification']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Notification->save($data)) {
				$this->Session->setFlash(__('<p>Duyuru ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Duyuru ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>