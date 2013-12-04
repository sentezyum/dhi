<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class ImagesController extends AdminAppController {

	public $name = 'Images';

	public $uses = 'Image';

	public $links = array(
		'post' => Array('controller'=>'posts','link' => 'posts', 'views' => 'Haber', 'viewp' => 'Haberlere','model' => 'Post'),
		'article' => Array('controller'=>'articles','link' => 'articles', 'views' => 'Yazı', 'viewp' => 'Yazılara','model' => 'Article'),
		'user' => Array('controller'=>'users','link' => 'users', 'views' => 'Kullanıcı', 'viewp' => 'Kullanıcılara','model' => 'User'),
		'product' => Array('controller'=>'products','link' => 'products', 'views' => 'Ürün', 'viewp' => 'Ürünlere','model' => 'Product'),
		'notification' => Array('controller'=>'notifications','link' => 'notifications', 'views' => 'Duyuru', 'viewp' => 'Duyurulara','model' => 'Notification'),
		'staticpage' => Array('controller'=>'staticpages','link' => 'staticpages', 'views' => 'Sayfa', 'viewp' => 'Sayfalara','model' => 'Staticpage'),
		'imagegallery' => Array('controller'=>'imagegalleries','link' => 'imagegalleries', 'views' => 'Resim Galerisi', 'viewp' => 'Resim Galerisine','model' => 'Imagegallery'),
		'productgroup' => Array('controller'=>'productgroups','link' => 'productgroups', 'views' => 'Ürün Grubu', 'viewp' => 'Ürün Grubuna','model' => 'Productgroup')
	);

	public function index($model = Null,$id = Null) {
		if (!$model OR !$id) {
			$this->redirect('/');
		}

		$Genel = new GenelHelper(new View());
		
		$saveColumn = $model . '_' . $id;
		$settingModel = $this->links[$model]['model'] . 'Setting';

		$this->loadModel($settingModel);
		$settings = $this->{$settingModel}->findById(1);
		$settings = $settings[$settingModel];		

		$this->set('settings',$settings);
		$this->set('id',$id);
		$this->set('model',$model);

		$modelName = $this->links[$model]['model'];
		$this->loadModel($modelName);
		
		$imageTypeId = $settings['image_type_id'];
		$img = $this->Image->find('all', array('conditions'=>Array('Image.'.$model.'_id' => $id)));

		if (count($img) == 0) {$main = 1;} else {$main=0;}
		$files = Array();
		$fileName = date('Ymdhms');

		if (!empty($this->request->data)) {
			pr($this->request->data);
			die();
			$hata = 0;
    		if ($data = $this->Uploader->upload('fileName', array('overwrite' => true, 'name' => $fileName))) {
				$this->request->data['Image']['ext'] = $data['ext'];
				if (isset($settings['has_image_main'])) {
					if ($settings['has_image_main'] == 1 AND !isset($this->request->data['Image']['id'])) {
						$this->request->data['Image']['main'] = $main;
					}
				}
				if (isset($settings['default_image_name'])) {
					if ($settings['default_image_name'] != '') {
						$this->request->data['Image']['name'] = $settings['default_image_name'];
					}
				}
				$this->request->data['Image']['path'] = 'resimler/';
				$this->Image->save($this->request->data);
				$imageid = $this->Image->id;
				$this->PImage->resizeImage('resizeCrop', $data['name'], $tempDir, $fileName . '_thumb.' . $data['ext'],100, 100,100);
				$files['thumb'] =  $fileName . '_thumb.' . $data['ext'];
				$this->Uploader->move('img/temp/' . $files['thumb'], 'img/thumbs/' . $model .'_' . $imageid . '.' . $data['ext'], true);
				$this->loadModel('ImageType');
				$filetypes = $this->ImageType->findById($imageTypeId);
				$desiredfilename = $model;
				$kontrol = $this->Image->ImageFile->find('all',Array('conditions' => Array('ImageFile.image_id' => $imageid)));
					if (count($kontrol) > 0) {
						$this->Image->ImageFile->deleteAll(Array('ImageFile.image_id' => $imageid));
					}
				foreach ($filetypes['ImageSize'] as $key => $values) {
					if ($values['width'] == "") {$wdth = false;} else {$wdth = $values['width'];}
					if ($values['height'] == "") {$hght = false;} else {$hght = $values['height'];}
					if ($wdth == false AND $hght == false) {
						copy('img/temp/' . $data['name'],'../img/resimler/' . $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext']);
						
					} else {
						if ($wdth == false OR $hght == false) {
							$this->PImage->resizeImage('resize', $data['name'], $tempDir, $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], $wdth, $hght, $values['quality']);
							$this->Uploader->move('img/temp/' . $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], '../img/resimler/' . $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], true);
						}
					}
					if ($wdth != false AND $hght != false) {
						$this->PImage->resizeImage('resizeCrop', $data['name'], $tempDir, $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], $wdth, $hght, $values['quality']);
						$this->Uploader->move('img/temp/' . $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], '../img/resimler/' . $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'], true);
					}
					$veri = Array();
					$veri['ImageFile']['image_id'] = $imageid;
					$veri['ImageFile']['filename'] = $desiredfilename . '_' . $values['filename'] . '_' . $imageid . '.' . $data['ext'];
					$veri['ImageFile']['image_size_id'] = $values['id'];
					$this->Image->ImageFile->create();
					$this->Image->ImageFile->save($veri);
				}
				$this->Uploader->delete($data['path']);
				$this->Session->setFlash(__('<p>Fotoğraf Eklendi</p>', true),'default',array('class' => 'message info'));
				unset($this->request->data['Image']);
				$hata = 1;
				$this->redirect(array('action'=>'index/'. $model . '/' . $id));
    		} else if ($hata == 0 AND isset($this->request->data['Image']['id'])) {
    			$this->Image->save($this->request->data);
    			$this->Session->setFlash(__('<p>Fotoğraf Kaydedildi</p>', true),'default',array('class' => 'message info'));
    			unset($this->request->data['Image']);
    			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
    		}
    	}
    	
    	$controller = $this->links[$model]['controller'] . 'Controller';
		App::uses($controller, 'Admin.Controller');
		$controller = new $controller;
		$this->set('page', $this->$modelName->getPageNumber($id, $controller->paginate['limit'] , $controller->paginate['order']));
		$this->set('images', $this->Image->find('all',Array('conditions'=>Array('Image.'.$model.'_id' => $id))));
		$this->set('links', $this->links);
	}

	public function delete($model = null,$id = Null,$imageId = Null) {
		if (!$imageId) {
			$this->Session->setFlash(__('<p>Yanlış Fotoğraf</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$img = $this->Image->findById($imageId);
		$imgs = $this->Image->find('all',Array('conditions' => Array('Image.' . $model . '_id' => $id)));
		if (count($imgs) != 1) {
			if ($img['Image']['main'] == 1) {
				$imgc = $this->Image->find('all',Array('conditions' => Array('and' => Array('Image.' . $model .'_id' => $id, 'Image.id !=' => $imageId))));
				$veri['Image']['id'] = $imgc[0]['Image']['id'];
				$veri['Image']['main'] = 1;
				$this->Image->Save($veri);
			}
		}
		$files = $this->Image->ImageFile->find('all',Array('conditions' => Array('ImageFile.image_id' => $imageId)));
		$imageid = $imageId;
		$ext = $img['Image']['ext'];
		foreach ($files as $key => $values) {
			$this->Uploader->delete('../img/resimler/' . $values['ImageFile']['filename']);
		}
			$this->Uploader->delete('img/thumbs/' . $model . '_' . $imageid . '.' . $ext);
		if ($this->Image->delete($imageId)) {
			$this->Image->ImageFile->deleteAll(Array('ImageFile.image_id' => $imageid));
			$this->Session->setFlash(__('<p>Fotoğraf Silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$this->Session->setFlash(__('<p>Fotoğraf Silinemedi</p>', true),'default',array('class' => 'message info'));
		$this->redirect(array('action'=>'index/'. $model . '/' . $id));
	}
	public function setmain($model = null,$id = Null,$imageId = Null) {
		if (!$imageId) {
			$this->Session->setFlash(__('<p>Yanlış Fotoğraf</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$this->Image->updateAll(
			array('Image.main' => 0),
			array('and' => Array('Image.main' => 1,'Image.' . $model . '_id' => $id))
		);
		$data['Image']['id'] = $imageId;
		$data['Image']['main'] = 1;
		if ($this->Image->save($data)) {
			$this->Session->setFlash(__('<p>Fotoğraf Ayarlandı</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$this->Session->setFlash(__('<p>Fotoğraf Ayarlanamadı</p>', true),'default',array('class' => 'message info'));
		$this->redirect(array('action'=>'index/'. $model . '/' . $id));
	}
}
?>