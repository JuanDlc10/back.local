<?php
use config\Config;
$config = new Config();
$config->iniciarSesion();
$config->verificar_sesion();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div>
                <h1 class="text-center">Agregar nuevo usuario :D</h1>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-danger" href="<?= $config->redireccion('usuarios') ?>">Regresar</a>
            </div>
            <form action="<?=$config->redireccion("agregarUsuario")?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-outline-primary">Agregar</button>
            </form>
        </div>
    </div>
</div>