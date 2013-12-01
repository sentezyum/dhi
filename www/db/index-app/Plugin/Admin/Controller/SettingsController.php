<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class SettingsController extends AdminAppController {

	public $name = 'Settings';
	public $uses = '';
	public $modules = Array(
					'Settings' => 'Setting'
					);
	public function index() {
		if (!empty($this->data)) {
			foreach ($this->modules as $controllerName => $moduleName) {
				$this->loadModel($moduleName);
				$this->data[$moduleName]['id'] = 1;
				$this->$moduleName->save($this->data);
			}
			$this->data = Array();
		}
		foreach ($this->modules as $controllerName => $moduleName) {
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
			$this->data[$moduleName] = $temps[$moduleName];
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
		}
		$this->set('modules',$this->modules);
		$this->set('field_names',$field_names);
	}


}
?>