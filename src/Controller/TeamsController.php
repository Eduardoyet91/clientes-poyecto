<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 * @method \App\Model\Entity\Team[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        $id=$user->id;

       
       
        echo $this->Flash->success(__($user->email));

        $teams= $this->Teams->find('all', [
            'conditions' => ['Teams.find ' => $id],
            'contain' => ['Users'],

        ]);

        $this->set(compact('teams', $this->paginate($teams)));
    }

    /**
     * View method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        
        $team = $this->Teams->get($id, [
            'contain' => ['Users'],
        ]);

        

        $this->set(compact('team'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $team = $this->Teams->newEmptyEntity();
        $user = $this->Authentication->getIdentity();
        $team->find = $user->id;
        if ($this->request->is('post')) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('Se ccreo un nuevo Equipo de trabajo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se logro crear el Equipo.'));
        }
        $users = $this->Teams->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('team', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => ['Users'],
        ]);

        $user = $this->Authentication->getIdentity();
        $id=$user->id;
            if ($team->find == $id)
            {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('Equipo Modificado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se logro modificar el equipo'));
        }
        $users = $this->Teams->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('team', 'users'));
    }

    if ($team->find !== $id)
            {

                $this->Flash->error('Opcion solo para el Creador de equipo ');
                $this->redirect(['controller' => 'teams','action' => 'view',$id]);
            }




            


    }

    /**
     * Delete method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $team = $this->Teams->get($id);

        $user = $this->Authentication->getIdentity();
        $id=$user->id;
            if ($team->find == $id)
            {
        if ($this->Teams->delete($team)) {
            $this->Flash->success(__('  Equipo Eliminado.'));
        } else {
            $this->Flash->error(__('No se logro eliminar.'));
        }

        return $this->redirect(['action' => 'index']);}

        if ($team->find !== $id)
        {

            $this->Flash->error('No se Borro equipo..Opcion solo para el Creador de equipo ');
            $this->redirect(['controller' => 'teams','action' => 'view',$id]);
        }


    }

   
}
