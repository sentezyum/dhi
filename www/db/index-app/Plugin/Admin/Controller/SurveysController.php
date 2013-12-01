<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('ModulesController', 'Admin.Controller');
App::uses('GenelHelper', 'View/Helper');

class SurveysController extends AdminAppController {

	public $name = 'Surveys';
	public $paginate = array( 
	    	'limit' => 50,
	        'order'    => array( 
	            'Survey.id'    => 'desc') 
	); 
	public function beforeFilter() {
		$module = new ModulesController;
		$modules = $module->modules;
		if (!isset($modules['Surveys'])) {$this->redirect(array('controller'=>'hata','action' => 'modul_yok','anket'));}
		$this->set('modules',$modules);
	}
	public function index() {
		$this->set('surveys', $this->paginate());
	}
	public function add() {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			if (!isset($this->data['Secenekler'])) {
				$this->Session->setFlash(__('<p>En Az İki Adet Seçenek Olmalı</p>', true),'default',array('class' => 'message info'));
			} else {
				if (count($this->data['Secenekler']) < 2) {
					$this->Session->setFlash(__('<p>En Az İki Adet Seçenek Olmalı</p>', true),'default',array('class' => 'message info'));
				} else { 
					$this->data['Survey']['name'] = $Genel->ilk_harf($this->data['Survey']['name']);
					$this->Survey->create();
					$this->data['Survey']['voters'] = 0;
					if ($this->Survey->save($this->data)) {
						$surveyId = $this->Survey->id;
						foreach ($this->data['Secenekler'] as $secenek) {
							$data = Array();
							$data['SurveyValue']['name'] = $secenek;
							$data['SurveyValue']['survey_id'] = $surveyId;
							$data['SurveyValue']['voters_count'] = 0;
							$data['SurveyValue']['yuzde'] = 0;
							$this->Survey->SurveyValue->create();
							$this->Survey->SurveyValue->save($data);
						}
						$this->Session->setFlash(__('<p>Anket kaydedildi</p>', true),'default',array('class' => 'message info'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('<p>Anket kaydedilemedi</p>', true),'default',array('class' => 'message info'));
					}
				}
			}
		}
	}

	public function edit($id = null) {
		$Genel = new GenelHelper;
		if (!empty($this->data)) {
			if (!isset($this->data['Secenekler'])) {
				$this->Session->setFlash(__('<p>En Az İki Adet Seçenek Olmalı</p>', true),'default',array('class' => 'message info'));
			} else {
				if (count($this->data['Secenekler']) < 2) {
					$this->Session->setFlash(__('<p>En Az İki Adet Seçenek Olmalı</p>', true),'default',array('class' => 'message info'));
				} else { 
					$this->data['Survey']['name'] = $Genel->ilk_harf($this->data['Survey']['name']);
					$this->data['Survey']['voters'] = 0;
					if ($this->Survey->save($this->data)) {
						$surveyId = $this->Survey->id;
						foreach ($this->data['Secenekler'] as $key => $secenek) {
							$keya = explode("_",$key);
							$keya = $keya[1];							
							$data = Array();
							$data['SurveyValue']['id'] = $keya;
							$data['SurveyValue']['name'] = $secenek;
							$data['SurveyValue']['survey_id'] = $surveyId;
							$data['SurveyValue']['voters_count'] = 0;
							$data['SurveyValue']['yuzde'] = 0;
							$this->Survey->SurveyValue->save($data);
						}
						$this->Session->setFlash(__('<p>Anket kaydedildi</p>', true),'default',array('class' => 'message info'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('<p>Anket kaydedilemedi</p>', true),'default',array('class' => 'message info'));
					}
				}
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Survey->read(null, $id);
			$surveyValues = $this->Survey->SurveyValue->Find('all',Array('conditions' => Array('SurveyValue.survey_id' => $id)));
			foreach ($surveyValues as $surveyValue) {
				$this->data['Secenekler']['secenek_' . $surveyValue['SurveyValue']['id']] = $surveyValue['SurveyValue']['name'];
			}
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image size', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Survey->delete($id)) {
			$this->Survey->SurveyValue->deleteAll(Array('SurveyValue.survey_id' => $id));
			$this->Survey->SurveyVoter->deleteAll(Array('SurveyVoter.survey_id' => $id));
			$this->Session->setFlash(__('<p>Anket silindi</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image size was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	public function set_confirm($id = null,$value = 1) {
		if (!$id) {
			$this->Session->setFlash(__('<p>Yanlış Anket</p>', true),'default',array('class' => 'message info'));
			$this->redirect(array('action'=>'index'));
		}
		$data['Survey']['id'] = $id;
		$data['Survey']['has_confirm'] = $value;
			$page = $this->{$this->modelClass}->getPageNumber($id, $this->paginate['limit'] , $this->paginate['order']);
			if ($this->Survey->save($data)) {
				$this->Session->setFlash(__('<p>Anket ayarlandı</p>', true),'default',array('class' => 'message info'));
				$this->redirect("/" . $this->params['controller'] . "/index/page:{$page}");
			}
		
		$this->Session->setFlash(__('Anket ayarlanamadı', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>