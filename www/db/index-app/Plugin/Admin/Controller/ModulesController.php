<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ModulesController extends AdminAppController {

	public $name = 'Modules';
	public $uses = '';
	public $components = array('Uploader.Uploader');
	public $modules = Array(
					'Posts' => 'PostSetting',
					'Products' => 'ProductSetting',
					'Users' => 'UserSetting',
					'Imagegalleries' => 'ImagegallerySetting',
					'Comments' => 'CommentSetting',
					'Articles' => 'ArticleSetting',
					'Surveys' => '',
					'Services' => '',
					'Notifications' => 'NotificationSetting',
					'Staticpages' => 'StaticpageSetting',
					'Productgroups' => 'ProductgroupSettings'
					);
	public $maintance = Array(
					'post' => 'Post',
					'product' => 'Product',
					'user' => 'User',
					'imagegallery' => 'Imagegallery',
					'comment' => 'Comment',
					'article' => 'Article',
					'survey' => '',
					'service' => '',
					'notification' => 'Notification',
					'staticpage' => 'Staticpage',
					'productgroup' => 'Productgroup'
					);
	public function index() {
		if (!empty($this->data)) {
			foreach ($this->modules as $controllerName => $moduleName) {
				if ($moduleName != '') {
					$this->loadModel($moduleName);
					$this->data[$moduleName]['id'] = 1;
					$this->$moduleName->save($this->data);
				}
			}
			$this->data = Array();
		}
		foreach ($this->modules as $controllerName => $moduleName) {
			if ($moduleName != '') {
				$temp = Array();
				$this->loadModel($moduleName);
				$temp = $this->$moduleName->find('all');
				if (count($temp) == 0) {
					$data = Array();
					$data[$moduleName]['id'] = 1;
					$this->$moduleName->save($data);
					$temp = $this->$moduleName->find('all');
				}
				$temp = Set::extract('/0/' . $moduleName, $temp);
				$temps = $this->$moduleName->findById(1);
				$this->params->data[$moduleName] = $temps[$moduleName];
				$field_names[$controllerName] = array_keys($temp[0][$moduleName]);
				foreach ($field_names[$controllerName] as $no => $columnName) { 
					$tmp = explode('_',$columnName);
					$a = 0;
					$veric = '';
					$b = 0;
					foreach ($tmp as $key => $val) {
						if ($val == 'id') {
							$a = 1;
						} else if($b==1){
							$veric .= ucfirst($val);
						} else if($b==0) {
							$veric .= $val;
						}
						$b = 1;
					}
					if ($a == 1 and $veric != '') {
						$this->loadModel($veric);
						$this->set($veric.'s',$this->$veric->find('list'));
						$a = 0;
					}
				}
			} else {
				unset($this->modules[$controllerName]);
			}
		}
		$this->set('modules',$this->modules);
		$this->set('field_names',$field_names);
	}
	public function file_maintenance(){
		$Genel = new GenelHelper(new View());
		$this->loadModel('Image');
		$images = $this->Image->find('all');
		$columns = Array();
		foreach ($images as $image) {
			foreach ($image['Image'] as $columnName => $value) {
				$temp = $columnName;
				$temp = explode("_",$temp);
				if (count($temp) > 1) {
					if (@$temp[count($temp) - 1] == 'id' AND $value != '') {
						$deger = '';
						foreach ($temp as $key => $val) {
							if ($key != count($temp) - 1) {
								$deger .= $Genel->ilk_harf($val);
							}
						}
						if (@$image[$deger]['id'] == '') {
							foreach ($image['ImageFile'] as $imageFile) {
								$this->Uploader->delete('../img/resimler/' . $imageFile['filename']);
							}
							$this->Uploader->delete('img/thumbs/' . $temp[0] . '_' . $image['Image']['id'] . '.' . $image['Image']['ext']);
							$this->Image->delete($image['Image']['id']);
							$this->Image->ImageFile->deleteAll(Array('ImageFile.image_id' => $image['Image']['id']));
						}
					}
				}
			}
		}

	}

}
?>