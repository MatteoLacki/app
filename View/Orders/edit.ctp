<h1>Zmień Szczegóły Zamówienia</h1>
<div class="orders form">

<!-- 	<?php print_r($comparison); ?> -->
	<?php echo $this->Form->create('Order'); ?>
	<fieldset>

	<?php
		if ($logged['adminOrCashier'] && $noOverfill):
			echo $this->Form->input('accepted', array('label' => 'ZAAKCEPTUJ ZAMÓWIENIE'));
		elseif ($logged['customer']):
			echo $this->Form->input('seats_reserved', array('label' => 'ZAAKCEPTUJ ZAMÓWIENIE'));
		else:
			echo 'Nie można potwierdzić zamówienia - zarezerwowanoby o '.($comparison['seatsReserved'] + $comparison['acceptedSeatsNo'] - $comparison['seatsInTheatre'] ).' miejsca za dużo.' ;
		endif;
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