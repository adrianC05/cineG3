<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SocioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="socio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SOC_ID') ?>

    <?= $form->field($model, 'SOC_CEDULA') ?>

    <?= $form->field($model, 'SOC_NOMBRE') ?>

    <?= $form->field($model, 'SOC_DIRECCION') ?>

    <?= $form->field($model, 'SOC_TELEFONO') ?>

    <?php // echo $form->field($model, 'SOC_CORREO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
