<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Genres Controller
 *
 * @property \App\Model\Table\GenresTable $Genres
 * @method \App\Model\Entity\Genre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GenresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $genres = $this->paginate($this->Genres);

        $this->set(compact('genres'));
    }

    /**
     * View method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genre = $this->Genres->get($id, [
            'contain' => ['Films'],
        ]);

        $this->set(compact('genre'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genre = $this->Genres->newEmptyEntity();
        if ($this->request->is('post')) {
            $genre = $this->Genres->patchEntity($genre, $this->request->getData());
            if ($this->Genres->save($genre)) {
                $this->Flash->success(__('The genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre could not be saved. Please, try again.'));
        }
        $films = $this->Genres->Films->find('list', ['limit' => 200]);
        $this->set(compact('genre', 'films'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genre = $this->Genres->get($id, [
            'contain' => ['Films'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genre = $this->Genres->patchEntity($genre, $this->request->getData());
            if ($this->Genres->save($genre)) {
                $this->Flash->success(__('The genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre could not be saved. Please, try again.'));
        }
        $films = $this->Genres->Films->find('list', ['limit' => 200]);
        $this->set(compact('genre', 'films'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genre = $this->Genres->get($id);
        if ($this->Genres->delete($genre)) {
            $this->Flash->success(__('The genre has been deleted.'));
        } else {
            $this->Flash->error(__('The genre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
