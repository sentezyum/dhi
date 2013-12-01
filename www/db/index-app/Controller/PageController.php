<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PageController extends AppController {
    var $name = 'Page';
    var $uses = 'Staticpage';

    function view($id = Null) {
        if ($id == Null) {
            $this->redirect('/');
        }
        $page = $this->Staticpage->findById($id);
        if (empty($page)) {
            $this->redirect('/');
        }
        $lang = $this->Session->read('lang');
        $prefLang = '';
        if ($page['Staticpage']['value_' . $lang['Short']] == '') {
           if ($page['Staticpage']['value_en'] == '') {
               if ($page['Staticpage']['value_tr'] == '') {
                   $this->redirect('/');
               } else {
                   $prefLang['Short'] = 'tr';
                   $prefLang['Long'] = 'Türkçe';
               }
           } else {
               $prefLang['Short'] = 'en';
               $prefLang['Long'] = 'İngilizce';
           }
        } else {
            $prefLang['Short'] = $lang['Short'];
        }
        $this->set('page',$page);
        $this->set('prefLang',$prefLang);
    }
}
