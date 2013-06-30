<h1> Zamówienia </h1>

<?php 
    echo $this->Html->link(
        'Dodaj Zamówienie',
        array( 'controller' => 'orders', 'action' => 'add' )
    ); 
?>

<table>
    <tr>
        <th>Id</th><th>Tytuł Filmu</th><th>Nazwa Sali</th><th>Dodano</th><th>Zmodyfikowano</th><th>Możliwe akcje</th>
    </tr>

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?php echo $order['Order']['id']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    $order['Movie']['title'], 
                    array(
                        'action' => 'view', 
                        $order['Order']['id']
                    )
                );
            ?>
        </td>
        <td><?php echo $order['Theatre']['name']; ?></td>
        <td><?php echo $order['Order']['created']; ?></td>
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