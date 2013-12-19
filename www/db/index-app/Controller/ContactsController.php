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
            $Email = new CakeEmail();
            $Email->config(array(
                'transport' => 'Smtp',
                'tls' => false,
                'host' => $this->generalSettings['mail_host'],
                'port' => $this->generalSettings['mail_port'],
                'username' => $this->generalSettings['mail_username'],
                'password' => $this->generalSettings['mail_password'],
                'client' => null,
                'log' => true,
                'charset' => 'utf-8',
                'headerCharset' => 'utf-8',
                'timout' => 10,
                'emailFormat' => 'text',
                'debug' => true
            ));

            $Email->sender($this->request->data['IletisimFormu']['mail'], $this->request->data['IletisimFormu']['name']);
            $Email->from(array($this->request->data['IletisimFormu']['mail'] => $this->request->data['IletisimFormu']['name']));
            $Email->to($this->generalSettings['contact_to_mail']);
            $Email->subject($this->request->data['IletisimFormu']['header']);
            try {
                $Email->send("Telefon Numarası : " . $this->request->data['IletisimFormu']['telephone']  . "\r\nMesaj : " . $this->request->data['IletisimFormu']['message']);
                $this->redirect(array('controller' => 'contacts', 'action' => 'sent', "1")); 
            } catch (Exception $e) {
                $this->redirect(array('controller' => 'contacts', 'action' => 'sent', "0"));
            }
        }
    }

    public function sent($result){
        $result = $result === "1" ? true : false;
        Configure::write("BodyClass", "corporate_about");
        $this->set(compact('result'));
    }
}