<?php
class RegistersController extends AppController { 
    public $uses = array('Register');
    public $components = array('Session');
    // public function beforeFilter(){
    //     $this->Auth->allow('index');
    // }
    public function index(){

    }
    public function register(){
        if($this->request->is('post')){
            $this->Register->create(); //create a model 
           
            $this->Register->set($this->request->data);
            if($this->Register->validates()){ //Validate Fields
                // $this->request->data['Register']['password'] = AuthComponent::password($this->data['Register']['password']);
                // $this->request->data['Register']['password_confirm'] = AuthComponent::password($this->data['Register']['password_confirm']);
                // unset($this->request->data['Register']['password_confirm']);

                if($this->Register->save($this->request->data)){
                    $this->Session->setFlash('Registration Successful!'); 
                    return $this->redirect(array('action' => 'thankyou'));
                }
            }else{
                $this->Session->setFlash('Error saving user.');
            }

        }
    }

    public function thankyou(){

    }

    public function account(){

    }

}
?>