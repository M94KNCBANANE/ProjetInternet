<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'email' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'password' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'type' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'uuid' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'email' => 'Test@mail.com',
                'password' => 'Lorem ipsum dolor sit amet',
                'type' => 1,
                'created' => '2018-11-07 17:40:58',
                'modified' => '2018-11-07 17:40:58',
                'uuid' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'id' => 2,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'type' => 4,
                'created' => '2018-11-07 17:40:58',
                'modified' => '2018-11-07 17:40:58',
                'uuid' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'id' => 3,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'type' => 2,
                'created' => '2018-11-07 17:40:58',
                'modified' => '2018-11-07 17:40:58',
                'uuid' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'id' => 4,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'type' => 5,
                'created' => '2018-11-07 17:40:58',
                'modified' => '2018-11-07 17:40:58',
                'uuid' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'id' => 5,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'type' => 3,
                'created' => '2018-11-07 17:40:58',
                'modified' => '2018-11-07 17:40:58',
                'uuid' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
