<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoresTable Test Case
 */
class StoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoresTable
     */
    public $Stores;

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

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Stores') ? [] : ['className' => StoresTable::class];
        $this->Stores = TableRegistry::getTableLocator()->get('Stores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stores);

        parent::tearDown();
    }

    public function testSaving(){
        $data = [
            'id' => 3,
                'name' => 'StoreTest',
                'phone' => '5148636593',
                'created' => '2018-11-07 17:40:57',
                'modified' => '2018-11-07 17:40:57',
                'user_id' => 3
        ];
        
        $store = $this->Stores->newEntity($data);
        $countBeforeSave = $this->Stores->find()->count();
        $this->Stores->save($store);
        $countAfterSave = $this->Stores->find()->count();
        $this->assertEquals($countAfterSave, $countBeforeSave + 1);

    }

    public function testEditing() {
        $store = $this->Stores->find('all')->first();
        $store->phone = '5556669999';
        $this->Stores->save($store);
        $this->assertEquals('5556669999', $store->phone);
    }
    public function testDeleting() {
        $countBeforeDelete = $this->Stores->find()->count();
        $store = $this->Stores->find()->first();
        $this->Stores->delete($store);
        $countAfterDelete = $this->Stores->find()->count();
        $this->assertEquals($countAfterDelete, $countBeforeDelete - 1);
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
