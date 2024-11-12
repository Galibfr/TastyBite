<?php
namespace App\Models;

use App\Commons\Model;
use PDO;
use PDOException;

class ProductModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDishes() {
        try {
            $query = $this->db->query("SELECT * FROM dish");
            $dishes = $query->fetchAll(PDO::FETCH_ASSOC);
            return $dishes;
        } catch (PDOException $e) {
            // Log the exception or handle it
            return [];
        }
    }

    public function getDishById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM dish WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the exception or handle it
            return null;
        }
    }
}
