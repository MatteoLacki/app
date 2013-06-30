<div class="performances view">

	<h3>Seans numer <?php echo h($performance['Performance']['id']); ?></h3>
    <table>

        <tr><td>Tytuł wyświetlanego filmu</td>          <td><?php echo $performance['Movie']['title']; ?> </td></tr>
        <tr><td>Czas trwania wyświetlanego filmu</td>   <td><?php echo $performance['Movie']['runtime']; ?> minut</td></tr>
        <tr><td>Przydzielona data seansu</td>           <td><?php echo $performance['Performance']['date']; ?> </td></tr>
        <tr><td>Ustalona cena jednego fotela</td>       <td><?php echo $performance['Performance']['seat_price']; ?> złotych</td></tr>        
        <tr><td>Nazwa przydzielonej sali kinowej</td>   <td><?php echo $performance['Theatre']['name']; ?> </td></tr>
        <tr><td>Informację dodano</td>                  <td><?php echo $performance['Performance']['created']; ?></td></tr>  
        <tr><td>Ostatnia modyfikacja</td>               <td><?php echo $performance['Performance']['modified']; ?></td></tr>

    </table>
</div>
<div class="actions">
	<h3> Działania </h3>
	<ul>
		<li>
			<?php
					echo $this->Html->link(
                        'Wróć do Spisu Seansów', 
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
                        $performance['Performance']['id']
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
                        $performance['Performance']['id']
                    ),
                    array(
                        'confirm'   => 'Czy aby na pewno?'
                    )
                );
            ?>
        </li>
	</ul>
</div>