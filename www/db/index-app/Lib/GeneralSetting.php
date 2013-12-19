<?php

App::uses('GeneralSetting', 'Model');

class GeneralSetting {

	public static function init() {
		$GeneralSetting = new GeneralSetting();
		pr($GeneralSetting);
		$settings = $GeneralSetting->find('all', array('conditions' => array('tag' => $tag)));
		foreach ($settings as $setting) {
			Configure::write('GeneralSetting.' . $setting['GeneralSetting']['tag'], $setting['GeneralSetting']['value']);
		}
		unset($GeneralSetting);
	}
}