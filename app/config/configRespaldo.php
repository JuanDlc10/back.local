<?php

namespace config;

use controller\Login;

class Config
{
    private const SERVER = "http://127.0.0.1/BackEnd/";
    private const DEP_IMG = self::SERVER . "/public/img/";
    private const DEP_JS = self::SERVER . "/public/js/";
    private const DEP_CSS = self::SERVER . "/public/css/";
    private const ERROR = "view/error.view.php";
    private $controller;
    private $method;
    private $routes = [];
    private $ruta2 = [];
    private $importacion;

    public function __construct() {
        $this->importacion;
    }

    public function get($ruta, $metodo) {
        $ruta_final = trim($ruta , "/");
        $this->routes['GET'][$ruta_final] = $metodo;
    }
    public function put($ruta, $metodo) {
        $ruta_final = trim($ruta , "/");
        $this->routes['PUT'][$ruta_final] = $metodo;
    }
    public function post($ruta, $metodo) {
        $ruta_final = trim($ruta , "/");
        $this->routes['POST'][$ruta_final] = $metodo;
    }
    public function delete($ruta, $metodo) {
        $ruta_final = trim($ruta , "/");
        $this->routes['DELETE'][$ruta_final] = $metodo;
    }

    public static function verificar_sesion()
    {
        if (!isset($_SESSION['usuario_id'])) {
            self::redirigir('login');
            exit;
        }
    }
    public function match_route($ruta, $method)
    {
        if (preg_match('/[a-zA-Z0-9_-]\/[a-zA-Z0-9_-]/',$ruta)) {
            $this->ruta2 = explode('/',$ruta);
            $this->controller = array_key_exists($this->ruta2[1],$this->routes[$method]) ? $this->routes[$method][$this->ruta2[1]] : self::ERROR;
        }else {
            $this->controller = array_key_exists($ruta,$this->routes[$method]) ? $this->routes[$method][$ruta] : self::ERROR;
        }
        $this->method = $this->controller[1];
        require_once './app/controller/'. $this->controller[0].'.php';
        $this->importacion = $controlador;
    }

    public function run()
    {
        $ruta = $_SERVER['REQUEST_URI'];
        $ruta = trim($ruta, '/') == "backend" ? 'home': trim($ruta, '/');

        $this->match_route($ruta,$_SERVER['REQUEST_METHOD']);
        //$controll = new $this->controller[0]();
        $metodo = $this->method;
        $this->importacion->$metodo();

    }


    public static function redireccion($ruta)
    {
        $ruta_completa = SERVER . '/' . $ruta;
        return $ruta_completa;
    }
    static function dep($archivo)
    {
        return self::DEP_JS . $archivo;
    }
    public static function redirigir($ruta)
    {
        echo '
            <script>
                window.location="' . self::SERVER . $ruta . '";
            </script>
            ';
    }
    public static function destruir_sesion()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
    }
}
/* Ejemplo de como se usa para redireccion <?=redireccion('login') ?> */