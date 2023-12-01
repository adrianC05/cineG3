<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alquiler $model */

$this->title = 'Update Alquiler: ' . $model->ALQ_ID;
$this->params['breadcrumbs'][] = ['label' => 'Alquilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ALQ_ID, 'url' => ['view', 'ALQ_ID' => $model->ALQ_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alquiler-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
