<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerOrdersTable Test Case
 */
class CustomerOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerOrdersTable
     */
    public $CustomerOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_orders',
        'app.customers',
        'app.stores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomerOrders') ? [] : ['className' => CustomerOrdersTable::class];
        $this->CustomerOrders = TableRegistry::getTableLocator()->get('CustomerOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerOrders);

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
