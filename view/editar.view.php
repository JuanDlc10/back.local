<?php

use config\Config;
use model\TablaLogin;

$config = new Config();
$config->iniciarSesion();
$config->verificar_sesion();

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div>
                <h1 class="text-center">Editar usuario :O</h1>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-danger" href="<?= $config->redireccion('usuarios') ?>">Regresar</a>
            </div>
            <form action="<?= $config->redireccion("editarUsuario") ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                    <input type="email" id="email" name="email" value="<?= $datos['email'] ?>" class="form-control">
                    <input type="hidden" id="id" name="id" value="<?= $datos['id_login'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <input type="hidden" class="form-control" value="<?= $datos['password'] ?>" id="passwordold" name="passwordold">
                </div>
                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </form>

        </div>
    </div>
</div>