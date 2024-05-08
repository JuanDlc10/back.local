<?php

namespace controller;

use config\Config;
use config\View;
use model\TablaLogin;

require_once realpath('./vendor/autoload.php');

class Login extends View
{
    public function index()
    {
        $config = new Config();
        if (isset($_SESSION['usuario_id'])) {
            $config->redirigir('/inicio');
            exit; 
        }
        return parent::vista('login/login');
    }
    public function sigin()
    {
        return parent::vista('login/sigin');
    }
    public static function verificar_login()
{
    session_start();
    $config = new Config();
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usuario = new TablaLogin;
            $datos = $usuario->consulta()->where('email', $email)->first();
            if ($datos) {
                if (password_verify($password, $datos['password'])) {
                    $_SESSION['usuario_id'] = $datos['id_login'];
                    $_SESSION['usuario'] = $datos['email'];
                    $config->redirigir('/usuarios');
                } else {
                    $config->redirigir('/sigin');
                }
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

    public function cerrar_sesion() {
        $config = new Config();
        $config->destruir_sesion();
    }
}

$controlador = new Login();
