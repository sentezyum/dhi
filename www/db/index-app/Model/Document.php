<?php 

App::uses('AppModel', 'Model');

class Document extends AppModel {

	public $name = 'Document';

	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Imagegallery' => array(
			'className' => 'Imagegallery',
			'foreignKey' => 'imagegallery_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Notification' => array(
			'className' => 'Notification',
			'foreignKey' => 'notification_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Staticpage' => array(
			'className' => 'Staticpage',
			'foreignKey' => 'staticpage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Productgroup' => array(
			'className' => 'Productgroup',
			'foreignKey' => 'productgroup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}