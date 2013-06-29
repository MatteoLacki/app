<?php
class MoviesController extends AppController {

    public $name = 'Movies';

    public $helpers = array('Html', 'Form', 'Session');

    public function index() {
            //To wyeksportuje do View wypis (array)
        $this->set('movies', $this->Movie->find('all'));
    }


    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Nie podano numeru filmu.'));
        }

        $movie = $this->Movie->findById($id);
        if (!$movie) {
            throw new NotFoundException(__('Nie ma filmu o takim numerze.'));
        }

        $this->set('movie', $movie);
    }


    public function add() {
        if ($this->request->is('post')) {
            $this->Movie->create();

            if ($this->Movie->save($this->request->data)) {
                $this->Session->setFlash(__('Film został zapisany.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Nie mogę zapisać filmu.'));
            }           
        } 
    }

    public function edit($id = null) {
         if (!$id) {
            throw new NotFoundException(__('Nie obrano identyfikatora filmu.'));
        }

        $movie = $this->Movie->findById($id);
        if (!$movie) {
            throw new NotFoundException(__('Obrano identyfikator spoza zbioru istniejących wartości.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Movie->id = $id;
            if ($this->Movie->save($this->request->data)) {
                $this->Session->setFlash('Modyfikacja Filmu Została Wykonana');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Modyfikacja Filmu Zakończona Porażką');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $movie;
        }
    }


}

?>