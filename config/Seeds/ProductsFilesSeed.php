<?php
use Migrations\AbstractSeed;

/**
 * ProductsFiles seed.
 */
class ProductsFilesSeed extends AbstractSeed
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
                'product_id' => '12',
                'file_id' => '2',
            ],
        ];

        $table = $this->table('products_files');
        $table->insert($data)->save();
    }
}
