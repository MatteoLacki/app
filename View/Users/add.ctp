<!-- app/View/Users/add.ctp -->
<div class="users form">
	<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<legend><?php echo __('Użytkowniku - Poznajmy Się'); ?></legend>

		<?php 
			
			echo $this->Form->input(
				'username',
				array(
					'label' => 'Nazwa Użytkownika'
				)	
			);
			
				//this will be recognized.
			echo $this->Form->input(
				'password',
				array(
					'label' => 'Hasło'
				)	
			);
			
			echo $this->Form->input(
				'password_confirmation', 
				array(
					'type' => 'password',
					'label' => 'Potwierdź Hasło'
				)
			);

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

		?>
	</fieldset>

	<?php echo $this->Form->end(__('Zakończ Rejestrację')); ?>
</div>
