<?php

App::uses('AppModel', 'Model');

class PostShowRelation extends AppModel {
	var $name = 'PostShowRelation';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PostShowArea' => array(
			'className' => 'PostShowArea',
			'foreignKey' => 'post_show_area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
