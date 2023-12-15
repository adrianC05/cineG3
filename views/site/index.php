<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

?>
<div class="container">

    <h1 class="text-center p-4">Peliculas Disponibles</h1>


    <div class="pb-4">
        <img src="uploads/1.jpg" class="img-fluid rounded" alt="">
    </div>

    <div class="card-group m-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title"><?= count($listaPelicula) ?></h4>
                <p class="card-text">Películas</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title"><?= count($listaFormato) ?></h4>
                <p class="card-text">Formatos</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title"><?= count($listaGenero) ?></h4>
                <p class="card-text">Generos</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title"><?= count($listaAlquiler) ?></h4>
                <p class="card-text">Total de Alquileres</p>
            </div>
        </div>



    </div>


    <div class="row">
        <?php

        foreach ($listaPelicula as $pelicula) : ?>

            <div class="col-md-6">
                <div class="card bg-dark text-white m-3">
                    <div class="row no-gutters">

                        <div class="">
                            <div class="card-body">
                                <h5 class="card-title"><?= Html::encode("{$pelicula->PEL_NOMBRE}") ?></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Fecha de Estreno: <?= Html::encode("{$pelicula->PEL_FECHA_ESTRENO}") ?></p>
                                <a href="<?= Yii::$app->urlManager->createUrl(['pelicula/view', 'PEL_ID' => $pelicula->PEL_ID]) ?>" class="btn btn-primary">Ver Pelicula</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endforeach; ?>

    </div>
    <hr>
    <form class="p-3 bg-secondary" style="--bs-bg-opacity: .1;">
        <h2 class="text-center"><strong>Registro</strong></h2>
        <div style="padding: 0 15% 0 15%;">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">¿Aceptas nuestros terminos?</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>

    </form>



</div>
<hr>

<footer class="text-center mt-5">
    <div class="">
        <h5 class="">Nuestras redes Sociales</h5>
        <!-- Facebook -->
        <i class="fab fa-facebook-f fa-2x mx-2"></i>

        <!-- Twitter -->
        <i class="fab fa-twitter fa-2x mx-2"></i>

        <!-- Google -->
        <i class="fab fa-google fa-2x mx-2"></i>

        <!-- Instagram -->
        <i class="fab fa-instagram fa-2x mx-2"></i>

        <!-- Linkedin -->
        <i class="fab fa-linkedin-in fa-2x mx-2"></i>

        <!-- Pinterest -->
        <i class="fab fa-pinterest fa-2x mx-2"></i>
    </div>
</footer>

<!-- Asegúrate de tener FontAwesome cargado en tu proyecto -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
