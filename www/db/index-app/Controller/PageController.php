<?php

App::uses('AppController', 'Controller');


class PageController extends AppController {
    
    public $name = 'Page';

    public $uses = 'Staticpage';

    public function index() {
      if (!isset($this->request->params["id"])) {
        $this->redirect('/');
      }
      $page = $this->Staticpage->findById($this->request->params["id"]);
      if (empty($page)) {
        $this->redirect('/');
      }
      Configure::write("BodyClass", "corporate_about");
      $page = $this->Staticpage->Image->getImages(array(0 => $page), 'staticpage');
      $page = $page[0];
      $this->set("title_for_layout", "Dhi" . " &raquo; " . $page['Staticpage']['name' . $this->langPrefix()]);
      $this->set(compact('page'));
    }
}
