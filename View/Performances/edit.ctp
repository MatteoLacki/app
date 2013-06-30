<h1>Zmiana Szczegółów Seansu</h1>
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
	<?php echo $this->Form->end('Zapisz Nowy Seans.'); ?>
</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Wróć do Spisu Seansów', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
	</ul>
</div>		