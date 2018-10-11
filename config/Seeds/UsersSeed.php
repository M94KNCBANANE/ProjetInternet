<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '4',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$XFX.DgJsQ769mkx8oQcBXeoHR8EFIKW6z6EApI.JasM.AmSBXqeQa',
                'type' => '3',
                'created' => '2018-09-28 14:23:39',
                'modified' => '2018-09-28 14:23:39',
            ],
            [
                'id' => '20',
                'email' => 'test@mail.com',
                'password' => '$2y$10$4YayQuai5/JvCe02nbopQON109L06Y4nYu1C4sC0RNS1tKgGFYxae',
                'type' => '1',
                'created' => '2018-10-10 00:04:20',
                'modified' => '2018-10-10 00:04:20',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
