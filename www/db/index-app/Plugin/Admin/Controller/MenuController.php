<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class MenuController extends AdminAppController {
	public $name = 'Menu';
	public $uses = 'Page';
	public function index(){
		$pages = $this->Page->find('list');
		$pagesVal = $this->Page->find('all',Array('order' => 'Page.order'));
		
		$this->set('pagesVal' , $pagesVal);
		$this->set('pages' , $pages);
	}
	public function pages(){
		$this->layout = 'ajax';
		$pages = $this->Page->find('all');
		$this->set('pages' , $pages);
	}
	public function add(){
		$this->layout = 'ajax';
		$sonuc='';
		if (isset($this->data['Page'])) {
			$this->Page->save($this->data);
			$id = $this->Page->id;
			$sonuc = $id . '1010101' . $this->data['Page']['name'] . '1010101' . $this->data['Page']['controller'];
		}
		if (isset($this->data['PageLink'])) {
			$this->Page->PageLink->save($this->data);
			$id = $this->Page->PageLink->id;
			$sonuc = $id . '1010101' . $this->data['PageLink']['name'] . '1010101' . $this->data['PageLink']['link']. '1010101' . $this->data['PageLink']['page_id'];
		}
		$this->set('sonuc',$sonuc);
	}
	public function order(){
		$this->layout = 'ajax';
		$sonuc='';
		if (isset($this->params['data']['order'])) {
			$pageOrder = 1;
			foreach ($this->params['data']['order'] as $key => $val) {
				$data = explode(':',$val);
				$data = explode('_',$data[0]);
				$pageId = $data[1];
				$page['Page']['id'] = $pageId;
				$page['Page']['order'] = $pageOrder;
				$this->Page->save($page);
				$pageOrder++;
				$data = explode(':',$val);
				if ($data[1] != '') {
					$data = explode(',',$data[1]);
					$subPageOrder = 1;
					foreach ($data as $keya => $vala) {
						$veri = explode('_',$vala);
						$subPageId = $veri[1];
						$subPage['PageLink']['id'] = $subPageId;
						$subPage['PageLink']['order'] = $subPageOrder;
						$this->Page->PageLink->save($subPage);
						$subPageOrder++;
					}
				}
			}
			$sonuc ='OK';
		}
		$this->set('sonuc',$sonuc);
	}
	public function del(){
		$this->layout = 'ajax';
		$sonuc='';
		if (isset($this->params['data']['type'])) {
			$table = $this->params['data']['type'];
			if ($table == 'Page') {
				$this->Page->delete($this->params['data']['id'],True);
				$sonuc ='OK';
			} else if ($table == 'PageLink') {
				$this->Page->PageLink->delete($this->params['data']['id']);
				$sonuc ='OK';
			}
		}
		$this->set('sonuc',$sonuc);
	}
}
