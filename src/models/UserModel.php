<?php 
namespace App\Models;

use App\Commons\Model;
use PDO;
use PDOException;

class UserModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    function register($datas = ['name' => '', 'password' => '', 'email' => '']) {
        extract($datas);

        // Validate inputs
        if (empty($name) || empty($email) || empty($password)) {
            return false; // Handle invalid input
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false; // Invalid email format
        }

        try {
            $stmt = $this->db->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            return $stmt->rowCount(); // Return the number of rows affected
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    function login($datas = ['email' => '', 'password' => '']) {
        extract($datas);
    
        // Validate inputs
        if (empty($email) || empty($password)) {
            return false; // Handle invalid input
        }
    
        try {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                // Successful login: return the user information (id, name, etc.)
                return $user; // Return the whole user data
            } else {
                // Incorrect login details
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
}
