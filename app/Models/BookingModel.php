<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'bookingId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userId', 'movie_id', 'seats'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function createNewBooking($data)
    {
        $db = \config\Database::connect();
        log_message('info', 'The current data is' . json_encode($data));
        $builder = $db->table('bookings');

        if ($builder->insert($data)) {
            return ['status' => 'success', 'message' => 'Your seat has been booked successfully'];
        } else {
            return ['status' => 'error', 'message' => 'Your seat has been booked successfully'];
        }
    }


    public function getAllSeats()
    {
        // Fetch the 'seats' column from the database
        $query = $this->db->table('bookings') // Replace with your table name
                          ->select('seats')
                          ->get()
                          ->getResultArray();
    
        log_message('info', 'Query Result: ' . json_encode($query));
    
        $selectedSeats = [];
    
        // Loop through the results and split the string by commas
        foreach ($query as $row) {
            log_message('info', 'Raw Seats Data: ' . $row['seats']);
            
            // Split the string by commas into an array
            $seats = explode(',', $row['seats']);
            
            // Merge the seats into the final array
            if (is_array($seats)) {
                $selectedSeats = array_merge($selectedSeats, $seats);
            }
        }
    
        log_message('info', 'Final Selected Seats: ' . json_encode($selectedSeats));
        return $selectedSeats;
    }
    
    
}
