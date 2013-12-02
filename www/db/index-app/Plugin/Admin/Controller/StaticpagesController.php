<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class StaticpagesController extends AdminAppController {

	public $name = 'Staticpages';
	
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Staticpage.id'    => 'desc') 
	); 

	public $uses = array("Staticpage");

	public function index() {
		$this->set('staticpages', $this->paginate());
	}
	public function add() {
		if (!empty($this->data)) {
			$this->Staticpage->create();
			if ($this->Staticpage->save($this->data)) {
				$this->Session->setFlash(__('<p>Sayfa kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Sayfa kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
        $this->set('groups', $this->Staticpage->generateTreeList($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
        $this->set('menuareas', $this->Staticpage->Menuarea->find('list'));
	}

	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Sayfa', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Staticpage->save($this->data)) {
				$this->Session->setFlash(__('<p>Sayfa kaydedildi</p>', true),'default',array('class' => 'message info'));
				$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Sayfa kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Staticpage->read(null, $id);
		}
        $this->set('groups', $this->Staticpage->generateTreeList($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
        $this->set('menuareas', $this->Staticpage->Menuarea->find('list'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Yanlış Sayfa', true));
			$this->redirect(array('action'=>'index'));
		}
		$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
		if ($this->Staticpage->delete($id)) {
			$this->Session->setFlash(__('<p>Sayfa silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
		}
		$this->Session->setFlash(__('Sayfa Silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>