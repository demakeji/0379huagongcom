<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Album extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ALid' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'blog_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ALid', true);
        $this->forge->createTable('Album');
    }

    public function down()
    {
        //
    }
}
