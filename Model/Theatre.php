<?php

class Theatre extends AppModel {

	public $hasMany = 'Performance';	
	 
    public $validate = array(
        'name' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj tytuł filmu'
			)	
		),
        
        'seats' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Podaj czas trwania filmu w minutach'
			)
		)
    );

}

?>