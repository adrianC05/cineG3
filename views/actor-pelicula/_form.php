<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ActorPelicula $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actor-pelicula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ACT_ID')->textInput() ?>

    <?= $form->field($model, 'PEL_ID')->textInput() ?>

    <?= $form->field($model, 'APL_PAPEL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
