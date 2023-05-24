<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);

        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
