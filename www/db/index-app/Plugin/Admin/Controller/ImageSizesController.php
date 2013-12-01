<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ImageSizesController extends AdminAppController {

	public $name = 'ImageSizes';

	public function index() {
		$this->ImageSize->recursive = 0;
		$this->set('imageSizes', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid image size', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('imageSize', $this->ImageSize->read(null, $id));
	}

	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			$this->data['ImageSize']['filename'] = $Genel->dosya_adi($this->data['ImageSize']['filename']);
			$this->ImageSize->create();
			if ($this->ImageSize->save($this->data)) {
				$this->Session->setFlash(__('<p>Resim boyutu kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image size could not be saved. Please, try again.', true));
			}
		}
		$imageTypes = $this->ImageSize->ImageType->find('list');
		$this->set(compact('imageTypes'));
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid image size', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['ImageSize']['filename'] = $Genel->dosya_adi($this->data['ImageSize']['filename']);
			if ($this->ImageSize->save($this->data)) {
				$this->Session->setFlash(__('<p>Resim boyutu kaydedildi</p>', true),'default',array('class' => 'message info'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image size could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ImageSize->read(null, $id);
		}
		$imageTypes = $this->ImageSize->ImageType->find('list');
		$this->set(compact('imageTypes'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ImageSize->delete($id)) {
			$this->Session->setFlash(__('<p>Resim boyutu silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>