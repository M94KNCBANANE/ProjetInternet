<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

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
    }


    public function index()
    {
        
        $this->paginate = [
            'contain' => ['ProductTypes', 'Stores', 'City']
        ];
        $loguser = $this->request->session()->read('Auth.User');
        $products = $this->paginate($this->Products);
        if($loguser['type']%3 == 2){
            $store = $this->Products->Stores->findByUser_id($loguser['id'])->first();
        }
        
        $this->set(compact('products','store'));
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
            'contain' => ['ProductTypes', 'Stores', 'OrderItems', 'Files', 'City']
        ]);
        $this->paginate = [
            'contain' => ['ProductTypes', 'Stores', 'City']
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
            $productTypeName = $this->request->getData('productType_id');
			$productType = $this->Products->ProductTypes->findByName($this->request->getData('productType_id'))->first();
			
			if($productType == null){
				$newProductType = $this->Products->ProductTypes->newEntity();
				$newProductType = $this->Products->ProductTypes->patchEntity($newProductType, $this->request->getData());
				$newProductType->name = $productTypeName;
				$this->Products->ProductTypes->save($newProductType);
				$productType = $newProductType;
            }
            $product->productType_id=$productType['id'];
            $product->deleted = false;
            if ($this->Products->save($product)) {
                
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $loguser = $this->request->session()->read('Auth.User');
        if($loguser['type']%3 == 2){
        $stores = $this->Products->Stores->findByUser_id($loguser['id'])->first();
        }else{
        $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        }
        $files = $this->Products->files->find('list', ['limit' => 200]);

        $city = $this->Products->City->find('list'); 
        
        $productType = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $this->set(compact('product', 'stores', 'files', 'city', 'productType'));
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
            'contain' => ['city', 'ProductTypes']
        ]);
        $product['productType_id'] = $product->product_type['name'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $productTypeName = $this->request->getData('productType_id');
			$productType = $this->Products->ProductTypes->findByName($this->request->getData('productType_id'))->first();
			
			if($productType == null){
				$newProductType = $this->Products->ProductTypes->newEntity();
				$newProductType = $this->Products->ProductTypes->patchEntity($newProductType, $this->request->getData());
				$newProductType->name = $productTypeName;
				$this->Products->ProductTypes->save($newProductType);
				$productType = $newProductType;
            }
            $product->productType_id=$productType['id'];
            $product->deleted = false;
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
       
        $files = $this->Products->files->find('list', ['limit' => 200]);
                
        $city = $this->Products->City->find('list'); 
        $this->set(compact('product', 'productTypes', 'stores','files','city'));
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
        
        $product = $this->Products->get($id);
        $product['deleted'] = true;

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        return $this->redirect(['action' => 'index']);
    }

    public function restore($id = null)
    {
        
        $product = $this->Products->get($id);
        $product['deleted'] = false;

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been restored.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The product could not be restored. Please, try again.'));
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
