<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

    public $name = 'Contacts';
    
    public $uses = Array('Contactgroup','IletisimFormu');
    
    public $components = array('Email');
    
    public function index(){
        Configure::write("BodyClass", "corporate_about");
        $this->set("title_for_layout", "Dhi" . " &raquo; " . __("İletişim"));
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

    public function gonder(){

    }
}