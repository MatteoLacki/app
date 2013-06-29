 <!-- File: /app/View/users/index.ctp -->

<h1>Blog users</h1>


<!--  This adds a "Add user" button  -->
<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>password</th>
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
        <td><?php echo $user['User']['password']; ?></td>
        <td>
            <?php if( $current_user['id'] === $user['User']['id'] || $current_user['role'] === 'admin' ): ?>    
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