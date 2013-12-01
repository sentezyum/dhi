<?php

App::uses('AppModel', 'Model');

class ImagegallerySetting extends AppModel {
	var $name = 'ImagegallerySetting';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ImageType' => array(
			'className' => 'ImageType',
			'foreignKey' => 'image_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
