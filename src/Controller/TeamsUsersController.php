<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * TeamsUsers Controller
 *
 * @property \App\Model\Table\TeamsUsersTable $TeamsUsers
 * @method \App\Model\Entity\TeamsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Users'],
        ];
        $teamsUsers = $this->paginate($this->TeamsUsers);

        $this->set(compact('teamsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamsUser = $this->TeamsUsers->get($id, [
            'contain' => ['Teams', 'Users'],
        ]);

        $this->set(compact('teamsUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamsUser = $this->TeamsUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $teamsUser = $this->TeamsUsers->patchEntity($teamsUser, $this->request->getData());
            if ($this->TeamsUsers->save($teamsUser)) {
                $this->Flash->success(__('The teams user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teams user could not be saved. Please, try again.'));
        }
        $teams = $this->TeamsUsers->Teams->find('list', ['limit' => 200])->all();
        $users = $this->TeamsUsers->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('teamsUser', 'teams', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamsUser = $this->TeamsUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamsUser = $this->TeamsUsers->patchEntity($teamsUser, $this->request->getData());
            if ($this->TeamsUsers->save($teamsUser)) {
                $this->Flash->success(__('The teams user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teams user could not be saved. Please, try again.'));
        }
        $teams = $this->TeamsUsers->Teams->find('list', ['limit' => 200])->all();
        $users = $this->TeamsUsers->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('teamsUser', 'teams', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = NULL)
    {        

        $teamsUser = $this->TeamsUsers->get($id);

        if ($this->TeamsUsers->delete($teamsUser)) {
           
            $this->Flash->success(__('The teams user has been deleted.'));
        } else {
            $this->Flash->error(__('The teams user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
