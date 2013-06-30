<h1>Zmieniamy Się!</h1>

<div class="performances form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>	
		<?php
		    echo $this->Form->input('username', array('label' => 'Nazwa Użytkownika'));
		    echo $this->Form->input('password', array('label' => 'Hasło'));
		    echo $this->Form->input('id', array('type' => 'hidden'));
		 ?>   
	</fieldset>	
	<?php echo $this->Form->end('Zmieńmy Obliczę!'); ?>	 
</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Wróć do Spisu Użytkowników', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
	</ul>
</div>