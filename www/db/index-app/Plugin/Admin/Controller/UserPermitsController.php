<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class UserPermitsController extends AdminAppController {

	public $name = 'UserPermits';
	public $uses = 'Page';
	public $paginate = array(
	    	'limit' => 25,
	        'order'    => array( 
	            'Page.order'    => 'desc'),
			'recursive' => 2,
			'contain' => array('UserPermit'),
	); 
	public function beforeFilter() {
		if ($this->Session->read('User.admin') != 1) {
	    	$this->redirect('/'); 
	    }
	}

	public function index() {
		$this->Page->recursive = 2;
		$userTypeId = Null;
		$temp = Array();
		$data = Array();
		if (isset($this->params['named']['user_type_id'])) {$userTypeId = $this->params['named']['user_type_id'];}
		if ($userTypeId == Null) {
			$result = $this->Page->UserPermit->UserType->find('first',Array('conditions' => Array('UserType.admin' => 0)));
			if (count($result) > 0) {$userTypeId = $result['UserType']['id'];}
		}
		if ($userTypeId != Null) {
			$temp = $this->paginate('Page');
			$permits = $this->Page->UserPermit->find('all',Array('conditions'=>Array('UserPermit.user_type_id' => $userTypeId)));
			$data = Array();
			foreach ($permits as $permit) {
				$data[$permit['UserPermit']['page_id']] = 1;
			}
			foreach ($temp as $page) {
				if (!isset($data[$page['Page']['id']])) {$data[$page['Page']['id']] = 0;}
			}
			if (count($temp) == 0) {$this->Session->setFlash(__('<p>Kayıtlı sayfa yok!</p>', true),'default',array('class' => 'message info'));}
		} else {
			$this->Session->setFlash(__('<p>Kayıtlı kullanıcı türü yok!</p>', true),'default',array('class' => 'message info'));	
		}
		$this->set('pages', $temp);
		$this->set('permits', $data);
		$this->set('userType', $this->Page->UserPermit->UserType->findById($userTypeId));
		$this->set('userTypes', $this->Page->UserPermit->UserType->find('list',Array('conditions' => Array('UserType.admin' => 0))));
	}
	public function set_control($userTypeId = null,$pageId = Null) {
		if (!$userTypeId OR !$pageId) {
			$this->Session->setFlash(__('<p>Yanlış Yetkilendirme Bilgileri</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$kontrol = Array();
		$kontrol = $this->Page->UserPermit->find('all',Array('conditions' => Array('page_id' => $pageId,'user_type_id' => $userTypeId)));
		if (count($kontrol) == 0) {
			$data['UserPermit']['page_id'] = $pageId;
			$data['UserPermit']['user_type_id'] = $userTypeId;
			if ($this->Page->UserPermit->save($data)) {
				$this->Session->setFlash(__('<p>Yetkilendirilme yapıldı</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index','user_type_id' => $userTypeId));
			}
		} else {
			$id = $kontrol[0]['UserPermit']['id'];
			if ($this->Page->UserPermit->delete($id)) {
				$this->Session->setFlash(__('<p>Yetkilendirilme kaldırıldı</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index','user_type_id' => $userTypeId));
			}

		}
		$this->Session->setFlash(__('<p>Yetkilendirilme yapılamadı</p>', true),'default',array('class' => 'message info'));
		$this->redirect(array('action' => 'index','user_type_id' => $userTypeId));
	}


}
?>