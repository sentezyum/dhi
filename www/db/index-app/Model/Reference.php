<?php

App::uses('AppModel', 'Model');

class Reference extends AppModel {

	public $name = 'Reference';

	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'reference_id',
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