<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class IletisimController extends AppController {
    var $name = 'Iletisim';
    var $uses = Array('Contactgroup','IletisimFormu');
    var $components = array('Email');
    function index(){
        $this->set("secim", "secim");
        $iletisimBilgileri = $this->Contactgroup->find('all');
        $this->set('iletisimBilgileri',$iletisimBilgileri);
        if (!empty($this->data)) {
        $this->IletisimFormu->set($this->data);
        if ($this->IletisimFormu->validates()) {
            $this->Email->to = 'info@renklikalem.com';
            $this->Email->subject = 'Web Sitenizden Mesaj Var! : ' . $this->data['IletisimFormu']['İsim'];  
            $this->Email->from = $this->data['IletisimFormu']['Mail'];     
            $this->Email->send($this->data['IletisimFormu']['Ayrıntı']);
            $this->redirect('gonder');
            }
        }
    }
    function gonder() {
        
    }
}