<h1> Filmy </h1>

<!--  This adds a "Add Movie" button  -->
<?php 
    echo $this->Html->link(
        'Dodaj Film',
        array( 'controller' => 'movies', 'action' => 'add' )
    ); 
?>

<table>
    <tr>
        <th>Id</th><th>Tytuł</th><th>Minuty</th><th>Dodano</th><th>Zmodyfikowano</th><th>Możliwe akcje</th>
    </tr>

    <?php foreach ($movies as $movie): ?>
    <tr>
        <td><?php echo $movie['Movie']['id']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    $movie['Movie']['title'],
                    array(
                        'controller' => 'movies', 
                        'action' => 'view', 
                        $movie['Movie']['id']
                    )
                ); 
            ?>
        </td>
        <td>
            <?php 
                echo $this->Html->link(
                    $movie['Movie']['runtime'],
                    array(
                        'controller' => 'movies', 
                        'action' => 'view', 
                        $movie['Movie']['id']
                    )
                ); 
            ?>
        </td> 
        <td><?php echo $movie['Movie']['created']; ?></td>
        <td><?php echo $movie['Movie']['modified']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    'Modyfikuj', 
                    array(
                        'action' => 'edit', 
                        $movie['Movie']['id']
                    )
                );
            ?>
            <?php 
                echo $this->Form->postLink(
                    'Usuń',
                    array( 
                        'action' => 'delete',
                        $movie['Movie']['id']
                    ),
                    array(
                        'confirm'   => 'Are you sure?'
                    )
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($movie); ?>
</table>