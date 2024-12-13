<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'genre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'price' => [
                'type' => 'INT',
                'null' => false, // This enforces that the field cannot be null
            ],
            'duration' => [
                'type' => 'INT',
            ],
            'release_date' => [
                'type' => 'DATE',
            ],
            'language' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'director' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'cast' => [
                'type' => 'TEXT',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'rating' => [
                'type' => 'DECIMAL',
                'constraint' => '2,1',
            ],
            'poster_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('movies');
    }


    public function down()
    {
        $this->forge->dropTable('movies'); // Drop the table
    }
}
