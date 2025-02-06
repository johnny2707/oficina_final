<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAttributes extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'creation TIMESTAMP default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('attributes');
    }

    public function down() {
        $this->forge->dropTable('attributes');
    }
    
}
