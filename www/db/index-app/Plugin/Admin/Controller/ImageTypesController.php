<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ImageTypesController extends AdminAppController {

	public $name = 'ImageTypes';

	public $uses = 'ImageType';

	public function index() {
		$this->ImageType->recursive = 0;
		$this->set('imageTypes', $this->paginate());
	}
		public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid image type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('imageType', $this->ImageType->read(null, $id));
	}

	public function add() {
		$Genel = new GenelHelper(new View());
		if (!empty($this->request->data)) {
			$this->request->data['ImageType']['name'] = $Genel->ilk_harf($this->request->data['ImageType']['name']);
			$this->ImageType->create();
			if ($this->ImageType->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Resim tipi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image type could not be saved. Please, try again.', true));
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper(new View());
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid image type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			$this->request->data['ImageType']['name'] = $Genel->ilk_harf($this->request->data['ImageType']['name']);
			if ($this->ImageType->save($this->request->data)) {
				$this->Session->setFlash(__('<p>Resim tipi kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->ImageType->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image type', true));
			$this->redirect(array('action'=>'index'));
		}
		$hata = 0;
		$kontrol = $this->ImageType->findById($id);
		foreach ($kontrol as $veriler) {
			if ($veriler != $kontrol['ImageType']) {
				if (count($veriler) > 0) {
					$hata = 1;
				}
			}
		}
		if ($hata != 1) {
			if ($this->ImageType->delete($id)) {
				$this->Session->setFlash(__('<p>Resim tipi silindi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
			}
		} else {
				$this->Session->setFlash(__('<p>Bağlı resimler olduğundan silinemedi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>