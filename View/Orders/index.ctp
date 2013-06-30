<h1> Zamówienia </h1>

<?php 
    echo $this->Html->link(
        'Dodaj Zamówienie',
        array( 'controller' => 'orders', 'action' => 'add' )
    ); 
?>
<!-- 
<?php 
    echo print_r($orders)
?>
 -->


<table>
    <tr>
        <th>Id</th><th>User Id</th><th>Tytuł Filmu</th><th>Nazwa Sali</th><th>Zarezerwowano</th><th>Koszt Fotela</th><th>Całkowity Koszt</th><th>Ostatnia Zmiana</th><th>Możliwe akcje</th>
    </tr>

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?php echo $order['Order']['id']; ?></td>
        <td><?php echo $order['User']['id']; ?></td>
        <td><?php echo $order['Performance']['Movie']['title']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    $order['Performance']['Theatre']['name'], 
                    array(
                        'action' => 'view', 
                        $order['Order']['id']
                    )
                );
            ?>
        </td>
        <td>
            <?php 
                $ileMiejsc = $order['Order']['seats_reserved']; 
                if ( $ileMiejsc === 1 ) {
                    echo $ileMiejsc . ' Fotel';
                } elseif ( in_array($ileMiejsc, array( 2,3,4 ) ) ) {
                    echo $ileMiejsc . ' Fotele';
                } else {
                    echo $ileMiejsc . ' Foteli';
                }

            ?> 

        </td>
        <td>
            <?php 
                $seatPrice = $order['Performance']['seat_price']; 
                echo $seatPrice;
            ?> zł</td>
        <td><?php echo $seatPrice*$ileMiejsc; ?> zł</td>
        <td><?php echo $order['Order']['modified']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    'Modyfikuj', 
                    array(
                        'action' => 'edit', 
                        $order['Order']['id']
                    )
                );
            ?>
            <?php 
                echo $this->Form->postLink(
                    'Usuń',
                    array( 
                        'action' => 'delete',
                        $order['Order']['id']
                    ),
                    array(
                        'confirm'   => 'Are you sure?'
                    )
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($order); ?>
</table>
