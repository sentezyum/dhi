<?php

App::uses('AppModel', 'Model');

class Contactgroup extends AppModel {
	public $name = 'Contactgroup';
	public $displayField = 'name';
	public $validate = array(
		'name' => array(
			'rule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'Boş Bırakılamaz',
						'last' => true
					)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'contactgroup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Contact.order ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
