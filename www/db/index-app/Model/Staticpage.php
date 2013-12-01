<?php

App::uses('AppModel', 'Model');

class Staticpage extends AppModel {
	var $name = 'Staticpage';
        var $actsAs = array('Tree');
	var $displayField = 'name_tr';
		var $validate = array(
						'name_tr' => array(
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
                                                'name_bg' => array(
							'rule-1' => array(
										'rule' => 'notEmpty',
										'message' => 'Boş Bırakılamaz',
										'last' => true				
									)
						)
					);
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	var $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'staticpage_id',
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
        var $belongsTo = array(
		'Menuarea' => array(
			'className' => 'Menuarea',
			'foreignKey' => 'menuarea_id',
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

}
