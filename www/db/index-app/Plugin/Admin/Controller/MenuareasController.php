<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class MenuareasController extends AdminAppController {

	public $name = 'Menuareas';
	public $paginate = array( 
	    	'limit' => 25,
	        'order'    => array( 
	            'id'    => 'desc') 
	); 
	public function index() {
		$this->Menuarea->recursive = 0;
		$temp = $this->paginate('Menuarea');
		$this->set('menuareas', $temp);
		if (count($temp) == 0) {$this->Session->setFlash(__('<p>Menü Alanı Yok</p>', true),'default',array('class' => 'message info'));}
		
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Menuarea']['name'];
			$this->Menuarea->create();
			if ($this->Menuarea->save($this->data)) {
				$this->Session->setFlash(__('<p>Menü alanı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$page = $this->{$this->modelClass}->getPageNumber($this->{$this->modelClass}->id, $this->paginate['limit'],$this->paginate['order']);
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Menü alanı kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('<p>Yanlış menü alanı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action' => 'index'));
		}
		$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
		if (!empty($this->data)) {
			$this->data['Menuarea']['name'];
			if ($this->Menuarea->save($this->data)) {
				$this->Session->setFlash(__('<p>Menü alanı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Menü alanı kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Menuarea->read(null, $id);
		}
			$this->set('page',$page);
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış menü alanı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}

			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Menuarea->delete($id)) {
				$this->Session->setFlash(__('<p>Menü alanı silindi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}

		$this->Session->setFlash(__('Kullanıcı türü silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>