<?php

App::uses('AppModel', 'Model');

class AdArea extends AppModel {
	var $name = 'AdArea';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Ad' => array(
			'className' => 'Ad',
			'foreignKey' => 'ad_area_id',
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
