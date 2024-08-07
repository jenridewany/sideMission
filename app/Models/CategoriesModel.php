<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description'];

    
    public function getCategoryById($id)
    {
        return $this->find($id);
    }
}