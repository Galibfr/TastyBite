<?php

namespace App\Commons;
use Exception;
use PDO;

abstract class Model {
    private $dbName = 'tasty_bite';
    private $driver = 'mysql';
    private $user = 'root';
    private $password = '';

    protected $db;

    protected function __construct($user='root', $password = '', $driver = 'mysql', $dbName ='tasty_bite', $host = 'localhost'){
            // extract($params);
            $this->dbName = $dbName;
            $this->driver = $driver;
            $this->user = $user;
            $this->password = $password;
            try {
                $this->db = new PDO("$driver:host=$host;dbname=$dbName", $user, $password);
            }catch(Exception $e){
                die("error: ". $e->getMessage());
            }
    }
}