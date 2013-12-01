<?php

App::uses('AppModel', 'Model');

class Page extends AppModel {
	var $name = 'Page';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'PageLink' => array(
			'className' => 'PageLink',
			'foreignKey' => 'page_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'PageLink.order',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserPermit' => array(
			'className' => 'UserPermit',
			'foreignKey' => 'page_id',
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
