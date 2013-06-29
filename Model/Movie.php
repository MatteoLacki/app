<?php

class Movie extends AppModel {

	public $hasMany = 'Performance';
	 
    public $validate = array(
        'title' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj tytuł filmu'
			)	
		),

        
        'runtime' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj czas trwania filmu w minutach'
			)
		),

		'description' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Opisz film'
			)	
		),	

		'register' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj reżysera filmu'
			)
		),

		'year' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj rok produkcji'
			)
		)	

    );


}

?>