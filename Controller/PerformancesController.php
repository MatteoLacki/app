<?php
class PerformancesController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');

    public function index() {
            
            //To wyeksportuje do View wypis (array)
        $this->set('performances', $this->Performance->find('all'));
    }


    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Nie podano numeru seansu.'));
        }

        $performance = $this->Performance->findById($id);
        if (!$performance) {
            throw new NotFoundException(__('Nie ma seansu o takim numerze.'));
        }

        $this->set('performance', $performance);
    }


    public function add() {
        if ($this->request->is('post')) {
            //The user() function returns any column from the currently logged in user.
            /*$this->request->data['Performance']['user_id'] = $this->Auth->user('id');*/

            if ($this->Performance->save($this->request->data)) {
                $this->Session->setFlash('Seans został zapisany.');
                $this->redirect(array('action' => 'index'));
            }           
        }

        $movies = $this->Performance->Movie->find('list');
        $this->set('movies', $movies );

        $theatres = $this->Performance->Theatre->find('list');
        $this->set('theatres', $theatres );
    }

    public function delete($id){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Performance->delete($id)) {
            $this->Session->setFlash('Seans o numerze: ' . $id . ' został zlikwidowany.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Nie obrano identyfikatora seansu.'));
        }

        $performance = $this->Performance->findById($id);
        if (!$performance) {
            throw new NotFoundException(__('Obrano identyfikator spoza zbioru istniejących wartości.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Performance->id = $id;
            if ($this->Performance->save($this->request->data)) {
                $this->Session->setFlash('Modyfikacja Seansu Została Wykonana');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Modyfikacja Seansu Zakończona Sromotną Porażką');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $performance;
        }
    }

    public function buy($id) {
            // Przekierowanie do kreowania zakupów.
        $this->redirect(array('controller' => 'orders', 'action' => 'add', $id));
    }

}

?>