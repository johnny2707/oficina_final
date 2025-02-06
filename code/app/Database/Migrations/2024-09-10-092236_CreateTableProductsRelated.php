<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductsRelated extends Migration {

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
            'relatedProductID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('productID');
        $this->forge->addKey('relatedProductID');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products_related');
    }

    public function down() {
        $this->forge->dropTable('products_related');
    }
}
