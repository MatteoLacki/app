<?php
	class UsersController extends AppController {
		
		public $name = 'Users';

		public function beforeFilter() {
			parent::beforeFilter();
			// Permits the uset to use the add operation only before loggin in.
			$this->Auth->allow('add','login','logout');
		}

		public function isAuthorized($user) {
			if ($user['role'] === 'admin') {
				return true;
			}

			if ( in_array($this->action, array('edit', 'delete') ) ) {

				// pass are the passed parameters in the URL.
				if ( $user['id'] != $this->request->params['pass'][0] ) {
					return false;
				}
			}
			//logged-in users still have access to other possibilities.
			return true;
		}

		public function login() {
			if ($this->request->is('post')) {

				//returns whether the login was successful or not, and in the case it succeeds, then we redirect the user to the configured redirection url that we used when adding the AuthComponent to our application
				if ($this->Auth->login()) {
					//This redirects either to the page they weren't alllowed to. redirect works automatically here.
					$this->redirect($this->Auth->redirect());
				} else {
					$this->Session->setFlash(__('Invalid username or password, try again. And then again and yet again thill the Kingdom shall come... No one can pass this!'));
				}	
			}
		}
	

		public function logout(){
			// In the appControl we set where the logout will end up.
			if($this->Auth->user())
    		{
				$this->redirect($this->Auth->logout());
			} else{
				$this->redirect(array('controller'=>'performances','action' => 'index'));
        		$this->Session->setFlash(__('Not logged in'), 'default', array(), 'auth');
			}	
		}


		public function index() {
			$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		}
		
		public function view($id = null) {
			$this->User->id = $id;
			
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			$this->set('user', $this->User->read(null, $id));
		}

		public function add() {
			if ($this->request->is('post')) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again'));
				}
			}
		}

		public function edit($id = null) {
			$this->User->id = $id;
	
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again'));
				}
			} else {
				$this->request->data = $this->User->read(null, $id);
				unset($this->request->data['User']['password']);
			}
		}

		public function delete($id = null) {
			if (!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			if ($this->User->delete()) {
				$this->Session->setFlash(__('User deleted'));
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('User was not deleted'));
		
			$this->redirect(array('action' => 'index'));
		}
/*
		public function delete($id){
	        if ($this->request->is('get')) {
	            throw new MethodNotAllowedException();
	        }

	        if ($this->User->delete($id)) {
	            $this->Session->setFlash('The user with id: ' . $id . ' has been deleted.');
            	$this->redirect(array('action' => 'index'));
        	}
    	}
    	*/ 
	}	

?>