<?php
declare(strict_types=1);

namespace App\Controller\V1;

/**
 * Actors Controller
 *
 * @property \App\Model\Table\ActorsTable $Actors
 * @method \App\Model\Entity\Actor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $actors = $this->Actors->find('all');
        $this->set(compact('actors'));
        $this->viewBuilder()->setOption('serialize', ['actors']);

    }

    
    public function view($id = null)
    {
        $actor = $this->Actors->get($id, [
            'contain' => ['Films'],
        ]);

        $this->set('actor', $actor);
        $this->viewBuilder()->setOption('serialize', ['actor']);

    }

    /** add or update based on the presence of id in the form */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        // verifica se hai un id
        if ($this->request->getData('id')){
            $actor = $this->Actors->get($this->request->getData('id') );
            $actor = $this->Actors->patchEntity($actor, $this->request->getData());
        } else {
               
            $actor = $this->Actors->newEntity($this->request->getData());
        }
        if ($this->Actors->save($actor)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'actor' => $actor,
        ]);
        $this->viewBuilder()->setOption('serialize', ['actor', 'message']);
    }

  
   
   
    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $actor = $this->Actor->get($id);
        $message = 'Deleted';
        if (!$this->Actor->delete($actor)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

}
