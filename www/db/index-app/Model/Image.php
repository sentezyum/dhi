<?php

App::uses('AppModel', 'Model');

class Image extends AppModel {
	public $name = 'Image';
	public $displayField = 'name';

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
		),
		'Reference' => array(
			'className' => 'Reference',
			'foreignKey' => 'reference_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'ImageFile' => array(
			'className' => 'ImageFile',
			'foreignKey' => 'image_id',
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
	

	public function getImages($sources = Array(), $model = Null) {
		if ($model != Null) {
			$modelTable = ucfirst($model);
			$output = Array();
			foreach ($sources as $source) {
				$temp = Array();
				$temp = $source;
				unset($temp['Image']);
				foreach ($source['Image'] as $image) {
					$imageFiles = $this->ImageFile->find('all',Array('conditions' => Array('ImageFile.image_id' => $image['id'])));
					foreach ($imageFiles as $imageFile) {
						if (!isset($temp['Image']['Named'])) {$temp['Image']['Named'] = Array();}
						if (!isset($temp['Image']['NonNamed'])) {$temp['Image']['NonNamed'] = Array();}
						if (!isset($temp['Image']['Main'])) {$temp['Image']['Main'] = Array();}
						if (!isset($temp['Image']['NonMain'])) {$temp['Image']['NonMain'] = Array();}
						if (!isset($temp['Image']['All'])) {$temp['Image']['All'] = Array();}
						if ($image['name'] != '') {
							$temp['Image']['Named'][$image['name']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						} else {
							$temp['Image']['NonNamed'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						}
						if ($image['main'] == 1) {
							$temp['Image']['Main'][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						} else {
							$temp['Image']['NonMain'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						}
						$temp['Image']['All'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
					}
				}
				$output[] = $temp;
			}
		} else {
			$output = Array();
			foreach ($sources as $source) {
				$temp = Array();
				$temp = $source;
				unset($temp['Image']);
				foreach ($source['Image'] as $image) {
					$imageFiles = $this->ImageFile->find('all',Array('conditions' => Array('ImageFile.image_id' => $image['id'])));
					foreach ($imageFiles as $imageFile) {
						if (!isset($temp['Image']['Named'])) {$temp['Image']['Named'] = Array();}
						if (!isset($temp['Image']['NonNamed'])) {$temp['Image']['NonNamed'] = Array();}
						if (!isset($temp['Image']['Main'])) {$temp['Image']['Main'] = Array();}
						if (!isset($temp['Image']['NonMain'])) {$temp['Image']['NonMain'] = Array();}
						if (!isset($temp['Image']['All'])) {$temp['Image']['All'] = Array();}
						if ($image['name'] != '') {
							$temp['Image']['Named'][$image['name']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						} else {
							$temp['Image']['NonNamed'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						}
						if ($image['main'] != '') {
							$temp['Image']['Main'][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						} else {
							$temp['Image']['NonMain'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
						}
						$temp['Image']['All'][$image['id']][$imageFile['ImageSize']['filename']] = 'resimler/' . $imageFile['ImageFile']['filename'];
					}
				}
				$output[] = $temp;	
			}
		}
		return $output;
	}


}
