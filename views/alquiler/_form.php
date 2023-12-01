<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Alquiler $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alquiler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SOC_ID')->textInput() ?>

    <?= $form->field($model, 'PEL_ID')->textInput() ?>

    <?= $form->field($model, 'ALQ_FECHA_DESDE')->textInput() ?>

    <?= $form->field($model, 'ALQ_FECHA_HASTA')->textInput() ?>

    <?= $form->field($model, 'ALQ_VALOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALQ_FECHA_ENTREGA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
