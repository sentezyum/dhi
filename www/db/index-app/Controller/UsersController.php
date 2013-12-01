<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class UsersController extends AppController {
	
	var $name = 'Users';
	
	

	function giris() {
		$error = false;
		$user = Array();
		if(!empty($this->data)) {
			if(($user = $this->User->kontrolLogin($this->data['User'])) == true) { 
				if ($user['confirm'] == 0) {
					$this->Session->setFlash(__('Üyeliğiniz Etkinleştirilmemiştir. Yönetici İle İletişime Geçiniz', true));
					$this->redirect(array('controller' => 'users','action'=>'mesaj'));
				} else {
					if ($user['ban'] == 1) {
						$this->Session->setFlash(__('Üyeliğiniz Sözleşme Koşullarına Uymadığınızdan Ötürü Durdurulmuştur', true));
						$this->redirect(array('controller' => 'users','action'=>'mesaj'));
					} else {
						$this->Session->write('User', $user); 
						$this->redirect('/'); 
						exit(); 
					}
				}
            } else { 
				$error = true;
            } 
        } 
		$this->set('error',$error);
		$this->data['User']['password'] = "";
	}
	function cikis() {
		$this->Session->delete('User'); 
        $this->redirect('/'); 
	}
	function yeni() {
		if (!empty($this->data)) {
			if ($this->data['User']['password'] != $this->data['User']['rePassword']) {
				$this->Session->setFlash(__('Yazdığınız Şifreler Aynı Değil', true));
				$this->redirect(array('controller' => 'users','action'=>'yeni'));
			}
			$this->User->create();
			$this->data['User']['user_type_id'] = 1;
			$this->data['User']['ban'] = 0;
			$this->data['User']['confirm'] = 0;
			$this->User->set($this->data);
			if ($this->User->validates()) {
				$pass = $this->data['User']['password'];
				$this->data['User']['password'] = md5($this->data['User']['password']);
				$this->User->save($this->data, array('validate' => false));
				$userid = $this->User->id;
				$this->Session->setFlash(__('Kullanıcı Adı ve Şifre Oluşturuldu', true));
				$this->redirect(array('controller' => 'users','action'=>'mesaj'));
				
			} else {
			}
		}
		$this->data['User']['password'] = '';
		$this->data['User']['rePassword'] = '';
	}
	function mesaj(){
	
	}
	function sifredegistir(){
		$id = $this->Session->read('User.id');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('İlk Önce Giriş Yapın', true));
				$this->redirect(array('controller' => 'users','action'=>'mesaj'));
		}
		if (!empty($this->data)) {
			if ($this->data['User']['password'] != $this->data['User']['rePassword']) {
				$this->Session->setFlash(__('Yazdığınız Şifreler Aynı Değil', true));
				$this->redirect(array('controller' => 'users','action'=>'sifredegistir'));
			}
			$this->User->set($this->data);
			if ($this->User->validates()) {
				if (isset($this->data['User']['password'])) {$this->data['User']['password'] = md5($this->data['User']['password']);}
				$this->User->save($this->data, array('validate' => false));
				$this->Session->setFlash(__('Bilgileriniz Güncellendi Kaydedildi', true));
				$this->redirect(array('controller' => 'users','action'=>'mesaj'));
			} else {
				$this->Session->setFlash(__('Şifre 5 ile 10 karakter Uzunluğunda Olmalıdır', true));
				$this->redirect(array('controller' => 'users','action'=>'sifredegistir'));
			}
		}

			$this->data = $this->User->read(null, $id);
			$this->data['User']['password'] = '';
			$this->data['User']['rePassword'] = '';

	}

}
?>