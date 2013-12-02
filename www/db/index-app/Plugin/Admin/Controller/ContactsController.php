<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ContactsController extends AdminAppController {

	public $name = 'Contacts';
    
    public $uses = array('Contactgroup');
	
	public $paginate = array(
	    	'limit' => 50,
	        'order'    => array(
	            'Contactgroup.id'    => 'desc')
	);

	public function index() {
		$this->set('contactgroups', $this->paginate());
	}

	public function add() {
		if (!empty($this->params->data)) {
			$this->Contactgroup->create();
			if ($this->Contactgroup->save($this->params->data)) {
				$contactgroupId = $this->Contactgroup->id;
				foreach ($this->params->data['Secenekler'] as $key => $secenek) {
                    $a = explode("_",$key);
                    $a = $a[1];
					$data = Array();
					$data['Contact']['name'] = $this->params->data['Names']['name_' . $a];
					$data['Contact']['contactgroup_id'] = $contactgroupId;
					$data['Contact']['value'] = $this->params->data['Values']['value_' . $a];
					$this->Contactgroup->Contact->create();
					$this->Contactgroup->Contact->save($data);
				}
				$this->Session->setFlash(__('<p>İletişim kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>İletişim kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
	}

	public function edit($id = null) {
		if (!empty($this->params->data)) {
			if ($this->Contactgroup->save($this->params->data)) {
				$this->Contactgroup->Contact->deleteAll(Array('Contact.contactgroup_id' => $id));
				if (isset($this->params->data['Secenekler'])) {
					foreach ($this->params->data['Secenekler'] as $key => $secenek) {
                        $a = explode("_",$key);
                        $a = $a[1];
						$data = Array();
						$data['Contact']['name'] = $this->params->data['Names']['name_' . $a];
						$data['Contact']['contactgroup_id'] = $id;
						$data['Contact']['value'] = $this->params->data['Values']['value_' . $a];
						$data['Contact']['order'] = $this->params->data['Orders']['order_' . $a];
						$this->Contactgroup->Contact->create();
						$this->Contactgroup->Contact->save($data);
					}
				}
				$this->Session->setFlash(__('<p>İletişim kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>İletişim kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->params->data)) {
			$this->params->data = $this->Contactgroup->read(null, $id);
			$imprintValues = $this->Contactgroup->Contact->Find('all',Array('conditions' => Array('Contact.contactgroup_id' => $id),'order' => 'Contact.order ASC'));
			$a = 1;
			foreach ($imprintValues as $imprintValue) {
				$this->params->data['Secenekler']['secenek_' . $a] = 1;
				$this->params->data['Names']['name_' . $a] = $imprintValue['Contact']['name'];
				$this->params->data['Values']['value_' . $a] = $imprintValue['Contact']['value'];
				$this->params->data['Orders']['order_' . $a] = $imprintValue['Contact']['order'];
				$a++;
			}
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contactgroup->delete($id)) {
			$this->Contactgroup->Contact->deleteAll(Array('Contact.contactgroup_id' => $id));
			$this->Session->setFlash(__('<p>İletişim silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Anket</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Contactgroup']['id'] = $id;
		$data['Contactgroup']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Contactgroup->save($data)) {
				$this->Session->setFlash(__('<p>Anket ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}

		$this->Session->setFlash(__('Anket ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>