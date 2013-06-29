<h1> Dostępne Sale Kinowe </h1>

<!--  This adds a "Add Theatre" button  -->
<?php 
    echo $this->Html->link(
        'Dodaj Salę',
        array( 'controller' => 'theatres', 'action' => 'add' )
    ); 
?>

<table>
    <tr>
        <th>Id</th><th>Nazwa</th><th>Ilość Foteli</th><th>Dodano</th><th>Zmodyfikowano</th><th>Możliwe akcje</th>
    </tr>

    <?php foreach ($theatres as $theatre): ?>
    <tr>
        <td><?php echo $theatre['Theatre']['id']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    $theatre['Theatre']['name'],
                    array(
                        'controller' => 'theatres', 
                        'action' => 'view', 
                        $theatre['Theatre']['id']
                    )
                ); 
            ?>
        </td>
        <td>
            <?php 
                echo $this->Html->link(
                    $theatre['Theatre']['seats'],
                    array(
                        'controller' => 'theatres', 
                        'action' => 'view', 
                        $theatre['Theatre']['id']
                    )
                ); 
            ?>
        </td> 
        <td><?php echo $theatre['Theatre']['created']; ?></td>
        <td><?php echo $theatre['Theatre']['modified']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    'Modyfikuj', 
                    array(
                        'action' => 'edit', 
                        $theatre['Theatre']['id']
                    )
                );
            ?>
            <?php 
                echo $this->Form->postLink(
                    'Usuń',
                    array( 
                        'action' => 'delete',
                        $theatre['Theatre']['id']
                    ),
                    array(
                        'confirm'   => 'Are you sure?'
                    )
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($theatre); ?>
</table>