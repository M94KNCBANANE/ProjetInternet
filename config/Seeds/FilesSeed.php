<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'name' => 'test.jpg',
                'path' => 'Files/',
                'created' => '2018-10-09 23:15:52',
                'modified' => '2018-10-09 23:15:52',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'television.jpg',
                'path' => 'Files/',
                'created' => '2018-10-09 23:19:08',
                'modified' => '2018-10-09 23:19:08',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
