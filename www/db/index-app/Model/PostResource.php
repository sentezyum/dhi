<?php

App::uses('AppModel', 'Model');

class PostResource extends AppModel {
	var $name = 'PostResource';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_resource_id',
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
