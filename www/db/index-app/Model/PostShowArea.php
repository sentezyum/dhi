<?php

App::uses('AppModel', 'Model');

class PostShowArea extends AppModel {
	var $name = 'PostShowArea';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ImageSize' => array(
			'className' => 'ImageSize',
			'foreignKey' => 'image_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'PostShowRelation' => array(
			'className' => 'PostShowRelation',
			'foreignKey' => 'post_show_area_id',
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