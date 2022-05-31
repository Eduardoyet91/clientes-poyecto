<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $user = $this->Authentication->getIdentity();
        $id=$user->id;

        
       
                  echo $this->Flash->success(__($user->email));



        $groups = $this->Groups->find('all', [
            'conditions' => ['Groups.user_id ' => $id],
            'contain' => ['Users']

        ]);
        

        
        $this->set(compact('groups', $this->paginate($groups)));
    
        }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Users', 'Customers'],
        ]);

        $this->set(compact('group'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEmptyEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $user = $this->Authentication->getIdentity();
            $group->user_id = $user->id;
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Grupo Creado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Fallo al Crear el grupo'));
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('group', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Grupo Modificado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo modificar el Grupo.'));
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('group', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('Grupo Eliminado'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el grupo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
