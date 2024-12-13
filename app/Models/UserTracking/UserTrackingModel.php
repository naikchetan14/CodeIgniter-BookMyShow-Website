<?php

namespace App\Models\UserTracking;

use CodeIgniter\Model;

class UserTrackingModel extends Model
{
    protected $table            = 'user_tracking';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userID', 'login_time', 'logout_time', 'date'];

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

    public function AddLoginTrackingTime($data)
    {
        return $this->db->table('user_tracking')->insert($data);
    }

    public function updateLogoutTime($userID, $logoutTime)
    {
        // Update the logout time for the user session
        return $this->db->table('user_tracking')
            ->where('userID', $userID)
            ->update(['logout_time' => $logoutTime]);
    }
}
