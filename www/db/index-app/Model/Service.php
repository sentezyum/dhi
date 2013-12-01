<?php

App::uses('AppModel', 'Model');

class Service extends AppModel {
	var $name = 'Service';
	var $displayField = 'name';
		var $validate = array(
						'name' => array(
							'rule-1' => array(
										'rule' => 'notEmpty',
										'message' => 'Boş Bırakılamaz',
										'last' => true				
									)
						)
					);

}
