<h3> Zaplanowane Seanse </h3>
<!-- $logged zostaje przekazane globalnie w beforeFilter w AppController  -->
<table>
    <tr>
        <th>Id</th>
        <th>Tytuł Filmu</th>
        <th>Nazwa Sali</th>
        <th>Termin Projekcji</th>
        <th>Cena Biletu</th>
        <?php if ($logged['adminOrCashier']):?>
            <th>Dodano</th><th>Zmodyfikowano</th>
        <?php endif;?>
        <th>Możliwe akcje</th>
    </tr>

    <?php foreach ($performances as $performance): ?>
    <tr>
        <td><?php echo $performance['Performance']['id']; ?></td>
        <td>
            <?php 
                echo $this->Html->link(
                    $performance['Movie']['title'], 
                    array(
                        'action' => 'view', 
                        $performance['Performance']['id']
                    )
                );
            ?>
        </td>
        <td><?php echo $performance['Theatre']['name']; ?></td>
        <td><?php echo $performance['Performance']['date']; ?></td>
        <td><?php echo $performance['Performance']['seat_price']; ?> zł</td>

        <?php if ($logged['adminOrCashier']):?>
            <td><?php echo $performance['Performance']['created']; ?></td>
            <td><?php echo $performance['Performance']['modified']; ?></td>
        <?php endif;?>    
        <td>
            <?php if ($logged['adminOrCashier']):?>
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
                            'confirm'   => 'Na pewno usunąć cały seans?'
                        )
                    );
                ?>
            <?php endif;?>    
            <?php if( $logged['customer'] || $logged['admin'] ) :?>                   
                <?php 
                    echo $this->Form->postLink(
                        'Zamów Bilety',
                        array( 
                            'action' => 'buy',
                            $performance['Performance']['id']
                        )
                    );
                ?>
            
            <?php elseif( $logged['noone'] ) :?>                   
                <?php 
                    echo $this->Html->link(
                        'Najpierw się przedstaw.', 
                        array(
                            'controller'=> 'users',
                            'action'    => 'login '
                        )
                    ); 
                ?>
            <?php endif;?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($performance); ?>
</table>