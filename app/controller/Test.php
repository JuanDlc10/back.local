<?php

namespace controller;
use config\View;
use model\TablaProductos;

require_once realpath('./vendor/autoload.php');

class Test extends View{
    public function index() {
        $consulta = new TablaProductos;
        $datos = $consulta->consulta()->all();
        return parent::vista('home', $datos);
    }
    public function prueba(){
        echo "desde prueba";
    }
}
$controlador = new Test();
?>