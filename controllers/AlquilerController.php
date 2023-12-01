<?php

namespace app\controllers;

use app\models\Alquiler;
use app\models\AlquilerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlquilerController implements the CRUD actions for Alquiler model.
 */
class AlquilerController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Alquiler models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlquilerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alquiler model.
     * @param int $ALQ_ID Alq ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ALQ_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ALQ_ID),
        ]);
    }

    /**
     * Creates a new Alquiler model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alquiler();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ALQ_ID' => $model->ALQ_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alquiler model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ALQ_ID Alq ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ALQ_ID)
    {
        $model = $this->findModel($ALQ_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ALQ_ID' => $model->ALQ_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alquiler model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ALQ_ID Alq ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ALQ_ID)
    {
        $this->findModel($ALQ_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alquiler model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ALQ_ID Alq ID
     * @return Alquiler the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ALQ_ID)
    {
        if (($model = Alquiler::findOne(['ALQ_ID' => $ALQ_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
