<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTrackingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'userID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'login_time' => [
                'type' => 'DATETIME',
            ],
            'logout_time' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('userID', 'user', 'userID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_tracking');
    }

    public function down()
    {
        $this->forge->dropTable('user_tracking');
    }
}
