<?php

App::uses('AppModel', 'Model');

class Staticpage extends AppModel {
	public $name = 'Staticpage';

	public $validate = array(
		'name' => array(
			'rule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'Boş Bırakılamaz',
						'last' => true				
					)
		),
                                'name_en' => array(
			'rule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'Boş Bırakılamaz',
						'last' => true				
					)
		),
                                'name_bg' => array(
			'rule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'Boş Bırakılamaz',
						'last' => true				
					)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'staticpage_id',
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
}
