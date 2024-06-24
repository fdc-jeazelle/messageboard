<h1>Login Page</h1>


<?php 
    echo $this->Form->create('User');
    echo $this->Form->input('email');
    echo $this->Form->input('password'); // Specify type as password
    echo $this->Form->end('Login');
    

?>

<h3>No account yet?</h3> <?php 
    echo $this->Html->link('Register', 
    array('controller' => 'registers', 'action' => 'register'), 
    array('class' => 'btn btn-primary')
);
?>