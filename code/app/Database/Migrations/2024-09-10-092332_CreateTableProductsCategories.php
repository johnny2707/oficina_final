<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductsCategories extends Migration {

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
            'categoryID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('productID');
        $this->forge->addKey('categoryID');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products_categories');
    }

    public function down() {
        $this->forge->dropTable('products_categories');
    }
}
