<?php

App::uses('AppHelper', 'View/Helper');

class CaptchaToolHelper extends AppHelper {
	/**
	 * Display a reCapthca input
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function show() {
		App::import('Vendor', 'recaptcha'.DS.'recaptchalib'); 
		
		if (empty($this->params['Recaptcha.public_key'])) {
			return $this->output(__('No public key was set for reCaptcha.', true));
		}
		
		$code = '';
		if (!empty($this->params['Recaptcha.configuration']) && is_array($this->params['Recaptcha.configuration'])) {
			$code = '<script type="text/javascript">var RecaptchaOptions = ' . json_encode($this->params['Recaptcha.configuration']) . ';</script>';
		}
		
		$code .= recaptcha_get_html($this->params['Recaptcha.public_key']);
		
		return $this->output($code);
	}
}
?>