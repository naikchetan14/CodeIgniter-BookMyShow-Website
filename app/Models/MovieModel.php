<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table            = 'movies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','genre','duration','release_date','language','director','cast','description','rating','poster_image','created_at','updated_at'];

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




    public function AllMovies(){
        return $this->findAll();
    }

    public function getMovieDetails($id){
        return $this->find($id);
    }
    public function addNewMovieAdmin($data){
        // Set created_at and updated_at to null if you want to explicitly do so
        $data['created_at'] = null; // Optional, as it will be set automatically if useTimestamps is true
        $data['updated_at'] = null;
       $isValid= $this->insert($data);
       if($isValid){
        return ['status' => 'success', 'message' => 'New Movie Added Successfully!'];
       }else{
        return ['status' => 'error', 'message' => 'Failed to add new Movie!'];
       }
    }

    public function bookNewShow($data){

    }

    public function deleteMovie($id){
        $isDeleted= $this->delete($id);
        if($isDeleted){
            return ['status'=> 'success','message'=> 'Movie Deleted Succcessfully!'];
        }else{
            return ['status'=> 'error','message'=> 'Failed To Delete'];
        }
    }

    public function updateMovieDetails($id,$data){
        $isUpdated= $this->update($id,$data);
        if($isUpdated){
            return ['status'=> 'success','message'=> 'Movie Updated Succcessfully!'];
        }else{
            return ['status'=> 'error','message'=> 'Failed To Update'];
        }
    }
}
