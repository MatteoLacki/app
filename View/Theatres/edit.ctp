<h1>Zmień Szczegóły Sali</h1>
<fieldset>
<?php
	echo $this->Form->create('Theatre');

	echo $this->Form->input('name', array('label' => 'Nazwa Sali'));
	echo $this->Form->input('seats', array('label' => 'Ilość Foteli'));

    echo $this->Form->end('Save Theatre');
?>
</fieldset>  
