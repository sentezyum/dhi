<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ImagegalleriesController extends AdminAppController {

	public $name = 'Imagegalleries';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Imagegallery.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Posts'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','haber'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('imagegalleries', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Imagegallery']['name_tr'] = $Genel->ilk_harf($this->data['Imagegallery']['name_tr']);
			$this->data['Imagegallery']['user_id'] = $this->Session->read('User.id');
			$this->Imagegallery->create();
			if ($this->Imagegallery->save($this->data)) {
				$this->Session->setFlash(__('<p>Resim Galerisi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Resim Galerisi kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Resim Galerisi', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Imagegallery']['name_tr'] = $Genel->ilk_harf($this->data['Imagegallery']['name_tr']);
			if ($this->Imagegallery->save($this->data)) {
				$this->Session->setFlash(__('<p>Resim Galerisi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Resim Galerisi kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Imagegallery->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Yanlış Resim Galerisi', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Imagegallery->delete($id)) {
			$this->Session->setFlash(__('<p>Resim Galerisi silindi</p>', true),'default',array('class' => 'message info'));
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
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Imagegallery->save($data)) {
				$this->Session->setFlash(__('<p>Resim Galerisi ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Resim Galerisi ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>