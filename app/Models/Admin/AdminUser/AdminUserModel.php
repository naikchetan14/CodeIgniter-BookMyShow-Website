<?php

namespace App\Models\Admin\AdminUser;

use CodeIgniter\Model;

class AdminUserModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['adminName', 'adminEmail', 'adminPassword'];

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

    public function createAdminAccount($data)
    {
        // Attempt to insert the data into the database
        $isInserted = $this->insert($data, true); // true to return the ID on success

        // Check if the insertion was successful
        if ($isInserted) {
            // Return the newly created record's ID
            return $this->find($isInserted); // Fetch the newly created record
        } else {
            // Return null or false if insertion failed
            return null;
        }
    }
    public function getLoginUser($id)
    {
        return $this->where('id', $id)->find();
    }
}
