<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActorsFilms Controller
 *
 * @property \App\Model\Table\ActorsFilmsTable $ActorsFilms
 * @method \App\Model\Entity\ActorsFilm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActorsFilmsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actors', 'Films'],
        ];
        $actorsFilms = $this->paginate($this->ActorsFilms);

        $this->set(compact('actorsFilms'));
    }

    /**
     * View method
     *
     * @param string|null $id Actors Film id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actorsFilm = $this->ActorsFilms->get($id, [
            'contain' => ['Actors', 'Films'],
        ]);

        $this->set(compact('actorsFilm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actorsFilm = $this->ActorsFilms->newEmptyEntity();
        if ($this->request->is('post')) {
            $actorsFilm = $this->ActorsFilms->patchEntity($actorsFilm, $this->request->getData());
            if ($this->ActorsFilms->save($actorsFilm)) {
                $this->Flash->success(__('The actors film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actors film could not be saved. Please, try again.'));
        }
        $actors = $this->ActorsFilms->Actors->find('list', ['limit' => 200]);
        $films = $this->ActorsFilms->Films->find('list', ['limit' => 200]);
        $this->set(compact('actorsFilm', 'actors', 'films'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actors Film id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actorsFilm = $this->ActorsFilms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actorsFilm = $this->ActorsFilms->patchEntity($actorsFilm, $this->request->getData());
            if ($this->ActorsFilms->save($actorsFilm)) {
                $this->Flash->success(__('The actors film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actors film could not be saved. Please, try again.'));
        }
        $actors = $this->ActorsFilms->Actors->find('list', ['limit' => 200]);
        $films = $this->ActorsFilms->Films->find('list', ['limit' => 200]);
        $this->set(compact('actorsFilm', 'actors', 'films'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actors Film id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actorsFilm = $this->ActorsFilms->get($id);
        if ($this->ActorsFilms->delete($actorsFilm)) {
            $this->Flash->success(__('The actors film has been deleted.'));
        } else {
            $this->Flash->error(__('The actors film could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
