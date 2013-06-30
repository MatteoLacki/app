<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */ 
class AppController extends Controller {

	//Because I added the DebugKit, I did override the usual Controller, which
	// obviously has the component Session.
	public $components = array(
	    'DebugKit.Toolbar',
	    'Session',
	    'Auth'	=> array(
	    	'loginRedirect'	=> array(
	    		'controller' 	=> 'performances',
	    		'action'		=> 'index'
	    	),
	    	'logoutRedirect'=> array(
	    		'controller' 	=> 'performances',
	    		'action'		=> 'index'	    		
	    	),
	    	'authError'		=>'Nie Posiadasz Odpowiednich Uprawnień',
	    	'authorize'		=> array('Controller')
	    )
	);

public function beforeFilter(){
		//  tells the AuthComponent to not require a login for all index and view actions, in every controller. We want our visitors to be able to read and list the entries without registering in the site.

		// Simply these fields can be seen without authentification. Simple.
	// This works for any controller.
		$this->Auth->allow('index', 'view');
		$this->set('logged_in', $this->Auth->loggedIn());

		$current_user = $this->Auth->user();
		
		$this->set('current_user', $current_user);

		$anyone   = isset($current_user['id']);
		$noone    = !$anyone;
		$admin    = false;
		$cashier  = false;
		$customer = false;

		if ( $anyone ) {

		    switch ($current_user['role']) {
		        case 'admin':
		            $admin    = true;
		            break;
		        
		        case 'cashier':
		            $cashier  = true;    
		            break;

		        case 'customer':
		            $customer = true;    
		            break;
		    }
		}

		$adminOrCashier = $admin || $cashier;

		$logged = array(
			'anyone' 	=> $anyone,
			'noone'		=> $noone,
			'admin'		=> $admin,
			'cashier'	=> $cashier,
			'customer'	=> $customer,
			'adminOrCashier'=> $adminOrCashier
		);		

		$this->set('logged', $logged);

	}

	public function isAuthorized($user) {
			// Jeśli mamy admina, to jemu wolno wszystko.
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
			// A jak nie, to z reguły nic nie wolno. To będzie nadpisywane przez odziedziczone kontrolery.
		return false;
	}
}