<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description', 'user_id', 'category', 'price', 'stock', 'download', 'picture'];
    protected $useTimestamps = true;
    
    public function getProductsWithCategory() {
        return $this->select('products.*, categories.name AS category_name')
                    ->join('categories', 'products.category = categories.id')
                    ->findAll();
    }
    
    public function getProductsWithCategoryUser($id) {
        return $this->select('products.*, categories.name AS category_name')
                    ->join('categories', 'products.category = categories.id')
                    ->where('products.user_id', $id)
                    ->findAll();
    }
}