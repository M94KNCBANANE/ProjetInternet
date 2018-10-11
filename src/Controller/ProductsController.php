<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['view', 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
         if(isset($user['type'])){
           if($user['type'] == 2 ){
            if(in_array($action, ['add','edit'])){
                return true;
            }
            }
        }
       $valeur = parent::isAuthorized($user);
        return $valeur;
    }


    public function index()
    {
        
        $this->paginate = [
            'contain' => ['ProductTypes', 'Stores']
        ];
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {  
        $product = $this->Products->get($id, [
            'contain' => ['ProductTypes', 'Stores', 'OrderItems', 'Files']
        ]);
        $this->paginate = [
            'contain' => ['ProductTypes', 'Stores']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('product', 'products'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $loguser = $this->request->session()->read('Auth.User');
        if($loguser['type'] == 2){
        $stores = $this->Products->Stores->findByUser_id($loguser['id'])->first();
        }else{
        $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $files = $this->Products->files->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'stores', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        $files = $this->Products->files->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'stores','files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getProducts(){

        $this->paginate = [
            'contain' => ['ProductTypes', 'Stores']
        ];
        $products = $this->paginate($this->Products);
        return $products;
    }
}
