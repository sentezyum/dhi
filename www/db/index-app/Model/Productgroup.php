<?php

App::uses('AppModel', 'Model');

class Productgroup extends AppModel {
	public $name = 'Productgroup';
	public $actsAs = array('Tree');
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
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'productgroup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '', 
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'productgroup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildrenGroups' => array(
			'className' => 'Productgroup',
			'foreignKey' => 'parent_id',
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
