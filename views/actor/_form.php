<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sexo;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Actor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SEX_ID')->dropDownList(
        ArrayHelper::map(Sexo::find()->all(),'SEX_ID','SEX_NOMBRE'),
        ['prompt'>='Seleccione…']) ?>

    <?= $form->field($model, 'ACT_NOMBRE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
