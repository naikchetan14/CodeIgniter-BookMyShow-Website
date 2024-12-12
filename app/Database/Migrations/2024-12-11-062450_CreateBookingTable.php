<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingTable extends Migration
{
    public function up()
    {
        // Create bookings table
        $this->forge->addField([
            'bookingID' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'userID' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'movie_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'user_name' =>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'movieName' =>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'poster_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bookingDate' => [
                'type' => 'DATETIME',
                'null' => true, // Allow NULL values if you want to
            ],
            'bookingExpiryDate' =>[
                'type' => 'DATETIME',
                'null' => true, // Allow NULL values if you want to
            ],
            'show_time' => [
                'type' => 'DATETIME',
            ],
            'seats' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'payment_status' => [
                'type' =>'VARCHAR',
                'constraint' =>'255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, // Allow NULL values
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, // Allow NULL values
            ],
        ]);

        // Add primary key
        $this->forge->addPrimaryKey('bookingID');

        // Add foreign keys
        $this->forge->addForeignKey('userID', 'user', 'userID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('movie_id', 'movies', 'id', 'CASCADE', 'CASCADE');

        // Create the table
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        // Drop the bookings table
        $this->forge->dropTable('bookings');
    }
}
