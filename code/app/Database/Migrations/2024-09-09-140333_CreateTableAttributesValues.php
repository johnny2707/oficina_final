<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAttributesValues extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'attributeID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('attributeID', 'attributes', 'id', 'RESTRICT', 'CASCADE'); // table_column | reference_table | reference_column | ON UPDATE | ON DELETE
        $this->forge->createTable('attributes_values');
    }

    public function down() {
        $this->forge->dropTable('attributes_values');
    }

}
