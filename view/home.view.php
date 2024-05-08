<?php

use controller\Productos;
?>
<div class="contaier mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Tabla productos</h1>
            <!-- <p><?= print_r($datos) ?></p> -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">marca</th>
                        <th scope="col">precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($datos as $producto) : ?>
                        <td><?= $producto['id_producto'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['marca'] ?></td>
                        <td><?= $producto['precio'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>