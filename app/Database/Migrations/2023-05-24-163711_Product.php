<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_product' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'harga' => [
                'type' => 'DOUBLE',
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id_product', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
