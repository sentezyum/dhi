<?php

App::uses('AppController', 'Controller');

class ProductController extends AppController {

	public $name = 'Product';

	public $uses = 'Product';

	public function index() {
		if (!isset($this->request->params["id"])) {
			$this->redirect('/');
		}
		$product = $this->Product->findById($this->request->params["id"]);
		if (empty($product)) {
			$this->redirect('/');
		}
		$productGroup = $this->Product->Productgroup->findById($product['Productgroup']['id']);
		if (empty($productGroup)) {
			$this->redirect('/');
		}
		$rootNode = $this->Product->Productgroup->getPath($product['Productgroup']['id'],null, -1);
		$rootNode = $rootNode[0]["Productgroup"];
		Configure::write("BodyClass", "yer_ekipmanlari");
		if ($rootNode["id"] == 4) {
			Configure::write("BodyClass", "led_ekipmanlari");
		}

		$product = $this->Product->Image->getImages(array(0 => $product), 'product');
		$product = $product[0];
		$productGroups = $this->Product->Productgroup->find("all", array("conditions" => array('Productgroup.parent_id' => $rootNode["id"])));
		$this->set("title_for_layout", "Dhi" . " &raquo; " . __('Ürünler') . " &raquo; " . $product['Product']['name' . $this->langPrefix()]);
		$this->set(compact('productGroup', 'productGroups', 'product'));
	}
}