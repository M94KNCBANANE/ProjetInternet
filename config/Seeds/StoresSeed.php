<?php
use Migrations\AbstractSeed;

/**
 * Stores seed.
 */
class StoresSeed extends AbstractSeed
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
                'id' => '2',
                'name' => 'walmat',
                'phone' => '5555555555',
                'created' => '2018-10-05 22:16:31',
                'modified' => '2018-10-05 22:16:31',
                'user_id' => '4',
            ],
            [
                'id' => '3',
                'name' => 'Magasin',
                'phone' => '4444444444',
                'created' => '2018-10-06 12:46:54',
                'modified' => '2018-10-06 12:46:54',
                'user_id' => '4',
            ],
        ];

        $table = $this->table('stores');
        $table->insert($data)->save();
    }
}
