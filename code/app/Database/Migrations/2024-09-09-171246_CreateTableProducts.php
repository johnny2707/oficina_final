<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProducts extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'type' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
            'reference' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'price' => [
                'type' => 'FLOAT',
            ],
            'brandID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'locationID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('brandID');
        $this->forge->addKey('locationID');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down() {
        $this->forge->dropTable('products');
    }

}
