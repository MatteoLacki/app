<?php
class Performance extends AppModel {
	
	public $name = 'Performance';

/*	public $belongsTo = 'Theatre';*/
	public $belongsTo = array(
		'Theatre' ,
		'Movie' 
	);

	public $validate = array(
        'seat_price' 	=> array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message' 	=> 'Podaj cenę biletów na seans'
			)
		)
    );



}
?>