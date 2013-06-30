<!-- 
<?php 
    if ($logged['customer']) {
        echo $this->Html->link(
            'Dodaj Użytkownika',
            array(
                'controller' => 'users', 
                'action' => 'add')
        );    
    }
?>
 -->
<?php if ($logged['adminOrCashier']): ?>
<h3>Użytkownicy Kina - Łączcie Się!</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Nazwa Użytkownika</th>
            <th>Rola w Systemie</th>
            <th>Możliwe Akcje</th>
            <th>Utworzono</th>
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
                <?php if( $current_user['id'] === $user['User']['id'] || $logged['admin'] ): ?>    
                    <?php 
                        echo $this->Html->link(
                            'Zmień', 
                            array(
                                'action' => 'edit', 
                                $user['User']['id']
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Form->postLink(
                            'Usuń',
                            array( 
                                'action' => 'delete',
                                $user['User']['id']
                            ),
                            array(
                                'confirm'   => 'Are you sure?'
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
<?php elseif ($logged['customer']): ;?>
    <div class="performances view">
        <h3>Użytkowniku!</h3>
        <ul>
            <li>Znamy Cię!</li>
            <li>Lubimy Cię!</li>
            <li>Wierzymy w Ciebię!</li>
            <li>Jesteś Nam Potrzebny!</li>
            <li>Nikt Inny!</li>            
        </ul>    

    </div> 
    <div class="actions">
        <h3> Działania </h3>
        <ul>
            <li>
                <?php
                    echo $this->Html->link(
                        'Repertuar', 
                        array(
                            'controller'    => 'performances',
                            'action'        => 'index'
                        )
                    );
                ?>
            </li>
            <li>
                <?php
                    echo $this->Form->postLink(
                        'Twoje Zamówienia', 
                        array(
                            'controller'    => 'orders',
                            'action'        => 'index'
                        )
                    );
                ?>
            </li>
        </ul>
    </div>    
<?php else:?> 
    <div class="performances view">
        <h3>Drogi Przyszły Użytkowniku!</h3>
        Kimkolwiek jesteś - zdecydowanie czekałeś za długą na tę piękną aplikację. Tym bardziej obsługa naszego Kina jest szczęśliwa z możliwości powitania Cię na naszym pokładzie. Możesz zapisać się do naszego Kina wciskając guzik po lewej stronie. Jeżeli jednak już jesteś naszym użytkownikiem, to przedstaw się.
    </div> 
    <div class="actions">
        <h3> Działania </h3>
        <ul>
            <li>
                <?php
                    echo $this->Html->link(
                        'Zapisz Się do Naszego Kina', 
                        array(
                            'action' => 'add'
                        )
                    );
                ?>
            </li>
        </ul>
    </div>
<?php endif;?>