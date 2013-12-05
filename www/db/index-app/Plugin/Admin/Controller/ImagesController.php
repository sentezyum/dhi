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
		
		if (!empty($this->request->data)) {
			$hata = $this->request->data["ImageFile"]["filename"]["error"];
			pr($this->request->data);
    		if ($hata === 0) {
    			$this->loadModel('ImageFile');
    			$this->loadModel('ImageType');
    			
				$filetypes = $this->ImageType->findById($imageTypeId);
				$this->request->data['Image']['path'] = 'resimler/';
				$this->Image->save($this->request->data);
				$imageid = $this->Image->id;
				foreach ($this->ImageFile->find('all', array('conditions' => array('ImageFile.image_id' => $imageid), 'recursive' => -1)) as $file) {
					$file = WWW_ROOT . 'img' . DS . 'resimler' . DS . $file['ImageFile']['filename'];
					unlink($file);
				}
				$this->ImageFile->deleteAll(Array('ImageFile.image_id' => $imageid));
    			$transforms = array();
    			foreach ($filetypes['ImageSize'] as $key => $values) {
					if ($values['width'] == "") {$wdth = 0;} else {$wdth = $values['width'];}
					if ($values['height'] == "") {$hght = 0;} else {$hght = $values['height'];}
					$transforms[$values['filename']] = array(
						'class' => 'crop',
						'append' => $values['id'],
						'prepend' => $values['filename'],
						'width' => $wdth,
						'height' => $hght,
						'quality' => $values['quality']
					);
				}
				$this->ImageFile->related['model'] = $model;
				$this->ImageFile->related['model_id'] = $id;
				$this->ImageFile->related['image_id'] = $imageid;
				$this->ImageFile->actsAs['Uploader.Attachment']['filename']['transforms'] = $transforms;
				$this->ImageFile->save(array('ImageFile' => $this->request->data['ImageFile']));
				$this->ImageFile->deleteAll(array('ImageFile.image_id' => null));
				$this->ImageFile->toBeDelete->delete();

				$imageData = array();
				$imageData['Image']['id'] = $imageid;
				$imageData['Image']['ext'] = $this->ImageFile->related['file_ext'];
				if (isset($settings['has_image_main'])) {
					if ($settings['has_image_main'] == 1 AND !isset($this->request->data['Image']['id'])) {
						$imageData['Image']['main'] = $main;
					}
				}
				if (isset($settings['default_image_name'])) {
					if ($settings['default_image_name'] != '') {
						$imageData['Image']['name'] = $settings['default_image_name'];
					}
				}
				$this->Image->save($imageData);
				$this->Session->setFlash(__('<p>Fotoğraf Eklendi</p>', true),'default',array('class' => 'message info'));
				unset($this->request->data['Image']);
				unset($this->request->data['ImageFile']);
				$hata = 1;
				$this->redirect(array('action'=>'index/'. $model . '/' . $id));

    		} else if ($hata == 0 AND isset($this->request->data['Image']['id'])) {
    			$this->Image->save($this->request->data);
    			$this->Session->setFlash(__('<p>Fotoğraf Hatası</p>', true),'default',array('class' => 'message info'));
    			unset($this->request->data['Image']);
    			unset($this->request->data['ImageFile']);
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
			$file = WWW_ROOT . 'img' . DS . 'resimler' . DS . $values['ImageFile']['filename'];
			unlink($file);
		}
		$file = WWW_ROOT . 'img' . DS . 'resimler' . DS . $model . '_' . $imageid . '.' . $ext;
		unlink($file);
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