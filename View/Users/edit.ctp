<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit User</h1>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save User');
 ?>   
 <h2>Trying to manipulate it all, aren't we? Sneaky we are.</h2>