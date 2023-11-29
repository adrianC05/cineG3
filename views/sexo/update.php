<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sexo $model */

$this->title = 'Update Sexo: ' . $model->SEX_ID;
$this->params['breadcrumbs'][] = ['label' => 'Sexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SEX_ID, 'url' => ['view', 'SEX_ID' => $model->SEX_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sexo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
