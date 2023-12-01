<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Director $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="director-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DIR_NOMBRE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
