<h1>Dodaj Nową Salę</h1>
<div class="theatres form">

	<?php echo $this->Form->create('Theatre'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name', array('label' => 'Nazwa Sali'));
		echo $this->Form->input('seats', array('label' => 'Ilość Foteli'));
	?>
	</fieldset>
	<?php echo $this->Form->end('Zapisz Nową Salę.'); ?>
</div>
		
