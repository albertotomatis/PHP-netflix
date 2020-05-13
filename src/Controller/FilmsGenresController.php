<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FilmsGenres Controller
 *
 * @property \App\Model\Table\FilmsGenresTable $FilmsGenres
 * @method \App\Model\Entity\FilmsGenre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmsGenresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Films', 'Genres'],
        ];
        $filmsGenres = $this->paginate($this->FilmsGenres);

        $this->set(compact('filmsGenres'));
    }

    /**
     * View method
     *
     * @param string|null $id Films Genre id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filmsGenre = $this->FilmsGenres->get($id, [
            'contain' => ['Films', 'Genres'],
        ]);

        $this->set(compact('filmsGenre'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filmsGenre = $this->FilmsGenres->newEmptyEntity();
        if ($this->request->is('post')) {
            $filmsGenre = $this->FilmsGenres->patchEntity($filmsGenre, $this->request->getData());
            if ($this->FilmsGenres->save($filmsGenre)) {
                $this->Flash->success(__('The films genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The films genre could not be saved. Please, try again.'));
        }
        $films = $this->FilmsGenres->Films->find('list', ['limit' => 200]);
        $genres = $this->FilmsGenres->Genres->find('list', ['limit' => 200]);
        $this->set(compact('filmsGenre', 'films', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Films Genre id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filmsGenre = $this->FilmsGenres->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filmsGenre = $this->FilmsGenres->patchEntity($filmsGenre, $this->request->getData());
            if ($this->FilmsGenres->save($filmsGenre)) {
                $this->Flash->success(__('The films genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The films genre could not be saved. Please, try again.'));
        }
        $films = $this->FilmsGenres->Films->find('list', ['limit' => 200]);
        $genres = $this->FilmsGenres->Genres->find('list', ['limit' => 200]);
        $this->set(compact('filmsGenre', 'films', 'genres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Films Genre id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filmsGenre = $this->FilmsGenres->get($id);
        if ($this->FilmsGenres->delete($filmsGenre)) {
            $this->Flash->success(__('The films genre has been deleted.'));
        } else {
            $this->Flash->error(__('The films genre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
