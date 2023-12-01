<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Socio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="socio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SOC_CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SOC_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SOC_DIRECCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SOC_TELEFONO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SOC_CORREO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
