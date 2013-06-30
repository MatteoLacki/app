
<h2>Przedpokój</h2>
<div class="users form">

	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<legend>
			<?php echo __('Proszę Się Przedstawić'); ?>
		</legend>
		
		<?php 
			echo $this->Form->input('username', array('label' => 'Nazwa Użytkownika'));
			echo $this->Form->input('password', array('label' => 'Hasło'));
		?>
	</fieldset>

	<?php echo $this->Form->end(__('Śmiały Krok Wprzód!')); ?>

</div>