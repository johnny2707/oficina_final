<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductsVariations extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'productID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'reference' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'price' => [
                'type' => 'FLOAT',
            ],
            'locationID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('productID');
        $this->forge->addKey('locationID');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products_variations');
    }

    public function down() {
        $this->forge->dropTable('products_variations');
    }
}
