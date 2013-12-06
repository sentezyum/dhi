<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $helpers = array('Html','Form','Genel','Session');

	public $components = array('Cookie','Session');

	public function beforeFilter() {
		$this->set("title_for_layout","DHİ");
		$this->_setLanguage();
		$this->set("langPrefix", $this->langPrefix());
	}

	public function langPrefix(){
		return ($this->Session->read('Config.language') == Configure::read("base_lang") ? "" : "_" . $this->Session->read('Config.language'));
	}

	public function _setLanguage() {
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        } else if (isset($this->request->params['language']) && ($this->request->params['language'] !=  $this->Session->read('Config.language'))) {
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        } else if (!$this->Cookie->read('lang') && !$this->Session->check('Config.language')){
        	$this->Session->write('Config.language', Configure::read("base_lang"));
            $this->Cookie->write('lang', Configure::read("base_lang"), false, '20 days');
        }
        Configure::write('Config.language', $this->Session->read('Config.language'));
    }

    public function redirect($url){
    	if (is_string($url) && isset($this->request->params['language'])) {
   			$url = "/" . $this->request->params['language'] . $url;
   		}
        if(!isset($url['language']) && isset($this->request->params['language'])) {
          $url['language'] = $this->params['language'];
        }
        return parent::redirect($url);
    }
}

