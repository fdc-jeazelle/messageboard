<?php 

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $posts = array(
            0 => array(
                'Post' => array(
                    'id' => 1,
                    'title' => 'The title',
                    'body' => 'This is the post body.',
                    'created' => '2008-02-13 18:34:55',
                    'modified' => ''
                )
            ),
            1 => array(
                'Post' => array(
                    'id' => 2,
                    'title' => 'A title once again',
                    'body' => 'And the post body follows.',
                    'created' => '2008-02-13 18:34:56',
                    'modified' => ''
                )
            ),
            2 => array(
                'Post' => array(
                    'id' => 3,
                    'title' => 'Title strikes back',
                    'body' => 'This is really exciting! Not.',
                    'created' => '2008-02-13 18:34:57',
                    'modified' => ''
                )
            )
        );
        
        $this->set('posts', $this->Post->find('all'));
    }
}

?>