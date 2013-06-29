
<h2>Login Screen</h2>
<div class="users form">

	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<legend>
			<?php echo __('Please enter your username and password or prepare to get laid.'); ?>
		</legend>
		
		<?php 
			echo $this->Form->input('username');
			echo $this->Form->input('password');
		?>
	</fieldset>

	<?php echo $this->Form->end(__('Login')); ?>

</div>