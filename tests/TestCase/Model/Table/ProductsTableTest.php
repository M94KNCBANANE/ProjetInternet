<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\ProductsTable Test Case
 */
class ProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsTable
     */
    public $Products;

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
        'app.products_files',
        'app.order_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Products') ? [] : ['className' => ProductsTable::class];
        $this->Products = TableRegistry::getTableLocator()->get('Products', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Products);

        parent::tearDown();
    }

    public function testFindDeleted()
    {
        $query = $this->Products->find('deleted');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $result['0']['created'] = '2018-11-07 17:40:56';
        $result['0']['modified'] = '2018-11-07 17:40:56';
        
        $expected = [
                [
                    'id' => 2,
                    'name' => 'NameTest',
                    'price' => 2.0,
                    'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                    'productType_id' => 2,
                    'store_id' => 2,
                    'deleted' => true,
                    'created' => '2018-11-07 17:40:56',
                    'modified' => '2018-11-07 17:40:56',
                    'city_id' => 2
                ],
        ];
        $this->assertEquals($expected, $result);
    }

    public function testSaving(){
       $data = [
            'id' => 4  ,
            'name' => 'TestName4',
            'price' => 300,
            'description' => 'This is my saving test',
            'productType_id' => 2,
            'store_id' => 2,
            'deleted' => 0,
            'created' => '2018-11-07 17:40:56',
            'modified' => '2018-11-07 17:40:56',
            'city_id' => 2
       ];
       $product = $this->Products->newEntity($data);

       $countBefore = $this->Products->find()->count();

       $this->Products->save($product);

       $countAfter = $this->Products->find()->count();
       $this->assertEquals($countBefore,$countAfter-1);

    }

    public function testEditing() {
        $product = $this->Products->find('all', ['conditions' => ['deleted' => false]])->first();
        $product->deleted = true;
        $this->Products->save($product);
        $this->assertEquals(true, $product->deleted);
    }

    public function testDeleting() {
        
        $product = $this->Products->find()->first();
        $countBefore = $this->Products->find()->count();
        $this->Products->delete($product);
        $countAfter= $this->Products->find()->count();
        $this->assertEquals($countAfter, $countBefore-1);
    }

    public function testValidatePriceOK () {
        $product = $this->Products->find('all')->first()->toArray();
        $errors = $this->Products->validationDefault(new Validator())->errors($product);
        $this->assertTrue(empty($errors));
    }
    public function testValidatePriceFail () {
        $product = $this->Products->find('all')->first()->toArray();
        $product['price'] = 'abec';
        $errors = $this->Products->validationDefault(new Validator())->errors($product);
        $this->assertTrue(!empty($errors['price']));
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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
