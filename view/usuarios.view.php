<?php

use config\Config;

$config = new Config();
$config->verificar_sesion();

?>

<div class="contaier p-4 mt-4">
    <div class="row justify-content-center">
        <div class="col me-md-3">
            <h1 class="text-center">Bienvenido estas en usuarios</h1>
            <div class="d-flex justify-content-between pd-3">
                <a class="btn btn-outline-success" href="<?= $config->redireccion('agregar') ?>">Agregar</a>
                <a class="btn btn-outline-dark" href="<?= $config->redireccion('logout') ?>">Salir</a>
            </div>
            <table class="mt-5 table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($datos as $usuario) : ?>
                            <td><?= $usuario['id_login'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?= $usuario['password'] ?></td>
                            <td><a href="/editarView/<?= $usuario['id_login']; ?>" class="btn btn-outline-warning">Editar</a></td>
                            <td><a href="/eliminarUsuario/<?= $usuario['id_login']; ?>" class="btn btn-outline-danger">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>