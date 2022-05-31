<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();

        if ($user->label_id === 2) 
        {


        $this->paginate = [
            'contain' => ['Labels'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
       
        if ($user->label_id !== 2) {
            $this->Flash->error('Opcionees solo para el Administrador ');
            $this->redirect(['controller' => 'customers','action' => 'index']);
        }


    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {

        $user = $this->Authentication->getIdentity();
        $id = $user->id;

        $user = $this->Users->get($id, [
            'contain' => ['Labels', 'Teams', 'Customers', 'Groups'],
        ]);

        $this->set(compact('user'));
    }


    public function ver($id= Null)
    {

        $user = $this->Users->get($id, [
            'contain' => ['Labels', 'Teams', 'Customers', 'Groups'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registro Exitodo::::::: Inicia secion Porfavor'));
                

                return $this->redirect(['controller' => 'customers','action' => 'index']);
            }
            $this->Flash->error(__('Fallo al registrar'));
        }
        $labels = $this->Users->Labels->find('list', ['limit' => 200])->all();
        
        $this->set(compact('user', 'labels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Teams'],
        ]);


        $result = $this->Authorization->canResult($user,'edit');

        if ($result->getStatus()) {

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Datos Modificados'));

                return $this->redirect(['controller'=>'customers','action' => 'index']);
            }
            $this->Flash->error(__('Fallo al modificar'));
        }
        $labels = $this->Users->Labels->find('list', ['limit' => 200])->all();
        
        $idf=$user->id;

        
        
        $teams = $this->Users->Teams->find('list',['conditions' => ['Teams.find' => $idf]])->all();
        
        $this->set(compact('user', 'labels', 'teams'));}

    
        if (!$result->getStatus()) {

            $this->Flash->error('No puedes editar otros perfiles');
            $this->redirect(['controller'=>'customers','action' => 'index']);

        
    }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Eliminaste tu cuenta'));
        } else {
            $this->Flash->error(__('No se pudo eliminar'));
        }

        return $this->redirect(['action' => 'logout']);
    }

    
    public function login()
    {

        $result = $this->Authentication->getResult();
    
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $user = $this->Authentication->getIdentity();
            $target = $this->Authentication->getLoginRedirect() ?? '/customers/index';

            $this->Flash->success(__('Bienvenido acabas de inicias sesion como:'));
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Contraseña o correo Invalido');
        }
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $this->Authentication->allowUnauthenticated(['login','add']);
}

public function logout()
{ 
    
    $this->Authentication->logout();
    $this->redirect(['controller' => 'users', 'action' => 'login']);
    
    


   
}


}
