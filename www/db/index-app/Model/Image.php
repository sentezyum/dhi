<?php

App::uses('AppModel', 'Model');

class Image extends AppModel {
	var $name = 'Image';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
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
		'PostCategory' => array(
			'className' => 'PostCategory',
			'foreignKey' => 'post_category_id',
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

	var $hasMany = array(
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
		function getImages($sources = Array(),$model = Null) {
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
							$temp['Image']['Named'][$image['name']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source[$modelTable]['name_tr']);
						} else {
							$temp['Image']['NonNamed'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source[$modelTable]['name_tr']);
						}
						if ($image['main'] == 1) {
							$temp['Image']['Main'][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] .'/' . $this->seo_tr($source[$modelTable]['name_tr']);
						} else {
							$temp['Image']['NonMain'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source[$modelTable]['name_tr']);
						}
						$temp['Image']['All'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source[$modelTable]['name_tr']);
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
							$temp['Image']['Named'][$image['name']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source['name']);
						} else {
							$temp['Image']['NonNamed'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source['name']);
						}
						if ($image['main'] != '') {
							$temp['Image']['Main'][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] .'/' . $this->seo_tr($source['name']);
						} else {
							$temp['Image']['NonMain'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source['name']);
						}
						$temp['Image']['All'][$image['id']][$imageFile['ImageSize']['filename']] = '../photos/' . $imageFile['ImageFile']['id'] . '/' . $this->seo_tr($source['name']);
					}
				}
				$output[] = $temp;	
			}
		}
		return $output;
	}


}
