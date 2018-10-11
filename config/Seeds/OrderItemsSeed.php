<?php
use Migrations\AbstractSeed;

/**
 * OrderItems seed.
 */
class OrderItemsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'customer_id' => '3',
                'product_id' => '7',
                'quantity' => '1',
                'price' => '99.99',
                'date' => '2018-10-10',
                'created' => '2018-10-10 00:12:57',
                'modified' => '2018-10-10 00:12:57',
            ],
            [
                'id' => '2',
                'customer_id' => '3',
                'product_id' => '10',
                'quantity' => '1',
                'price' => '99.99',
                'date' => '2018-10-10',
                'created' => '2018-10-10 00:41:42',
                'modified' => '2018-10-10 00:41:42',
            ],
            [
                'id' => '3',
                'customer_id' => '3',
                'product_id' => '11',
                'quantity' => '3',
                'price' => '123.31',
                'date' => '2018-10-10',
                'created' => '2018-10-10 00:42:57',
                'modified' => '2018-10-10 00:42:57',
            ],
        ];

        $table = $this->table('Order_Items');
        $table->insert($data)->save();
    }
}
