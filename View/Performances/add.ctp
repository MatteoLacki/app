<h1>Dodaj Nowy Seans</h1>
<div class="performances form">

	<?php echo $this->Form->create('Performance'); ?>
	<fieldset>
	<?php

		echo $this->Form->input('movie_id', array('label' => 'Tytuł:'));
		echo $this->Form->input('theatre_id', array('label' => 'Sala Kinowa:'));
		echo $this->Form->input('date', array('label' => 'Data:'));
		echo $this->Form->input('seat_price', array('label' => 'Cena Miejsca na Seansie:'));
	?>
	</fieldset>
	  <!-- to generuje guzik potwierdzenia i zamyka sesję formularza. Opcjonalnie wyrzuca tekst. --> 
	<?php echo $this->Form->end('Zapisz Nowy Seans.'); ?>
</div>