<div class="theatres view">

	<h3>Sala: <?php echo h($theatre['Theatre']['name']); ?></h3>
	<p><small>Informację Dodano: <?php echo $theatre['Theatre']['created']; ?></small></p>
	<p><small>Informację Zmodyfikowano: <?php echo $theatre['Theatre']['modified']; ?></small></p>
	<p>Liczba Foteli: <?php echo h($theatre['Theatre']['seats']); ?></p>

</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Spis Sal', 
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
                        $theatre['Theatre']['id']
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
                        $theatre['Theatre']['id']
                    ),
                    array(
                        'confirm'   => 'Czy aby na pewno?'
                    )
                );
            ?>
        </li>
	</ul>
</div>