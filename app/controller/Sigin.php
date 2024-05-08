<?php 
namespace controller;

use config\Config;
use model\TablaLogin;
require_once realpath('./vendor/autoload.php');

class Sigin {
    public static function verificar_login()
    {
        $config = new Config();
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email']; 
                $password = $_POST['password']; 
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $usuario = new TablaLogin;
                $datos = $usuario->insercion(['email'=>$email,'password'=>$hashedPassword]);
                if ($datos) {
                    $config->redirigir('/login');

                } else {
                    echo json_encode(["error" => "Nombre de usuario o contraseña incorrectos"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    
}
$controlador = new Sigin();



?>