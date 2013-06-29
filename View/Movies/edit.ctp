<h1>Zmień Szczegóły Filmu</h1>
<fieldset>
<?php
	echo $this->Form->create('Movie');

	echo $this->Form->input('title', array('label' => 'Tytuł'));
	echo $this->Form->input('runtime', array('label' => 'Czas Trwania w Minutach'));
	echo $this->Form->input('register', array('label' => 'Reżyseria'));
	echo $this->Form->input('year', array('label' => 'Rok produkcji'));		
	echo $this->Form->input('description', array('label' => 'Opis'));

    echo $this->Form->end('Save Movie');
?>
</fieldset>  
