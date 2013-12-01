<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
	var $name = 'Post';
	var $displayField = 'name_tr';
		var $validate = array(
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

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PostCategory' => array(
			'className' => 'PostCategory',
			'foreignKey' => 'post_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PostResource' => array(
			'className' => 'PostResource',
			'foreignKey' => 'post_resource_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
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
		),
		'PostShowRelation' => array(
			'className' => 'PostShowRelation',
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
		'Video' => array(
			'className' => 'Video',
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
	function getPageNumber($id, $rowsPerPage,$order) {
	    $result = $this->find('list',Array('order' => $order)); // id => name
	    $resultIDs = array_keys($result); // position - 1 => id
	    $resultPositions = array_flip($resultIDs); // id => position - 1
	    $position = $resultPositions[$id] + 1; // Find the row number of the record
	    $page = ceil($position / $rowsPerPage); // Find the page of that row number
	    return $page;
  	}
        function mansetAl($count = 3,$options = Array()) {
		$this->recursive = 1;
		if (!isset($options['conditions'])) {
			$options['conditions'] = Array();
		}
		$posts = $this->find('all',$options);
		$veri = Array();
		$a = 0;
		foreach ($posts as $post) {
			$tmp = Array();
			$tmp = $post;
			if (count($post['Image']) != 0) {
				$a++;
				$veri[] = $tmp;
				if ($a == $count) {break;}
			}
		}
		return $veri;
	}
	function yanAl($count = 10,$stepCount = 6,$options = Array()) {
		$this->recursive = 1;
		$posts = $this->find('all',$options);
		$veri = Array();
		$a = 0;
		$b = 0;
		foreach ($posts as $post) {
			$tmp = Array();
			$tmp = $post;
			if (count($post['Image']) != 0) {
				$a++;
			}
			if ($a > $stepCount OR count($post['Image']) == 0) {
				$veri[] = $tmp;
				$b++;
			}
			if ($b == $count) {break;}
		}
		return $veri;
	}

}
