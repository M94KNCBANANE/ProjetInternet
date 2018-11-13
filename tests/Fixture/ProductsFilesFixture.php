<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFilesFixture
 *
 */
class ProductsFilesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'product_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'file_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['product_id', 'file_id'], 'length' => []],
            'sqlite_autoindex_products_files_1' => ['type' => 'unique', 'columns' => ['product_id', 'file_id'], 'length' => []],
            'product_id_fk' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['Products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'file_id_fk' => ['type' => 'foreign', 'columns' => ['file_id'], 'references' => ['files', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'product_id' => 1,
                'file_id' => 1
            ],
            [
                'product_id' => 2,
                'file_id' => 1
            ],
            [
                'product_id' => 3,
                'file_id' => 1
            ],
        ];
        parent::init();
    }
}
