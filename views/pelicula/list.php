<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

?>

<h1>Peliculas Disponibles</h1>

<div class="row">


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($peliculas as $key => $pelicula) : ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>" aria-current="<?= $key === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $key + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($peliculas as $key => $pelicula) : ?>
                <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                    <img src="https://dummyimage.com/720x240/343434/454545.png&text=Image+cap" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= Html::encode("{$pelicula->PEL_NOMBRE}") ?></h5>
                        <p><?= Html::encode("{$pelicula->PEL_FECHA_ESTRENO}") ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <?php foreach ($peliculas as $pelicula) : ?>

        <div class="col-md-6">
            <div class="card bg-dark text-white m-3">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="<?= Html::encode("{$pelicula->PEL_IMAGEN}") ?>" class="card-img h-100" alt="..."> <!-- Agregamos la clase h-100 para establecer la altura al 100% -->
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode("{$pelicula->PEL_NOMBRE}") ?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">Fecha de Estreno: <?= Html::encode("{$pelicula->PEL_FECHA_ESTRENO}") ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>