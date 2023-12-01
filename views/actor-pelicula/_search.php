<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ActorPeliculaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actor-pelicula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'APL_ID') ?>

    <?= $form->field($model, 'ACT_ID') ?>

    <?= $form->field($model, 'PEL_ID') ?>

    <?= $form->field($model, 'APL_PAPEL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
