<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * City Controller
 *
 * @property \App\Model\Table\CityTable $City
 *
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CityController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['getByCountry']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Country']
        ];
        $city = $this->paginate($this->City);

        $this->set(compact('city'));
    }

    public function getByCountry(){
        $country_id = $this->request->query('country_id');

        $city = $this->City->find('all', ['conditions' => ['City.country_id' => $country_id],]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    public function getCitiesSortedByCountries(){
        $countries = $this->City->Country->find('all', ['contain' => ['City']]);
        $this->set('countries', $countries);
        $this->set('_serialize', ['countries']);
        
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => ['Country', 'Products']
        ]);

        $this->set('city', $city);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->City->newEntity();
        if ($this->request->is('post')) {
            $city = $this->City->patchEntity($city, $this->request->getData());
            if ($this->City->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $country = $this->City->Country->find('list', ['limit' => 200]);
        $this->set(compact('city', 'country'));
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->City->patchEntity($city, $this->request->getData());
            if ($this->City->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $country = $this->City->Country->find('list', ['limit' => 200]);
        $this->set(compact('city', 'country'));
    }

}
