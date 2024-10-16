<?php 
namespace App\Controllers;

use App\Commons\Controller;
use App\Models\UserModel;
use Exception;
class RegisterController extends Controller {
    private $repository;

    public function __construct()
    {
        $this->repository = new UserModel();
    }

    public function register(){
        if (isset($_POST['submit'])) {
            try {
                $registered = $this->repository->register($_POST);
                if ($registered) {
                    header("Location: /login");
                    exit;
                } else {
                    $this->view('views/register', ['message' => 'Échec de l\'enregistrement']);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $this->view('views/register', ['message' => 'Veuillez vous enregistrer']);
        }
    }
    

    public function homeId($id){
        var_dump("Hello i am the /home/$id controller");
    }
}