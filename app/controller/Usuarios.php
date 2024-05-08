<?php

namespace controller;

use config\View;
use config\Config;
use model\TablaLogin;

require_once realpath('./vendor/autoload.php');

class Usuarios extends View
{
    public function index()
    {
        $consulta = new TablaLogin();
        $datos = $consulta->consulta()->all();
        return parent::vista('usuarios', $datos);
    }
    public function prueba()
    {
        echo "desde prueba";
    }
    public function agregar_view()
    {
        return parent::vista('agregar');
    }
    public function agregar()
    {
        $config = new Config();
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $usuario = new TablaLogin;
                $datos = $usuario->insercion(['email' => $email, 'password' => $hashedPassword]);
                if ($datos) {
                    $config->redirigir('usuarios');
                } else {
                    echo json_encode(["error" => "Nombre de usuario o contraseña no validos"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public function editar_view($id)
    {
        $consulta = new TablaLogin;
        $datos = $consulta->consulta()->where('id_login', $id)->first();
        return parent::vista('editar', $datos);
    }
    public function editar_usuario()
    {
        $config = new Config();
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_old = $_POST['passwordold'];
                $usuario = new TablaLogin;
                if (empty($password)) {
                    $password = $password_old;
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                }
                $datos = $usuario->actualizar(['email' => $email, 'password' => $password])->where('id_login', $id)->get();
                if ($datos) {
                    $config->redirigir('usuarios');
                } else {
                    echo json_encode(["error" => "Nombre de usuario o contraseña no válidos"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    public function eliminar($id)
    {
        $usuario = new TablaLogin;
        $usuario->eliminar()->where('id_login', $id)->get();
        $this->index();
    }
}
$controlador = new Usuarios();
