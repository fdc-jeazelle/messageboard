

<?php 
    
    echo $this->Html->link('Go to homepage', 
    array('controller' => 'users', 'action' => 'index'), 
    array('class' => 'btn btn-primary')
);
?>