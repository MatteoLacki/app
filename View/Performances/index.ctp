<h1> Seanse </h1>

<?php 
    echo $this->Html->link(
        'Dodaj Seans',
        array( 'controller' => 'performances', 'action' => 'add' )
    ); 
?>

<table>
    <tr>
        <th>Id</th><th>Tytuł Filmu</th><th>Nazwa Sali</th><th>Dodano</th><th>Zmodyfikowano</th><th>Możliwe akcje</th>
    </tr>

    <?php foreach ($performances as $performance): ?>
    <tr>
        <td><?php echo $performance['Performance']['id']; ?></td>
        <td><?php echo $performance['Movie']['title']; ?></td>
        <td><?php echo $performance['Theatre']['name']; ?></td>
        <td><?php echo $performance['Performance']['created']; ?></td>
        <td><?php echo $performance['Performance']['modified']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    'Modyfikuj', 
                    array(
                        'action' => 'edit', 
                        $performance['Performance']['id']
                    )
                );
            ?>
            <?php 
                echo $this->Form->postLink(
                    'Usuń',
                    array( 
                        'action' => 'delete',
                        $performance['Performance']['id']
                    ),
                    array(
                        'confirm'   => 'Are you sure?'
                    )
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($performance); ?>
</table>