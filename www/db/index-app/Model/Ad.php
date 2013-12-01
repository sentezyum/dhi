<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {
	var $name = 'Ad';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'AdArea' => array(
			'className' => 'AdArea',
			'foreignKey' => 'ad_area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
