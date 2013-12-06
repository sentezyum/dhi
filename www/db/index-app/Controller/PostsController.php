<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PostsController extends AppController {
	
	public $name = 'Posts';

	public $uses = 'Post';
	
	public function index() {
		$posts = $this->Post->find("all", array('limit' => 25));
		if (empty($posts)) {
			$this->redirect('/');
		}
		Configure::write("BodyClass", "corporate_about");
		$this->set("title_for_layout", "Dhi" . " &raquo; " . __("Haberler"));
		$this->set(compact('posts'));
	}

	public function view() {
		if (!isset($this->request->params["id"])) {
			$this->redirect('/');
		}
		$post = $this->Post->findById($this->request->params["id"]);
		if (empty($post)) {
			$this->redirect('/');
		}
		Configure::write("BodyClass", "corporate_about");
		$post = $this->Post->Image->getImages(array(0 => $post), 'post');
		$post = $post[0];
		$this->set("title_for_layout", "Dhi" . " &raquo; "  . __("Haberler") . " &raquo; " . $post['Post']['name' . $this->langPrefix()]);
		$this->set(compact('post'));
   	}
}

?>