<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!-- 
	<div id="myMenu">
		<div id="leftPart">
			<div class="actions">
					<ul>
						<li>
							<?php
									echo $this->Html->link(
				                        'Sfera Użytkownika', 
				                        array(
				                        	'controller'=> 'users',
				                        	'action' => 'index'
										)
				                    );
							?>
						</li>
			</div>
		</div>
		<div id="rightPart">	
			<div class="actions">
					<li>
						<?php
								echo $this->Html->link(
			                        'Sfera Seansu', 
			                        array(
			                        	'controller'=> 'performances',
			                        	'action' => 'index'
									)
			                    );
						?>
					</li>
				</ul>	
			</div>
		</div>		
	</div>		
	 -->
	<div id="container">
		<div id="header">
<!-- 			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->
			<div class="actions">
					<ul>
						<li>
							<?php
									echo $this->Html->link(
				                        'Sfera Użytkownika', 
				                        array(
				                        	'controller'=> 'users',
				                        	'action' => 'index'
										)
				                    );
							?>
					</li>
					<li>
						<?php
								echo $this->Html->link(
			                        'Sfera Seansu', 
			                        array(
			                        	'controller'=> 'performances',
			                        	'action' => 'index'
									)
			                    );
						?>
					</li>
				</ul>	
			</div>
		</div>
		<div id="content">

				<!-- The logout/login part. -->
 				
			<div style='text-align: right;'>
				<?php if ($logged_in): ?>
					Niech mnie kule biją! Toż to     
					<?php echo $current_user['username'];?>!
					<?php 
						echo $this->Html->link(
							'Chcesz Uciekać?', 
							array(
								'controller'=> 'users',
								'action' 	=> 'logout'
							)
						); 
					?> 
				<?php else: ?>
					<?php 
						echo $this->Html->link(
							'Przedstaw Się', 
							array(
								'controller'=> 'users',
								'action' 	=> 'login '
							)
						); 
					?>
				<?php endif; ?>
			</div>

			<?php echo $this->Session->flash(); ?>
			<!-- This is a flash message that regards authorisation -->
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
<!-- 
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?> -->
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

