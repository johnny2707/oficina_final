<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductsVariationsAttributes extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'productVariationID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'attributeValueID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);

        $this->forge->addKey('productVariationID');
        $this->forge->addKey('attributeValueID');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products_variations_attributes');
    }

    public function down() {
        $this->forge->dropTable('products_variations_attributes');
    }
}
