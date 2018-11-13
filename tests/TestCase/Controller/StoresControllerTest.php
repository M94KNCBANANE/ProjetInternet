<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StoresController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\StoresController Test Case
 */
class StoresControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stores',
        'app.users',
        'app.products'
    ];


    public function setUp(){
        parent::setUp();

        $this->Stores = TableRegistry::get('Stores');
        $users = TableRegistry::get('users');
        $admin = $users->find('all', ['conditions' => ['Users.type' => 3]])->first()->toArray();
        $client = $users->find('all', ['conditions' => ['Users.type' => 1]])->first()->toArray();
        $this->AuthAdmin = [
            'Auth'=>[
                'User' => $admin
            ]
            ];
        $this->AuthClient = [
                'Auth'=>[
                    'User' => $client
                ]
                ];
        
    
    }

    public function tearDown(){
        unset($this->AuthAdmin);
        unset($this->AuthClient);
        parent::tearDown();
    }
    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->session($this->AuthClient);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/stores/edit/1');
        $this->assertSession('You are not authorized to access that location.', 'Flash.flash.0.message');
    }


    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        
        $this->session($this->AuthAdmin);
        $this->get('/stores');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);
        $this->get('/stores/view/1');
        $this->assertResponseContains('StoreOne');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);
        $this->get('/stores/add');
        $this->assertResponseOk();
        $data = [
            'id' => 3,
            'name' => 'StoreTest',
            'phone' => '4503333333',
            'created' => '2018-11-07 17:40:57',
            'modified' => '2018-11-07 17:40:57',
            'user_id' => 1
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/stores/add', $data);
        $this->assertResponseSuccess();
        $query = $this->Stores->find('all', ['conditions' => ['Stores.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);
        
        $store = $this->Stores->find('all')->first();
        $nameEdit = "TestEdit";
        $store->name = $nameEdit;
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/stores/edit/' . $store->id, $store->toArray());

        $this->assertResponseSuccess();
        $query = $this->Stores->find('all', ['conditions' => ['Stores.id' => $store->id]])->first();
        $this->assertEquals($query->name , $nameEdit);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/stores/delete/1');
        $this->assertResponseSuccess();
        $query = $this->Stores->find('all', ['conditions' => ['Stores.id' => 1]])->first();
        $this->assertEmpty($query);}
}
