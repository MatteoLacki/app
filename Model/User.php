<?php
	// Thanks to naming the object Post there will be an automatic link
	// with the posts table in the database and with the PostsController.

/*var $name = 'User';*/

/*App::uses('AuthComponent', 'Controller/Component');*/

class User extends AppModel {

	/*public $hasMany = 'Post';*/

/*	public $hasMany = array(
		'isAuthoringMany' 	=> array(
			'className' 	=> 'Post'
		)
	);
*/
	public $name= 'User';

	public $validate = array(
        'username' 	=> array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message' 	=> 'A username is required'
			)
		),

		'password' 	=> array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Please enter your password.'
			),

			'Match passwords' => array(
				'rule' 	=> 'matchPasswords',
				'message'=> 'Your passwords do not match.'
			)
		),

		'password_confirmation' => array(
			'required' 	=> array(
				'rule' 		=> array('notEmpty'),
				'message'	=> 'Please confirm your password.'
			)
		),

		'role'	=> array(
			'valid' => array(
				'rule' => array(
					'inList', 
					array(
						'admin',
						'author'
					)
				),
				'message'	=> 'Please enter a valid role',
				'allowEmpty' => false
			)
		)
    );

/*    public function matchPasswords( $data ) {
    	//Checks passwords equals password confrimation.
    	if ($data['password'] === $this->data['User']['password_confirmation'] ) {

    		return true;
    	} 
    	$this->invalidate(
    		'password_confirmation', 
    		'Your passwords do not match.'
    	);
    	return false;
    }

    public function beforeSave($options = array() ) {
    		//Checks if the password is set. If it's not there, we cannot hash it.
    	if (isset($this->data[$this->alias]['password'])) {
    			// Here we rewrite the password s.t. the hash resigns the old one.
    		$this->data[$this->alias]['password'] = 
    			AuthComponent::password(
    				$this->data[$this->alias]['password']
    			);
    	}
    		// This will consent the change of password. 
    	return true;
    }
*/

} 

?>
