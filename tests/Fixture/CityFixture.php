<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 *
 */
class CityFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'country_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'country_id_fk' => ['type' => 'foreign', 'columns' => ['country_id'], 'references' => ['Country', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'country_id' => 1,
                'name' => 'That'
            ],
            [
                'id' => 2,
                'country_id' => 1,
                'name' => 'City'
            ],
            [
                'id' => 3,
                'country_id' => 1,
                'name' => 'Is'
            ],
            [
                'id' => 4,
                'country_id' => 2,
                'name' => 'So'
            ],
            [
                'id' => 5,
                'country_id' => 2,
                'name' => 'Neat'
            ]
        ];
        parent::init();
    }
}
