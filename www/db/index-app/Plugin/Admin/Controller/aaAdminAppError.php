<?php
class AppError extends ErrorHandler {
	function __construct($method, $messages) {
	   Configure::write('debug', 2);
	   parent::__construct($method, $messages);
	}
	function error404() { 
        $this->controller->redirect('/'); 
	}
}
?>