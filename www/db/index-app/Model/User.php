<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
	public $name = 'User';
	public $validate = array(
						'username' => array(
							'rule-1' => array(
										'rule' => 'notEmpty',
										'message' => 'Boş Bırakılamaz',
										'last' => true				
									),
							'rule-2' => array(
										'rule' => array('between', 5, 10),
										'message' => 'Kullanıcı Adı 5 ile 10 Karakter Uzunluğunda Olmalıdır',
										'last' => true				
									),
							'rule-3' => array(
										'rule' => 'isUnique',
										'message' => 'Bu Kullanıcı Adına Sahip Başka Biri Var',
										'last' => true				
									)
						),
						'password' => array(
							'rule-1' => array(
										'rule' => 'notEmpty',
										'message' => 'Boş Bırakılamaz',
										'last' => true				
									),
							'rule-2' => array(
										'rule' => array('between', 5, 15),
										'message' => 'Şifre 5 ile 15 Karakter Uzunluğunda Olmalıdır',
										'last' => true				
									)
						),
						'mail' => array(
							'rule-1' => array(
										'rule' => 'notEmpty',
										'message' => 'Boş Bırakılamaz',
										'last' => true				
									),
							'rule-2' => array(
										'rule' => array('email', true),
										'message' => 'Geçerli Mail Adresi Girin',
										'last' => true				
									),
							'rule-3' => array(
										'rule' => 'isUnique',
										'message' => 'Bu Mail Adresi Daha Önce Kullanılmış',
										'last' => true				
									)
						)
					);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'UserType' => array(
			'className' => 'UserType',
			'foreignKey' => 'user_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    public function kontrolLogin($data, $panel = false)  { 
        $conditions = array('username' => $data['username'], 'password' => md5($data['password']));
        if ($panel) {
        	$conditions['UserType.panel_giris'] = 1;
        }
        $user = $this->find('first', array('conditions' => $conditions));
		$veri = Array();
        if(!empty($user) && isset($user['User']['id']) && !empty($user['User']['id'])) {
            $veri['User'] = $user['User'];
			$veri['User']['panel_giris'] = @$user['UserType']['panel_giris'];
			$veri['User']['user_type'] = @$user['UserType']['name'];
			return $veri; 
		}
        return false; 
    }
	public function getList($cond) {
		$users = $this->find('all',$cond);
		$veri = Array();
		foreach ($users as $user) {
			$veri[$user['User']['id']] = $user['User']['name'] . " " . $user['User']['surname'];
		}
		return $veri;
	}


}