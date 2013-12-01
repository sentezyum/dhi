<?php

App::uses('AppModel', 'Model');

class SurveyVoter extends AppModel {
	var $name = 'SurveyVoter';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'survey_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SurveyValue' => array(
			'className' => 'SurveyValue',
			'foreignKey' => 'survey_value_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
