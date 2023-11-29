<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sexo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sexo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SEX_NOMBRE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
