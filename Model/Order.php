<?php
class Order extends AppModel {
	
	public $name = 'Order';

	public $belongsTo = array(
		'User',
		'Performance' 
	);

/*	public $virtualFields = array(
		'the_sum' => 'SUM(Order.seats_reserved)'
	);*/

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


	public function totalSeats() {

		$summant = $this->find(
		    'first',
		    array(
		        'fields'=>array('SUM(Order.seats_reserved) AS banana'),
		    )
		);
		$summant = $summant[0]['banana'];

		return $summant;
	}

	public function totalSeats2( $theatreId ) {
		
		$sql = 
			"	SELECT 	sum(seats_reserved) AS seatSum 
				FROM 	orders 
				JOIN 	performances
					ON 		orders.performance_id 	= performances.id
					WHERE 	performances.theatre_id = ".$theatreId."
					;
			";

		$result = $this->query($sql);
		$result = $result[0][0]['seatSum'];

		if ($result === NULL) {
			return(0);
		} else {
			return($result);
		}
	}

	
}
?>