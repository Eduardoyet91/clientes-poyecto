<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
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

        if ($user->label_id === 2) 
        { 
            
            
            $this->paginate = [
                'contain' => ['Users', 'Groups'],
            ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));

        }



        if ($user->label_id !== 2) {

        $this->paginate = [
            'contain' => ['Users', 'Groups'],
        ];
       
        
       
                  echo $this->Flash->success(__($user->email));


        $customers = $this->Customers->find('all', [
            'conditions' => ['Customers.user_id ' => $id],
            'contain' => ['Users', 'Groups'],

        ]);
        

        
        $this->set(compact('customers', $this->paginate($customers)));
        }
    
        

    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Users', 'Groups', 'Comments'],
        ]);

        $this->set(compact('customer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());

            $user = $this->Authentication->getIdentity();
                        $customer->user_id = $user->id;

            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $users = $this->Customers->Users->find('list', ['limit' => 200])->all();
        $groups = $this->Customers->Groups->find('list', ['limit' => 200])->all();
        $this->set(compact('customer', 'users', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);

        

        $result = $this->Authorization->canResult($customer,'edit');

        if ($result->getStatus()) {

        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $users = $this->Customers->Users->find('list', ['limit' => 200])->all();

        $user = $this->Authentication->getIdentity();
        $idf=$user->id;

        $groups = $this->Customers->Groups->find('list',['conditions' => ['Groups.user_id ' => $idf],'contain' => ['Customers'],])->all();
        
        $this->set(compact('customer', 'users', 'groups'));

    }

    if (!$result->getStatus()) {

        $this->Flash->error('No puedes editar otros clientes');
        $this->redirect(['controller'=>'customers','action' => 'index']);

    
}
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function seecustomer($id = null)
{



    $customers = $this->Customers->find('all', [
        'conditions' => ['Customers.user_id ' => $id],
        'contain' => ['Users', 'Groups'],

    ]);
     
    $this->set(compact('customers', $this->paginate($customers)));
}
}
