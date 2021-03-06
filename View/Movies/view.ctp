<div class="movies view">

	<h3><?php echo h($movie['Movie']['title']); ?></h3>

	<p><small>Rok produkcji: 	<?php echo $movie['Movie']['year']; ?></small></p>
	<p><small>Reżyseria:	 	<?php echo $movie['Movie']['register']; ?></small></p>
	<p><small>Minuty: 			<?php echo $movie['Movie']['runtime']; ?></small></p> 

	<p><?php echo h($movie['Movie']['description']); ?></p>

</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Spis Filmów', 
                        array(
                        	'action' => 'index'
						)
                    );
			?>
		</li>
		<li>
            <?php 
                echo $this->Html->link(
                    'Modyfikuj', 
                    array(
                        'action' => 'edit', 
                        $movie['Movie']['id']
                    )
                );
            ?>
        </li>       
        <li>
            <?php 
                echo $this->Form->postLink(
                    'Usuń',
                    array( 
                        'action' => 'delete',
                        $movie['Movie']['id']
                    ),
                    array(
                        'confirm'   => 'Czy aby na pewno?'
                    )
                );
            ?>
        </li>
	</ul>
</div>