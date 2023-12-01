<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ActorPelicula $model */

$this->title = 'Update Actor Pelicula: ' . $model->APL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Actor Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->APL_ID, 'url' => ['view', 'APL_ID' => $model->APL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actor-pelicula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
