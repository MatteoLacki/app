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
			)/*,
			'No Overfill'	=> array(
				'rule'		=> 'noOverfill',
				'message'	=> 'Nie No Panie - Ludzie To Się W Kinie Nie Zmieszczą!'
			)*/
		),

    );
/*

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
*/
/*	public function totalSeats2( $theatreId ) {

		$sql = 
		   "SELECT 	sum(seats_reserved) AS seatSum 
			FROM 	orders 
			JOIN 	performances
				ON 		orders.performance_id 	= performances.id
			WHERE 	performances.theatre_id = ".$theatreId. ";
			";

		$result = $this->query($sql);
		$result = $result[0][0]['seatSum'];

		if ($result === NULL) {
			return(0);
		} else {
			return($result);
		}
	}
*/
	public function seatsComparison( $id, $theatre_id, $wantedSeats) {
		
		$findingAllAccepted = 
		   "SELECT SUM( seats_reserved ) AS seatSum
			FROM orders AS o
			JOIN performances AS p 
				ON o.performance_id = p.id
			WHERE o.accepted =1 AND p.theatre_id =".$theatre_id.";
			";

		$acceptedSeatsNo = $this->query($findingAllAccepted);
		$acceptedSeatsNo = $acceptedSeatsNo[0][0]['seatSum'];

		if ($acceptedSeatsNo === NULL) {
			$acceptedSeatsNo = 0;
		}
/*
		$sql = "SELECT 	seats, seats_reserved
				FROM 	theatres AS t
				JOIN (
					SELECT 	o.id, o.seats_reserved, p.theatre_id 	
					FROM 	orders AS o
					JOIN 	performances AS p 
						ON 	o.performance_id = p.id
					WHERE 	o.id =".$id."
				) 	AS tmp 
					ON tmp.theatre_id = t.id";
*/

		$sql = "SELECT 	t.seats
				FROM 	orders 			AS o
				JOIN	performances 	AS p 	ON 	o.performance_id = p.id
				JOIN	theatres		AS t	ON 	t.id = ".$theatre_id."
				WHERE 	o.id =".$id.";";

		$result = $this->query($sql);
		$seatsInTheatre = $result[0]['t']['seats'];
		$seatsReserved  = $wantedSeats;

		if ($seatsInTheatre === NULL) {
			$seatsInTheatre = 0;
		} 
		if ($seatsReserved === NULL) {
			$seatsReserved = 0;
		}  

		$canReserve = ( $seatsReserved + $acceptedSeatsNo <= $seatsInTheatre );

		$result = array( 
			'seatsInTheatre'	=> $seatsInTheatre, 
			'seatsReserved'		=> $seatsReserved, 
			'acceptedSeatsNo'	=> $acceptedSeatsNo,
			'canReserve'		=> $canReserve 
		);

		return $result;
	}


/*
	public function theatreSeatsNo( $id ) {
		
		$sql = 
			"	SELECT 	seats 
				FROM 	
					(	select 	theatre_id
						FROM 	orders as o
						JOIN 	performances as p
						ON 		o.performance_id 	= p.id	
						WHERE 	o.accepted = TRUE AND o.id = ".$id." ) as tmp
					JOIN 	theatres as t
					ON 		t.id = tmp.theatre_id	
					;
			";

		$result = $this->query($sql);
		$result = $result[0]['t']['seats'];

		if ($result === NULL) {
			return(0);
		} else {
			return($result);
		}

		return $result;
	}
*/

/*	public function testingTheatre() {
		return $this->Order->Performance->Theatre->testingTheatre2( 3 );


	}
*/
/*
	public function noOverfill( $data ) {

		if ($data['theatre_id'] === )

		return false;
	}
*/
}
?>