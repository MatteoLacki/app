<?php
class OrdersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');

    public function index() {
            //To wyeksportuje do View wypis (array)


        if ( $this->Auth->loggedIn() ) {
                // To wywołuje bardzo obszerne przeszukanie bazy danych.        
            $this->Order->recursive = 2;
            
            $whoAmI = $this->Auth->user('role');
    
            switch ($whoAmI) {
                case 'admin':
                case 'cashier':
                    $this->set('orders', $this->Order->find('all'));
                    $this->set('totalSeats', $this->Order->totalSeats2(2)); 
                    /*$this->set('informacja', $this->Order->totalSeats2(2));                */
                    /*
                    $this->set('seatsWow', $this->Order->Performance->totalSeats2(2));                */
                    break;
    
                case 'customer':
                    $this->set('orders', $this->Order->findAllByUserId($this->Auth->user('id')));        
                    break;
            }
        }
  /*      $this->set('orders', $this->Order->find('all'));      */
    }

/*    public function user_index() {   
        $this->Order->recursive = 2;
        $this->set('orders', $this->Order->findAllByUserId($this->Auth->user('id')));
    }
*/

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Nie podano numeru zamówienia.'));
        }

        $order = $this->Order->findById($id);
        if (!$order) {
            throw new NotFoundException(__('Nie ma zamówienia o takim numerze.'));
        }

        $this->set('order', $order);
    }


    public function add($performanceId) {

        if ($this->request->is('post')) {
                // To uzupełnia pobranie informacji (czyli array data) od dodatkowe informacje.
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $this->request->data['Order']['performance_id'] = $performanceId;

            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash('Zamówienie zostało zapisane.');
                $this->redirect(array('action' => 'index'));
            }           
        }

        $performances = $this->Order->Performance->find('list');
        $this->set('performances', $performances );

        $performances2 = $this->Order->Performance->find('all');
        $this->set('performances2', $performances2 );

        $movies = $this->Order->Performance->Movie->find('list');
        $this->set('movies', $movies );

        $users = $this->Order->User->find('list');
        $this->set('users', $users );
    }

    public function delete($id){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Order->delete($id)) {
            $this->Session->setFlash('Zamówienie o numerze: ' . $id . ' zostało zlikwidowane.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function edit($id = null) {
         if (!$id) {
            throw new NotFoundException(__('Nie obrano identyfikatora zamówienia.'));
        }   
        
        $order = $this->Order->findById($id);

        if (!$order) {
            throw new NotFoundException(__('Obrano identyfikator spoza bazy danych.'));
        }
   
        $seatsOccupied      = $this->Order->totalSeats2($id);
        $theatreHasSeats    = $this->Order->theatreSeatsNo($id);

        $this->set('seatsOccupied', $seatsOccupied);   
        $this->set('reserving', $order['Order']['seats_reserved']);
        $this->set('orderInfo', $theatreHasSeats);  
        $this->set('noOverfill', $theatreHasSeats >= $seatsOccupied + $order['Order']['seats_reserved']);


        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Order->id = $id;
            $this->Session->setFlash('Dorsz!');
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash('Modyfikacja Zamówienia Została Wykonana');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Modyfikacja Zamówienia Zakończona Sromotną Porażką');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $order;
        }
    }

    public function isAuthorized($user) {

        if (isset($user['role']) && $user['role'] === 'customer') {

            if ( in_array($this->action, array('add', 'edit', 'delete') ) ) {
                return true;
            }    
        }
            //Ostatnia instancja autoryzacji - klasa matka
        return parent::isAuthorized($user);
    }


}

?>