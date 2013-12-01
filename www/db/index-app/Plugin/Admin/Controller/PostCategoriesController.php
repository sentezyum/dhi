<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class PostCategoriesController extends AdminAppController {

	public $name = 'PostCategories';

	public function index() {
		$this->PostCategory->recursive = 0;
		$this->set('postCategories', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['PostCategory']['name'] = $Genel->ilk_harf($this->data['PostCategory']['name']);
			$this->PostCategory->create();
			if ($this->PostCategory->save($this->data)) {
				$this->Session->setFlash(__('<p>Haber kategorisi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image type could not be saved. Please, try again.', true));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid image type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['PostCategory']['name'] = $Genel->ilk_harf($this->data['PostCategory']['name']);
			if ($this->PostCategory->save($this->data)) {
				$this->Session->setFlash(__('<p>Haber kategorisi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PostCategory->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image type', true));
			$this->redirect(array('action'=>'index'));
		}
		$hata = 0;
		$kontrol = $this->PostCategory->findById($id);
		foreach ($kontrol as $veriler) {
			if ($veriler != $kontrol['PostCategory']) {
				if (count($veriler) > 0) {
					$hata = 1;
				}
			}
		}
		if ($hata != 1) {
			if ($this->PostCategory->delete($id)) {
				$this->Session->setFlash(__('<p>Haber kategorisi silindi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
			}
		} else {
				$this->Session->setFlash(__('<p>Bağlı haberler olduğundan silinemedi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Haber Kategorisi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['PostCategory']['id'] = $id;
		$data['PostCategory']['has_confirm'] = $value;
			if ($this->PostCategory->save($data)) {
				$this->Session->setFlash(__('<p>Haber kategorisi ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index");
			}
		
		$this->Session->setFlash(__('Haber kategorisi ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_main($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Haber Kategorisi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['PostCategory']['id'] = $id;
		$data['PostCategory']['has_main'] = $value;
			if ($this->PostCategory->save($data)) {
				$this->Session->setFlash(__('<p>Haber kategorisi ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index");
			}
		
		$this->Session->setFlash(__('Haber kategorisi ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>