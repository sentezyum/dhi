<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class UsersController extends AdminAppController {

	public $name = 'Users';
			public $paginate = array( 
	    	'limit' => 25,
	        'order'    => array( 
	            'User.id'    => 'desc') 
	); 
	public function login() {
		$this->layout = 'Admin.login';
		$error = false;
		$user = Array();
		if(!empty($this->data)) {    
			$this->loadModel('User');
			if(($user = $this->User->kontrolLogin($this->data['User'], true)) == true) { 
				if ($user['User']['ban'] == 1) {
					$this->set('errorMsg','Üyeliğiniz site yöneticisi tarafından durdurulmuş');
				} else if ($user['User']['confirm'] == 0) {
					$this->set('errorMsg','Üyeliğiniz henüz onaylanmamış');
				} else {
					$this->Session->write('User', $user['User']); 
					$this->redirect('/admin');
					exit();
				}
            } else {
				$checkAdmin = $this->User->find('all',Array('conditions' => Array('User.admin' => 1)));
				if (empty($checkAdmin) AND $this->data['User']['username'] == 'renklikalem' AND $this->data['User']['password'] == 'ilkgiris') {
					$this->Session->write('ilkGiris',True);
					$this->redirect('/admin');
				}
				$error = true;
            } 
        } 
		$this->set('error',$error);
		$this->params->data['User']['password'] = "";
	}
	public function logout() {
		$this->Session->destroy();
        $this->redirect('/admin'); 
	}
	public function index() {
		$this->User->recursive = 1;
		$temp = $this->paginate('User',Array('User.admin' => 0));
		$this->set('users', $temp);
		if (count($temp) == 0) {$this->Session->setFlash(__('<p>Kayıtlı kullanıcı yok!</p>', true),'default',array('class' => 'message info'));}
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['User']['username'] = $Genel->strtolower_tr($this->data['User']['username']);
			$this->data['User']['name'] = $Genel->ilk_harf($this->data['User']['name']);
			$this->data['User']['surname'] = $Genel->ilk_harf($this->data['User']['surname']);
			$this->data['User']['mail'] = $Genel->strtolower_tr($this->data['User']['mail']);
			$this->User->create();
			$this->User->set($this->data);
			if ($this->User->validates()) {
				$this->data['User']['confirm'] = 1;
				$this->data['User']['password'] = md5($this->data['User']['password']);
				$this->User->save($this->data, array('validate' => false));
				$this->Session->setFlash(__('<p>Kullanıcı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$page = $this->{$this->modelClass}->getPageNumber($this->{$this->modelClass}->id, $this->paginate['limit'],$this->paginate['order']); 
				$this->redirect("/admin/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Kullanıcı kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
		$this->set('userTypes',$this->User->UserType->find('list',Array('conditions' => Array('UserType.admin' => 0))));
	}
	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('<p>Yanlış Kullanıcı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action' => 'index'));
		}
		$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
		if (!empty($this->data)) {
			$this->data['User']['username'] = $Genel->strtolower_tr($this->data['User']['username']);
			$this->data['User']['name'] = $Genel->ilk_harf($this->data['User']['name']);
			$this->data['User']['surname'] = $Genel->ilk_harf($this->data['User']['surname']);
			$this->data['User']['mail'] = $Genel->strtolower_tr($this->data['User']['mail']);
			if ($this->data['User']['password'] == '') {unset($this->data['User']['password']);}
			$this->User->set($this->data);
			if ($this->User->validates()) {
				if (isset($this->data['User']['password'])) {$this->data['User']['password'] = md5($this->data['User']['password']);}
				$this->User->save($this->data, array('validate' => false));
				$this->Session->setFlash(__('<p>Kullanıcı kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/admin/" . $this->params['controller'] . "/index/page:{$page}");
			} else {
				$this->Session->setFlash(__('<p>Kullanıcı kaydedilemedi lütfen tekrar deneyin</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
			unset($this->data['User']['password']);
		}
			$this->set('page',$page);
			$this->set('userTypes',$this->User->UserType->find('list',Array('conditions' => Array('UserType.admin' => 0))));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Kullanıcı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$hata = 0;
		$kontrol = $this->User->findById($id);
		if (count($kontrol['Post']) > 0) {$hata = 1;}
		if ($hata == 0) {
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->User->delete($id)) {
				$this->Session->setFlash(__('<p>Kullanıcı silindi</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/admin/" . $this->params['controller'] . "/index/page:{$page}");
			}
		} else {
				$this->Session->setFlash(__('<p>Bağlı kayıtlar olduğundan silinemedi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Kullanıcı silinemedi', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Kullanıcı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['User']['id'] = $id;
		$data['User']['confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('<p>Kullanıcı ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/admin/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Kullanıcı ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>