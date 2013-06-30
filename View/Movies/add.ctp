<h1>Dodaj Nowy Film</h1>
<div class="movies form">

	<?php echo $this->Form->create('Movie'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('title', array('label' => 'Tytuł'));
		echo $this->Form->input('runtime', array('label' => 'Czas Trwania w Minutach'));
		echo $this->Form->input('register', array('label' => 'Reżyseria'));
		echo $this->Form->input('year', array('label' => 'Rok produkcji'));		
		echo $this->Form->input('description', array('label' => 'Opis'));
	?>
	</fieldset>
	  <!-- to generuje guzik potwierdzenia i zamyka sesję formularza. Opcjonalnie wyrzuca tekst. --> 
	<?php echo $this->Form->end('Zapisz nowy film'); ?>
</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Wróć do Spisu Filmów', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
	</ul>
</div>		
