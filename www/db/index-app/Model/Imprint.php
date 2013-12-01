<?php

App::uses('AppModel', 'Model');

class Imprint extends AppModel {
	var $name = 'Imprint';
        var $displayField = 'name';
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Imprintgroup' => array(
			'className' => 'Imprintgroup',
			'foreignKey' => 'imprintgroup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
