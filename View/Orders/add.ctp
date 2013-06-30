<h1>Dodanie Nowego Zamówienia</h1>
<div class="orders form">

	<?php echo $this->Form->create('Order'); ?>
	<fieldset>
	<?php
		/*echo $this->Form->input('performance_id', array('label' => 'Numer Zamówienia:'));*/
		echo $this->Form->input('seats_reserved', array('label' => 'Liczba foteli, którą chcę zarezerwować, to: '));
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
                        'Wróć do Spisu Zamówień', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
	</ul>
</div>