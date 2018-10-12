<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{



public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (in_array($action, ['confirm'])) {
            return true;
        }

        if (isset($user['type']) && $user['type'] == 3) {
            return true;
        }
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }     
		$userToView = $this->Users->findById($id)->first();
        if ($userToView->id === $user['id'] && in_array($action, ['view', 'editCustomer', 'editStore', 'edit'])) {
            return true;
        }
        $value = parent::isAuthorized($user);
        return $value;
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

	public function initialize()
	{
    parent::initialize();
    // Add the 'add' action to the allowed actions list.
    $this->Auth->allow(['logout','confirm']);
	}
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
                $this->Auth->setUser($user);
                if ($user['type'] === 4){
                    $this->Flash->success('Please activate your account. Restrictions: Can\'t edit account or order anything before activation');
                }else if($user['type'] === 5){
                    $this->Flash->success('Please activate your account. Restrictions: Can add or but can\'t edit any entry before activation');
                } else {
                    return $this->redirect(['controller' => 'Products', 'action' => 'index']);
                }
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Customers', 'Stores']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function confirm()
    {
        $uuidparam = $this->request->getQuery('uuid');
        $user = $this->Users->findByUuid($uuidparam)->first();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $user->type %= 3;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been confirmed.'));
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        $this -> autoRender = false;
    }
	
	public function addCustomer() {
        $user = $this->Users->newEntity();
        $customer = $this->Users->Customers->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $customer = $this->Users->Customers->patchEntity($customer, $this->request->getData());
            $this->verifyAndSaveCustomer($user, $customer);
        }
        $this->set(compact('user'));
    }

    public function addStore() {
        $user = $this->Users->newEntity();
        $store = $this->Users->Stores->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $store = $this->Users->Stores->patchEntity($store, $this->request->getData());
            $this->verifyAndSaveStore($user, $store);
        }
        $this->set(compact('user'));
    }

	
	public function verifyAndSaveCustomer($user, $customer) {
        if ($this->Users->exists(['email' => $user->email])) {
            $this->Flash->error(__('The email exists already.'));
        //} else if($this->Customers->exists(['phone' => $customer->phone])){
      //      $this->Flash->error(__('This phone already exists for another customer.'));
        }else{    
            $this->saveUserCustomer($user, $customer);
            
        }
    }

    public function verifyAndSaveStore($user, $store) {
        if ($this->Users->exists(['email' => $user->email])) {
            $this->Flash->error(__('The email exists already.'));
       // } else if ($this->Stores->exists(['phone' => $store->phone])){
         //   $this->Flash->error(__('This phone already exists for another customer.'));
        }else{    
            $this->saveUserStore($user, $store);
            
        }
    }

	public function saveUserCustomer($user, $customer) {
        $user->email = strtolower($user->email);
        $uuid = Text::uuid();
            $user->uuid = $uuid;
        if ($this->Users->save($user)) {
            $customer->user_id = $user->id;
            $emailaddress = $user->get('email');
            if ($this->Users->Customers->save($customer)) {
                $this->Flash->success(__('Your account as been created.'));
                return $this->redirect(['controller' => 'emails', 'action' => 'index', '?'=>['email'=>$emailaddress, 'uuid'=>$uuid]]);
            } else {
					$this->Flash->error(__('The account could not be saved. Please, try again.'));
				}
        }
    }


	public function saveUserStore($user, $store) {
        $user->email = strtolower($user->email);
        $uuid = Text::uuid();
            $user->uuid = $uuid;
        if ($this->Users->save($user)) {
            $store->user_id = $user->id;
            $emailaddress = $user->get('email');
            if ($this->Users->Stores->save($store)) {
                $this->Flash->success(__('Your account as been created'));
                return $this->redirect(['controller' => 'emails', 'action' => 'index', '?'=>['email'=>$emailaddress, 'uuid'=>$uuid]]);
             } else {
					$this->Flash->error(__('The account could not be saved. Please, try again.'));
				}
        }
    }
    
    public function editCustomer($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Customers']
        ]);
        $customer = $user['customers'][0];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $customer = $this->Users->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Users->save($user)) {
                if ($this->Users->Customers->save($customer)) {
                    $this->Flash->success(__('The account has been saved.'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }
        $user['name'] = $customer->name;
        $user['phone'] = $customer->phone;
        
        $this->set(compact('user'));
    }

    public function editStore($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Stores']
        ]);
        $store = $user['stores'][0];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $store = $this->Users->Stores->patchEntity($store, $this->request->getData());
            if ($this->Users->save($user)) {
                if ($this->Users->Stores->save($store)) {
                    $this->Flash->success(__('The account has been saved.'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }
        $user['name'] = $store->name;
        $user['phone'] = $store->phone;
        
        $this->set(compact('user'));
    }

}
	
	
	

