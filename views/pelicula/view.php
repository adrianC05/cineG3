<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */

$this->title = $model->PEL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pelicula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PEL_ID' => $model->PEL_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PEL_ID' => $model->PEL_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PEL_ID',
            [
                'label' => 'Actor',
                'value' => $model->gEN->GEN_NOMBRE,
            ],
            [
                'label' => 'Director',
                'value' => $model->dIR->DIR_NOMBRE,
            ],
            [
                'label' => 'Formato',
                'value' => $model->fOR->FOR_NOMBRE,
            ],
            'PEL_NOMBRE',
            'PEL_COSTO',
            'PEL_FECHA_ESTRENO',
            [
                'label' => 'Imagen',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img($model->PEL_IMAGEN, ['alt' => 'Imagen', 'width' => 100, 'height' => 100, 'class' => 'img-thumbnail']);
                }
            ],
        ],
    ]) ?>

</div>