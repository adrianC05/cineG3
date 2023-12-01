<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Formato $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="formato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FOR_NOMBRE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
