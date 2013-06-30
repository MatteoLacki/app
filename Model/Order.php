<?php
class Order extends AppModel {
	
	public $name = 'Order';

	public $belongsTo = array(
		'User',
		'Performance' 
	);

	public $validate = array(
        'seats_reserved'=> array(
			'required' 		=> array(
				'rule' 		=> array('notEmpty'),
				'message' 	=> 'Koniecznie podaj informację o tym, jak dużo biletów potrzebujesz.'
			)
		),
        'accepted'=> array(
			'required' 		=> array(
				'rule' 		=> array('notEmpty'),
				'message' 	=> 'Zważ na konieczność zaznaczenia tego, czy dane zamówienie zostałe już przyjęte.'
			)
		),

    );



}
?>