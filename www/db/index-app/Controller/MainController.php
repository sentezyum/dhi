<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class MainController extends AppController {
    var $name = 'Main';
    var $uses = Null;

    function index() {
        $this->loadModel('Post');
        $this->loadModel('Product');

        $posts = $this->Post->find('all', array('limit' => 3, 'order' => 'Post.id DESC'));
		$products = $this->Product->find('all', array('limit' => 9, 'order' => 'Product.id DESC'));
		$products = $this->Product->Image->getImages($products, 'product');

		$this->set(compact('posts', 'products'));
    }
}