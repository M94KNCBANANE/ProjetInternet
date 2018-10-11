<?php
use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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
                'id' => '7',
                'name' => 'test',
                'price' => '32.00',
                'description' => 'test',
                'productType_id' => '1',
                'store_id' => '2',
                'deleted' => '0',
                'created' => '2018-10-05 22:17:07',
                'modified' => '2018-10-05 22:17:07',
            ],
            [
                'id' => '8',
                'name' => 'effacer',
                'price' => '-1.00',
                'description' => 'yes',
                'productType_id' => '1',
                'store_id' => '2',
                'deleted' => '1',
                'created' => '2018-10-05 22:18:19',
                'modified' => '2018-10-05 22:18:19',
            ],
            [
                'id' => '9',
                'name' => 'testMagasin',
                'price' => '5.00',
                'description' => 'test affichage des produits',
                'productType_id' => '3',
                'store_id' => '3',
                'deleted' => '0',
                'created' => '2018-10-06 12:47:27',
                'modified' => '2018-10-06 12:47:27',
            ],
            [
                'id' => '10',
                'name' => 'produit',
                'price' => '99.99',
                'description' => '132',
                'productType_id' => '1',
                'store_id' => '2',
                'deleted' => '0',
                'created' => '2018-10-09 23:23:39',
                'modified' => '2018-10-10 00:19:03',
            ],
            [
                'id' => '11',
                'name' => '',
                'price' => '123.31',
                'description' => '123534',
                'productType_id' => '1',
                'store_id' => '2',
                'deleted' => '0',
                'created' => '2018-10-09 23:28:01',
                'modified' => '2018-10-09 23:34:32',
            ],
            [
                'id' => '12',
                'name' => '',
                'price' => '12.12',
                'description' => 'wrqwfadsfe',
                'productType_id' => '1',
                'store_id' => '2',
                'deleted' => '0',
                'created' => '2018-10-09 23:35:54',
                'modified' => '2018-10-09 23:41:43',
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
