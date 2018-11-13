<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderItemsFixture
 *
 */
class OrderItemsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'customer_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'price' => ['type' => 'float', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'product_id_fk' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['Products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'customer_id_fk' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['Customers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'customer_id' => 1,
                'product_id' => 1,
                'quantity' => 3,
                'price' => 45,
                'date' => '2018-11-07',
                'created' => '2018-11-07 17:40:55',
                'modified' => '2018-11-07 17:40:55'
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'product_id' => 2,
                'quantity' => 50,
                'price' => 30,
                'date' => '2018-11-07',
                'created' => '2018-11-07 17:40:55',
                'modified' => '2018-11-07 17:40:55'
            ],
            [
                'id' => 3,
                'customer_id' => 1,
                'product_id' => 3,
                'quantity' => 500,
                'price' => 6,
                'date' => '2018-11-07',
                'created' => '2018-11-07 17:40:55',
                'modified' => '2018-11-07 17:40:55'
            ],
        ];
        parent::init();
    }
}
