<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'kepi',
            'email'    => 'kepi@gmail.com',
            'password' => password_hash('kepi', PASSWORD_DEFAULT),
        ];

        $this->db->table('user')->insert($data);
    }
}
