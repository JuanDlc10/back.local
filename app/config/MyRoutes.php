<?php

namespace Config;

use config\Config;

require_once realpath('./vendor/autoload.php');
$router = new Config;

$router->get("/login", ['Login', 'index']);
$router->get("/sigin", ['Login', 'sigin']);
$router->post("/validarLogin", ['Login', 'verificar_login']);
$router->post("/validarRegistro", ['Sigin', 'verificar_login']);
$router->get("/logout", ['Login', 'cerrar_sesion']);

$router->get("/usuarios", ['Usuarios', 'index']);
$router->get("/agregar", ['Usuarios', 'agregar_view']);
$router->post("/agregarUsuario", ['Usuarios', 'agregar']);
$router->get("/editarView", ['Usuarios', 'editar_view']);
$router->post("/editarUsuario", ['Usuarios', 'editar_usuario']);
$router->get("/eliminarUsuario", ['Usuarios', 'eliminar']);


$router->get("/inicio", ['Inicio', 'index']);
$router->get("/test", ['Test', 'index']);

$router->run();


?>