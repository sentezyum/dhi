<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {
	
	public function checkLogin(){
		return $this->Session->check('User') == true && $this->Session->read('User.panel_giris') == 1;
	}

	public function beforeFilter() {
		if ($this->action != 'login' && $this->action != 'logout' && $this->controller != 'users' && !$this->checkLogin()) { 
			$this->redirect(array('plugin' => 'admin', 'controller' => 'users', 'action' => 'login')); 
		} else {
			$userTypeId = $this->Session->read('User.user_type_id');
    		$link = "/" . $this->params->url;
    		$this->loadModel('Page');
    		$kontrol = $this->Page->PageLink->find('all',Array('conditions' => Array('PageLink.link' => $link)));
    		if (isset($kontrol[0])) {
        		$pageId = @$kontrol[0]['Page']['id'];
            	$this->loadModel('UserPermit');
            	$kontrol = $this->UserPermit->find('all',Array('conditions' => Array('UserPermit.page_id' => $pageId,'UserPermit.user_type_id' => $userTypeId)));
            	if (count($kontrol) == 0 AND $this->Session->read('User.admin') != 1) {
        			$this->redirect(array('plugin' => 'Admin', '/')); 
            	}
    		}
		}
	}

	public function beforeRender() {
		
		if ($this->checkLogin()) {
			$this->loadModel('UserPermit');
			$this->UserPermit->recursive = 2;
			if ($this->Session->read('User.admin') == 1) {
				$this->loadModel('Page');
				$menu = $this->Page->find('all',Array('order' => 'Page.order'));	
				foreach ($menu as $key => $val) {
					$menu[$key]['Page']['PageLink'] = $val['PageLink'];
				}
			} else {
				$menu = $this->UserPermit->find('all',Array('conditions'=>Array('UserPermit.user_type_id' =>$this->Session->read('User.user_type_id'))));
			}
			$this->set('menu', $menu);
		}
	}

	public function redirect($data) {
		if (is_array($data)) {
			if (!isset($data["plugin"])) {
				$data["plugin"] = $this->params->plugin;
			}
			if (!isset($data["controller"])) {
				$data["controller"] = $this->params->controller;
			}
		}
		parent::redirect($data);
	}
}
