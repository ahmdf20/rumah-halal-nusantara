<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sertifikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_umkm' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'kode_pos' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'nama_produk' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'sertifikat' => [
                'type' => 'enum',
                'constraint' => ['sudah terbit', 'tidak terbit'],
            ],
            'keterangan' => [
                'type' => 'text',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('sertifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('sertifikasi');
    }
}
