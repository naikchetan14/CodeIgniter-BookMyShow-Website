<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\TextUI\XmlConfiguration\SchemaFinder;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'adminName' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true,
            ],
            'adminEmail' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,

            ],
            'roles' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'], // Define your roles here
                'default' => 'admin', // Optional: Set a default role
            ],
            'adminPassword' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
