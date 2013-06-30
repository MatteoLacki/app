<?php
class OrdersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');

    public function index() {
            //To wyeksportuje do View wypis (array)
        $this->set('orders', $this->Order->find('all'));
    }


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


    public function add($id) {

        if ($this->request->is('post')) {
                // To uzupełnia pobranie informacji (czyli array data) od dodatkowe informacje.
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $this->request->data['Order']['performance_id'] = $id;

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
            throw new NotFoundException(__('Obrano identyfikator spoza zbioru istniejących wartości.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Order->id = $id;
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


}

?>