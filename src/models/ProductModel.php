<?php
namespace App\Models;

use App\Commons\Model;
use PDO;
class ProductModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    function getAllDishes(){
        $query = $this->db->query("SELECT * FROM dish");
        $dishes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dishes;
    }

    
}