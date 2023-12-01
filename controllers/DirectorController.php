<?php

namespace app\controllers;

use app\models\Director;
use app\models\DirectorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DirectorController implements the CRUD actions for Director model.
 */
class DirectorController extends Controller
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
     * Lists all Director models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DirectorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Director model.
     * @param int $DIR_ID Dir ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($DIR_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($DIR_ID),
        ]);
    }

    /**
     * Creates a new Director model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Director();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'DIR_ID' => $model->DIR_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Director model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $DIR_ID Dir ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($DIR_ID)
    {
        $model = $this->findModel($DIR_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'DIR_ID' => $model->DIR_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Director model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $DIR_ID Dir ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($DIR_ID)
    {
        $this->findModel($DIR_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Director model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $DIR_ID Dir ID
     * @return Director the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($DIR_ID)
    {
        if (($model = Director::findOne(['DIR_ID' => $DIR_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
