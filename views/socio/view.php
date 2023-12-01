<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Socio $model */

$this->title = $model->SOC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Socios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="socio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'SOC_ID' => $model->SOC_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'SOC_ID' => $model->SOC_ID], [
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
            'SOC_ID',
            'SOC_CEDULA',
            'SOC_NOMBRE',
            'SOC_DIRECCION',
            'SOC_TELEFONO',
            'SOC_CORREO',
        ],
    ]) ?>

</div>
