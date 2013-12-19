<?php 

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class DocumentsController extends AdminAppController {

	public $name = 'Documents';

	public $uses = 'Document';

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

		$this->set('id',$id);
		$this->set('model',$model);

		$modelName = $this->links[$model]['model'];
		$this->loadModel($modelName);

		if (!empty($this->request->data)) {
			$hata = $this->request->data["Document"]["filename"]["error"];
			if ($hata === 0) {
				move_uploaded_file($this->request->data['Document']['filename']['tmp_name'], WWW_ROOT . DS . 'files' . DS . 'documents' . DS . $model . '_document_' . $this->request->data['Document']['filename']['name']);
				$this->request->data['Document']['path'] = "/files/documents/" . $model . '_document_' . $this->request->data['Document']['filename']['name'];
				$this->Document->save($this->request->data);
				$this->redirect(array('action'=>'index/'. $model . '/' . $id));
			} else if ($hata != 0 AND isset($this->request->data['Document']['id'])) {
    			$this->Document->save($this->request->data);
    			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
    		}
			$this->Session->setFlash(__('<p>Döküman Kaydedildi</p>', true),'default',array('class' => 'message info'));
		}

		$controller = $this->links[$model]['controller'] . 'Controller';
		App::uses($controller, 'Admin.Controller');
		$controller = new $controller;
		$this->set('page', $this->$modelName->getPageNumber($id, $controller->paginate['limit'] , $controller->paginate['order']));
		$this->set('documents', $this->Document->find('all',Array('conditions'=>Array('Document.'.$model.'_id' => $id))));
		$this->set('links', $this->links);
	}

	public function delete($model = null,$id = Null,$imageId = Null) {
		if (!$imageId) {
			$this->Session->setFlash(__('<p>Yanlış Döküman</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$document = $this->Document->findById($imageId);
		$file = WWW_ROOT . $document['Document']['path'];
		unlink($file);
		if ($this->Document->delete($imageId)) {
			$this->Session->setFlash(__('<p>Döküman Silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index/'. $model . '/' . $id));
		}
		$this->Session->setFlash(__('<p>Döküman Silinemedi</p>', true),'default',array('class' => 'message info'));
		$this->redirect(array('action'=>'index/'. $model . '/' . $id));
	}

}