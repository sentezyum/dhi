<?php

App::uses('AppModel', 'Model');

class Contact extends AppModel {
	var $name = 'Contact';
        var $displayField = 'name';
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Contactgroup' => array(
			'className' => 'Contactgroup',
			'foreignKey' => 'contactgroup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
