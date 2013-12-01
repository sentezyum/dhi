<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {

	public $name = 'Post';

	public $validate = array(
		'name_tr' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		),
		'value_tr' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		),
        'name_en' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		),
		'value_en' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		),
        'name_bg' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		),
		'value_bg' => array(
			'rule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Boş Bırakılamaz',
				'last' => true				
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'post_id',
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
