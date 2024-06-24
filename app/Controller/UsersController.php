<?php
class UsersController extends AppController { 

    public $components = array('Session');
    // public function beforeFilter(){
    //     $this->Auth->allow('index');
    // }
    public function index(){

    }
    // public function register(){
    //     if($this->request->is('post')){
    //         // $this->User->create(); //create a model 
           
    //         $this->User->set($this->request->data);
    //         if($this->User->validates()){ //Validate Fields
    //             $this->request->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    //             $this->request->data['User']['password_confirm'] = AuthComponent::password($this->data['User']['password_confirm']);
    //             // unset($this->request->data['User']['password_confirm']);

    //             if($this->User->save($this->request->data)){
    //                 $this->Session->setFlash('Registration Successful!'); 
    //                 return $this->redirect(array('action' => 'thankyou'));
    //             }
    //         }else{
    //             $this->Session->setFlash('Error saving user.');
    //         }

    //     }
    // }

    public function thankyou(){

    }

    public function account(){

    }

    public function login(){
      
        if($this->request->is('post')){
            // $this->request->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            if($this->Auth->login()){
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('last_logged_in', date('Y-m-d H:i:s'), array('user_id', $this->User->id));
                $this->redirect($this->Auth->redirectUrl()); 
            }else {
                $this->Session->setFlash('Invalid Username or Password!');
                 // Debug SQL query
                // $dataSource = $this->User->getDataSource();
                // $queryLog = $dataSource->getLog(false, false);
                // debug($queryLog);
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
}
?>