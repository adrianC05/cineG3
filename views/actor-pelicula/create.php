<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ActorPelicula $model */

$this->title = 'Create Actor Pelicula';
$this->params['breadcrumbs'][] = ['label' => 'Actor Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-pelicula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
