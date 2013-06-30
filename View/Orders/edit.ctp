<h1>Zmień Szczegóły Zamówienia</h1>
<div class="orders form">

	<?php echo $this->Form->create('Order'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('seat_price', array('label' => 'Cena Miejsca na Seansie:'));
	?>
	</fieldset>
	<?php echo $this->Form->end('Zapisz Zmiany w Szczegółach Zamówienia'); ?>
</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Wróć do Spisu Zamówienia', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
	</ul>
</div>		