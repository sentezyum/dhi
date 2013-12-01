<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class EventsController extends AppController {
	var $name = 'Events';
	function view($id = Null) {
		$eventId = $id;
		$event = $this->Event->findById($eventId);
		if (isset($event['Event']['id'])) {
			$data['Event']['seencount'] = $event['Event']['seencount'] + 1;
			$data['Event']['id'] = $eventId;
			$this->Event->save($data);
		} else {
			$this->redirect('/');
		}
		$event = $this->Event->findById($eventId);
                $this->set('event',$event);
                $lang = $this->Session->read('lang');
		$this->set("title_for_layout", $event['Event']['name_'.$lang['Short']]);
            
        }
        function index(){
		$this->paginate = array(
	    	'limit' => 20,
	        'order'    => array(
	            			'Event.date'    => 'desc'
	            		),
	        'conditions' => Array(
	        		'Event.has_confirm' => 1,
	        )
		);
		$events = $this->paginate();
		$this->set('posts', $events);
        }
}

?>