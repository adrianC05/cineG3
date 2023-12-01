<?php

use app\models\Actor;
use app\models\Pelicula;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ActorPelicula $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actor-pelicula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ACT_ID')->dropDownList(
        ArrayHelper::map(Actor::find()->all(), 'ACT_ID', 'ACT_NOMBRE'),
        ['prompt' >= 'Seleccione…']
    ) ?>

    <?= $form->field($model, 'PEL_ID')->dropDownList(
        ArrayHelper::map(Pelicula::find()->all(), 'PEL_ID', 'PEL_NOMBRE'),
        ['prompt' >= 'Seleccione…']
    ) ?>

    <?= $form->field($model, 'APL_PAPEL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>