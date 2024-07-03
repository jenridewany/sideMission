<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');
        
        // Insert initial categories data
        $data = [
            ['name' => 'Art'],
            ['name' => 'Photo Assets'],
            ['name' => 'Video Assets'],
            ['name' => 'Lightroom Preset']
        ];

        $this->db->table('categories')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
