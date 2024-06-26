<?php

use config\Config;

$config = new Config();

?>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="./public/images/fondo.jpg" class="img-fluid img" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h1>Iniciar sesión</h1>
                <form action="<?=$config->redireccion("validarLogin")?>" method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Correo electronico</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Contraseña</label>
                    </div>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Iniciar sesion</button>

                    <a href="<?=$config->redireccion('sigin') ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">
                        Registrar
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>