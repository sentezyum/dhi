<?php

App::uses('AppModel', 'Model');

class UserPermit extends AppModel {
	var $name = 'UserPermit';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'UserType' => array(
			'className' => 'UserType',
			'foreignKey' => 'user_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Page.order'
		)
	);
}
