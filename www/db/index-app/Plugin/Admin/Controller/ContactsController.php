<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ContactsController extends AdminAppController {

	public $name = 'Contacts';
    
    public $uses = 'Contactgroup';
	
	public $paginate = array(
	    	'limit' => 50,
	        'order'    => array(
	            'Contactgroup.id'    => 'desc')
	);
	public function index() {
		$this->set('contactgroups', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
					$this->data['Contactgroup']['name'] = $Genel->ilk_harf($this->data['Contactgroup']['name']);
					$this->Contactgroup->create();
					if ($this->Contactgroup->save($this->data)) {
						$contactgroupId = $this->Contactgroup->id;
						foreach ($this->data['Secenekler'] as $key => $secenek) {
                                                        $a = explode("_",$key);
                                                        $a = $a[1];
							$data = Array();
							$data['Contact']['name'] = $this->data['Names']['name_' . $a];
							$data['Contact']['contactgroup_id'] = $contactgroupId;
							$data['Contact']['value'] = $this->data['Values']['value_' . $a];
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
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
					$this->data['Contactgroup']['name'] = $Genel->ilk_harf($this->data['Contactgroup']['name']);
					if ($this->Contactgroup->save($this->data)) {
						$this->Contactgroup->Contact->deleteAll(Array('Contact.contactgroup_id' => $id));
						if (isset($this->data['Secenekler'])) {
							foreach ($this->data['Secenekler'] as $key => $secenek) {
                                                        $a = explode("_",$key);
                                                        $a = $a[1];
								$data = Array();
								$data['Contact']['name'] = $this->data['Names']['name_' . $a];
								$data['Contact']['contactgroup_id'] = $id;
								$data['Contact']['value'] = $this->data['Values']['value_' . $a];
								$data['Contact']['order'] = $this->data['Orders']['order_' . $a];
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
		if (empty($this->data)) {
			$this->data = $this->Contactgroup->read(null, $id);
			$imprintValues = $this->Contactgroup->Contact->Find('all',Array('conditions' => Array('Contact.contactgroup_id' => $id),'order' => 'Contact.order ASC'));
			$a = 1;
			foreach ($imprintValues as $imprintValue) {
				$this->data['Secenekler']['secenek_' . $a] = 1;
				$this->data['Names']['name_' . $a] = $imprintValue['Contact']['name'];
				$this->data['Values']['value_' . $a] = $imprintValue['Contact']['value'];
				$this->data['Orders']['order_' . $a] = $imprintValue['Contact']['order'];
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