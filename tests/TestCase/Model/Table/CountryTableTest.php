<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountryTable Test Case
 */
class CountryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CountryTable
     */
    public $Country;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.country',
        'app.city'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Country') ? [] : ['className' => CountryTable::class];
        $this->Country = TableRegistry::getTableLocator()->get('Country', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Country);

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
}
