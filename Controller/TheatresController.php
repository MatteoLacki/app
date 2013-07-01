<?php
class TheatresController extends AppController {

    public $name = 'Theatres';

    public $helpers = array('Html', 'Form', 'Session');

    public function index() {
            //To wyeksportuje do View wypis (array)
        $this->set('theatres', $this->Theatre->find('all'));
    }


    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Nie podano numeru sali.'));
        }

        $theatre = $this->Theatre->findById($id);
        if (!$theatre) {
            throw new NotFoundException(__('Nie ma sali o takim numerze.'));
        }

        $this->set('theatre', $theatre);
    }


    public function add() {
        if ($this->request->is('post')) {
            $this->Theatre->create();

            if ($this->Theatre->save($this->request->data)) {
                $this->Session->setFlash(__('Sala została zapisana.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Nie mogę zapisać sali.'));
            }           
        } 
    }

    public function edit($id = null) {
         if (!$id) {
            throw new NotFoundException(__('Nie obrano identyfikatora sali.'));
        }

        $theatre = $this->Theatre->findById($id);
        if (!$theatre) {
            throw new NotFoundException(__('Obrano identyfikator spoza zbioru istniejących wartości.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Theatre->id = $id;
            if ($this->Theatre->save($this->request->data)) {
                $this->Session->setFlash('Modyfikacja Sali Została Wykonana');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Modyfikacja Sali Zakończona Porażką');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $theatre;
        }
    }


    public function isAuthorized($user) {

        if (isset($user['role']) && $user['role'] === 'cashier') {
            if ( in_array($this->action, array('add','view', 'delete', 'edit') ) ) {
                return true;
            }    
        }    

            //Ostatnia instancja autoryzacji - klasa matka
        return parent::isAuthorized($user);
    }

}

?>