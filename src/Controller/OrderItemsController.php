<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderItems Controller
 *
 * @property \App\Model\Table\OrderItemsTable $OrderItems
 *
 * @method \App\Model\Entity\OrderItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Products']
        ];
        $orderItems = $this->paginate($this->OrderItems);

        $this->set(compact('orderItems'));
    }


    public function isAuthorized($user) {
       
        $action = $this->request->params['action'];
		
		if (isset($user['type']) && $user['type'] == 1) {
            if (in_array($action, ['view', 'add','index', 'edit'])) {
                return true;
            }
        
        }
        $valeur = parent::isAuthorized($user);
        return $valeur;
    }

    /**
     * View method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderItem = $this->OrderItems->get($id, [
            'contain' => ['Customers', 'Products']
        ]);

        $this->set('orderItem', $orderItem);
    }

    /**
     * Add method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $loguser = $this->request->session()->read('Auth.User');
        $orderItem = $this->OrderItems->newEntity();
        if ($this->request->is('post')) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            $orderItem->price = $this->OrderItems->Products->findById($orderItem->product_id)->first()->get('price');
            if ($this->OrderItems->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $customers = $this->OrderItems->Customers->find('list', ['limit' => 200]);
        $products = $this->OrderItems->Products->find('list', ['limit' => 200]);
        $productid = $this->request->getParam('pass.0');

        if($loguser['type'] == 1){
        $customers = $this->OrderItems->Customers->findByUser_id($loguser['id'])->first();
        }

        $this->set(compact('orderItem', 'customers', 'products', 'productid'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderItem = $this->OrderItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            if ($this->OrderItems->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $customers = $this->OrderItems->Customers->find('list', ['limit' => 200]);
        $products = $this->OrderItems->Products->find('list', ['limit' => 200]);
        $this->set(compact('orderItem', 'customers', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderItem = $this->OrderItems->get($id);
        if ($this->OrderItems->delete($orderItem)) {
            $this->Flash->success(__('The order item has been deleted.'));
        } else {
            $this->Flash->error(__('The order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function findById($id, $table){
       $found ='';
        foreach($table as $item){
            if($item['id'] == $id){
                $found = $item;
            }
        }
    }
}
