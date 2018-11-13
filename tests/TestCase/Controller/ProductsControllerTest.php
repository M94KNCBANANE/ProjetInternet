<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ProductsController Test Case
 */
class ProductsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products',
        'app.product_types',
        'app.city',
        'app.stores',
        'app.files',
        'app.users',
        'app.order_items'
    ];

    public function setUp(){
        parent::setUp();

        $this->Products = TableRegistry::get('Products');
        $users = TableRegistry::get('users');
        $admin = $users->find('all', ['conditions' => ['Users.type' => 3]])->first()->toArray();
        $this->AuthAdmin = [
            'Auth'=>[
                'User' => $admin
            ]
            ];
        
    }

    public function tearDown(){
        unset($this->AuthAdmin);
        parent::tearDown();
    }
    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/products');
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

        $this->get('/products/view/1');
        $this->assertResponseContains('TestNameOne');
        //$this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);
        $this->get('/products/add');

        $this->assertResponseOk();

        $data = [
                'id' => 4,
                'name' => 'blabla',
                'price' => 34,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'productType_id' => 1,
                'store_id' => 1,
                'deleted' => 0,
                'created' => '2018-11-07 17:40:56',
                'modified' => '2018-11-07 17:40:56',
                'city_id' => 1
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/products/add', $data);
        $this->assertResponseSuccess();
        $query = $this->Products->find('all', ['conditions' => ['Products.id' => $data['id']]]);
        $this->assertNotEmpty($query->toArray());
    }

    /**
     * Test autocomplete method
     *
     * @return void
     */
    public function testAutocomplete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findTypes method
     *
     * @return void
     */
    public function testFindTypes()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
    
        $this->session($this->AuthAdmin);
        $this->get('/products/edit/1');

        $this->assertResponseOk();

        $data = [
                'id' => 1,
                'name' => 'TestEdit',
                'price' => 200,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'productType_id' => 1,
                'store_id' => 1,
                'deleted' => 0,
                'created' => '2018-11-07 17:40:56',
                'modified' => '2018-11-07 17:40:56',
                'city_id' => 1
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/products/edit/1', $data);
        $this->assertResponseSuccess();
        $query = $this->Products->find('all', ['conditions' => ['Products.name' => $data['name']]]);
        $this->assertNotEmpty($query->toArray());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        
        $this->session($this->AuthAdmin);
        $this->get('/products/delete/1');

        $this->assertResponseOk();

        $data = [
                'id' => 1,
                'name' => 'TestEdit',
                'price' => 200,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'productType_id' => 1,
                'store_id' => 1,
                'deleted' => 0,
                'created' => '2018-11-07 17:40:56',
                'modified' => '2018-11-07 17:40:56',
                'city_id' => 1
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/products/edit/1', $data);
        $this->assertResponseSuccess();
        $query = $this->Products->find('all', ['conditions' => ['Products.name' => $data['name']]]);
        $this->assertNotEmpty($query->toArray());
    }

    /**
     * Test restore method
     *
     * @return void
     */
    public function testRestore()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getProducts method
     *
     * @return void
     */
    public function testGetProducts()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
