<?php

App::uses('AppModel', 'Model');

class IletisimFormu extends AppModel {
    var $useTable = false;
    var $_schema = array(
        'İsim'		=>array('type'=>'string', 'length'=>100), 
        'Mail'		=>array('type'=>'string', 'length'=>255), 
        'Ayrıntı'	=>array('type'=>'text')
    );
        var $validate = array(
    'İsim' => array(
        'rule'=>array('minLength', 1), 
        'message'=>'İsim gerekli' ),
    'Mail' => array(
        'rule'=>'email', 
        'message'=>'Geçerli bir mail adresi girin' ),
    'Ayrıntı' => array(
        'rule'=>array('minLength', 1), 
        'message'=>'Ayrıntı gerekli' )
       );
}
