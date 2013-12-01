<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class PostsController extends AdminAppController {

	public $name = 'Posts';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Post.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Posts'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','haber'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('posts', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Post']['name_tr'] = $Genel->ilk_harf($this->data['Post']['name_tr']);
                        $this->data['Post']['name_bg'] = $Genel->ilk_harf($this->data['Post']['name_bg']);
                        $this->data['Post']['name_en'] = $Genel->ilk_harf($this->data['Post']['name_en']);
			$this->data['Post']['user_id'] = $this->Session->read('User.id');
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('<p>Haber kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Haber kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid image size', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Post']['name_tr'] = $Genel->ilk_harf($this->data['Post']['name_tr']);
                        $this->data['Post']['name_bg'] = $Genel->ilk_harf($this->data['Post']['name_bg']);
                        $this->data['Post']['name_en'] = $Genel->ilk_harf($this->data['Post']['name_en']);
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('<p>Haber kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Haber kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
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
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Post->save($data)) {
				$this->Session->setFlash(__('<p>Haber ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Haber ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>