<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AlquilerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alquiler-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ALQ_ID') ?>

    <?= $form->field($model, 'SOC_ID') ?>

    <?= $form->field($model, 'PEL_ID') ?>

    <?= $form->field($model, 'ALQ_FECHA_DESDE') ?>

    <?= $form->field($model, 'ALQ_FECHA_HASTA') ?>

    <?php // echo $form->field($model, 'ALQ_VALOR') ?>

    <?php // echo $form->field($model, 'ALQ_FECHA_ENTREGA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
