<?php 

App::uses('AdminAppController', 'Admin.Controller');

class GeneralSettingsController extends AdminAppController {

	public $name = 'GeneralSettings';

	public $uses = 'GeneralSetting';

	public function index() {
		if (!empty($this->data)) {
			foreach ($this->request->data['GeneralSetting'] as $setting) {
				$this->GeneralSetting->save(array('GeneralSetting' => $setting));
			}
			$this->redirect(array('action' => 'index'));
		}
		$this->set('settings', $this->GeneralSetting->find("all"));
	}
}