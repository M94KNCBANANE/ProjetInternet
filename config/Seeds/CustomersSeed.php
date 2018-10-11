<?php
use Migrations\AbstractSeed;

/**
 * Customers seed.
 */
class CustomersSeed extends AbstractSeed
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
                'id' => '3',
                'name' => 'testModif',
                'phone' => '4445556666',
                'created' => '2018-10-10 00:04:20',
                'modified' => '2018-10-10 01:13:29',
                'user_id' => '20',
            ],
        ];

        $table = $this->table('customers');
        $table->insert($data)->save();
    }
}
