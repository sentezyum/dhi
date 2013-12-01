<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class EventsController extends AdminAppController {

	public $name = 'Events';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Event.id'    => 'desc') 
	); 
	public function index() {
		$this->set('events', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['Event']['name_tr'] = $Genel->ilk_harf($this->data['Event']['name_tr']);
                        $this->data['Event']['name_bg'] = $Genel->ilk_harf($this->data['Event']['name_bg']);
                        $this->data['Event']['name_en'] = $Genel->ilk_harf($this->data['Event']['name_en']);
			$this->data['Event']['user_id'] = $this->Session->read('User.id');
                        $this->data['Event']['date'] = $Genel->tarih_al($this->data['Event']['date']);
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('<p>Etkinlik kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Etkinlik kaydedilemedi</p>', true),'default',array('class' => 'message info'));
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
			$this->data['Event']['name_tr'] = $Genel->ilk_harf($this->data['Event']['name_tr']);
                        $this->data['Event']['name_bg'] = $Genel->ilk_harf($this->data['Event']['name_bg']);
                        $this->data['Event']['name_en'] = $Genel->ilk_harf($this->data['Event']['name_en']);
                        $this->data['Event']['date'] = $Genel->tarih_al($this->data['Event']['date']);
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('<p>Etkinlik kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Etkinlik kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('<p>Etkinlik silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Etkinlik</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Event']['id'] = $id;
		$data['Event']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Event->save($data)) {
				$this->Session->setFlash(__('<p>Etkinlik ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Etkinlik ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>