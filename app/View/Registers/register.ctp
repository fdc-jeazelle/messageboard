<h1>REGISTER USER</h1>
<?php 
    echo $this->Form->create('Register');
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    echo $this->Form->input('password', array('type' => 'password')); // Specify type as password
    echo $this->Form->input('password_confirm', array('type' => 'password', 'label' => 'Confirm Password')); // Confirm password field
    echo $this->Form->end('Submit');
    




?>

<h3>Already have an account?</h3> <?php 
    echo $this->Html->link('Sign in', 
    array('controller' => 'users', 'action' => 'login'), 
    array('class' => 'btn btn-primary')
);
?>