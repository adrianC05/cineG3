<?php

use app\models\Sexo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SexoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sexos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sexo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sexo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SEX_ID',
            'SEX_NOMBRE',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sexo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'SEX_ID' => $model->SEX_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
