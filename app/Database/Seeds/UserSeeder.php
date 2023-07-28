<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'nama' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => md5('admin123'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
