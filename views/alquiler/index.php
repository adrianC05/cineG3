<?php

use app\models\Alquiler;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AlquilerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alquilers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alquiler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alquiler', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ALQ_ID',
            'SOC_ID',
            'PEL_ID',
            'ALQ_FECHA_DESDE',
            'ALQ_FECHA_HASTA',
            //'ALQ_VALOR',
            //'ALQ_FECHA_ENTREGA',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alquiler $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALQ_ID' => $model->ALQ_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
