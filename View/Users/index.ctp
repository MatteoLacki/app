<h3>Użytkownicy Kina - Łączcie Się!</h3>

<?php echo $this->Html->link(
    'Dodaj Użytkownika',
    array('controller' => 'users', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Rola w Systemie</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $users array, printing out user info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <!-- The title will give the string that will be linked with other page -->
            <?php 
                echo $this->Html->link(
                    $user['User']['username'],
                    array(
                        'controller' => 'users', 
                        'action' => 'view', 
                        $user['User']['id']
                    )
                ); 
            ?>
        </td>
        <td><?php echo $user['User']['role']; ?></td>
        <td>
            <?php if( $current_user['id'] === $user['User']['id'] || $current_user['role'] === 'admin' ): ?>    
                <?php 
                    echo $this->Form->postLink(
                        'Delete',
                        array( 
                            'action' => 'delete',
                            $user['User']['id']
                        ),
                        array(
                            'confirm'   => 'Are you sure?'
                        )
                    );
                ?>
                <?php 
                    echo $this->Html->link(
                        'Edit', 
                        array(
                            'action' => 'edit', 
                            $user['User']['id']
                        )
                    );
                ?>
            <?php else: ?>
                No actions avaiable.
            <?php endif; ?>    
        </td>
        <td><?php echo $user['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>