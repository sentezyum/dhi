<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ProductsController extends AdminAppController {

	public $name = 'Products';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Product.id'    => 'desc') 
	); 

	public $uses = array('Product');

	public function index() {
		$this->set('products', $this->paginate());
	}

	public function add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('<p>Ürün kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Ürün kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		$this->set('groups', $this->Product->Productgroup->generateTreeList($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
	}

	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Yanlış Ürün', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('<p>Ürün kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<p>Ürün kaydedilemedi</p>', true),'default',array('class' => 'message info'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$this->set('groups', $this->Product->Productgroup->generateTreeList($conditions=null, $keyPath=null, $valuePath=null, $spacer= '+', $recursive=null));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('<p>Ürün silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Haber</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Product']['id'] = $id;
		$data['Product']['has_confirm'] = $value;
		if ($this->Product->save($data)) {
			$this->Session->setFlash(__('<p>Ürün ayarlandı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array("action" => "index"));
		}
		$this->Session->setFlash(__('Ürün ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>