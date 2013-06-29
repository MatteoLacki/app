<!-- File: /app/View/Users/view.ctp -->

<div class="users view">
	<h1><?php echo h($user['User']['username']); ?></h1>
	<p>
		<small>
			Created: 
			<?php echo $user['User']['created']; ?>
		</small>
	</p>
	<p>
		<small>
			Modified: 
			<?php echo $user['User']['modified']; ?>
		</small>
	</p>
	<p>
		<?php echo h($user['User']['role']); ?>
	</p>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'List Users', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
		<li>
			<?php if( $current_user['id'] === $user['User']['id'] || $current_user['role'] === 'admin' ) :?>  
                <?php 
                    echo $this->Html->link(
                        'Edit', 
                        array(
                            'action' => 'edit', 
                            $user['User']['id']
                        )
                    );
                ?>
                <?php 
                    // postLink creates a link that uses Javascript to do a user request deleting our user
                    // postLink is a fucking function!
                    echo $this->Form->postLink(
                        'Delete',
                        array( 
                            'action' => 'delete',
                            $user['User']['id']
                        ),
                        // FormHelper prompts the user with a JavaScript confirmation dialog
                        array(
                            'confirm'   => 'Are you sure?'
                        )
                    );
                ?>
            <?php else: ?>
                Log in for more actions. 
            <?php endif; ?>
        </li>
	</ul>
</div>