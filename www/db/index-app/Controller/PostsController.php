<?php

App::uses('AppController', 'Controller');
App::uses('ModulesController', 'Controller');

class PostsController extends AppController {
	var $name = 'Posts';
	function view($id = Null) {
			
		$postId = $id;
		$post = $this->Post->findById($postId);
		if (isset($post['Post']['id'])) {
			$data['Post']['seencount'] = $post['Post']['seencount'] + 1;
			$data['Post']['id'] = $postId;
			$this->Post->save($data);	
		} else {
			$this->redirect('/');
		}
		$post = $this->Post->findById($postId);
		$posts[0] = $post;
		$post = $this->Post->Image->getImages($posts,'post');
                $this->set('post',$post[0]);
                $lang = $this->Session->read('lang');
		$this->set("title_for_layout", $post[0]['Post']['name_'.$lang['Short']]);
            
        }
        function index(){
		$this->paginate = array(
	    	'limit' => 20,
	        'order'    => array(
	            			'Post.created'    => 'desc'
	            		),
	        'conditions' => Array(
	        		'Post.has_confirm' => 1,
	        )
		);
		$posts = $this->paginate();
		$posts = $this->Post->Image->getImages($posts,'post');
		$this->set('posts', $posts);
        }
}

?>