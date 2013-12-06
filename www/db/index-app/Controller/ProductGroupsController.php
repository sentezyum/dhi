<?php

App::uses("AppController", "Controller");

class ProductGroupsController extends AppController {

	public $name = "ProductGroups";

	public $uses = "Productgroup";

	public function index(){
		if (!isset($this->request->params["id"])) {
			$this->redirect('/');
		}
		$productGroup = $this->Productgroup->findById($this->request->params["id"]);
		if (empty($productGroup)) {
			$this->redirect('/');
		}
		$rootNode = $this->Productgroup->getPath($this->request->params["id"],null, -1);
		$rootNode = $rootNode[0]["Productgroup"];
		Configure::write("BodyClass", "yer_ekipmanlari");
		if ($rootNode["id"] == 4) {
			Configure::write("BodyClass", "led_ekipmanlari");
		}

		$products = array();
		if ($this->request->params["id"] != 4 && $this->request->params["id"] != 3) {
			$conditions = array("Product.productgroup_id" => array($this->request->params["id"]));
			foreach ($this->Productgroup->children($this->request->params["id"], $direct = false, $fields = null, $order = null, $limit = null, $page = 1, $recursive = -1) as $key => $value) {
				$conditions["Product.productgroup_id"][] = $value['Productgroup']['id'];
			}
			$products = $this->Productgroup->Product->find("all", array("conditions" => $conditions));
			$products = $this->Productgroup->Image->getImages($products, 'product');
		}
		
		$productGroup = $this->Productgroup->Image->getImages(array(0 => $productGroup), 'productgroup');
		$productGroups = $this->Productgroup->find("all", array("conditions" => array('Productgroup.parent_id' => $rootNode["id"])));
		$productGroup = $productGroup[0];
		$this->set("title_for_layout", "Dhi" . " &raquo; " . __('Ürün Gruplari') . " &raquo; " . $productGroup['Productgroup']['name' . $this->langPrefix()]);
		$this->set(compact('productGroup', 'productGroups', 'products'));
	}
}