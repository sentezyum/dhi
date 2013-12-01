<?php

App::uses('AppModel', 'Model');

class ImageFile extends AppModel {
	var $name = 'ImageFile';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ImageSize' => array(
			'className' => 'ImageSize',
			'foreignKey' => 'image_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'image_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
