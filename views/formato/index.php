<?php

use app\models\Formato;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FormatoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Formatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formato-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Formato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FOR_ID',
            'FOR_NOMBRE',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Formato $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'FOR_ID' => $model->FOR_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
