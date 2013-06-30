<h1>Zmieniamy Się!</h1>

<div class="performances form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>	
		<?php
		    echo $this->Form->input('username', array('label' => 'Nazwa Użytkownika'));
		    echo $this->Form->input('password', array('label' => 'Hasło'));
		    echo $this->Form->input('password_confirmation', 
				array(
					'type' => 'password',
					'label' => 'Potwierdź Hasło'
				)
			);
/*		    echo $this->Form->input('id', array('type' => 'hidden'));*/
	
		    if ($logged['admin']) {
			    echo $this->Form->input(
					'role', 
					array(
						'options' => array(
							'admin' 	=> 'Administrator', 
							'cashier' 	=> 'Kasjer',
							'customer' 	=> 'Klient'
						),
						'label' => 'Sort Petenta'
					)
				);	
			}
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