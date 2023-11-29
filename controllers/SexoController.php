<?php

namespace app\controllers;

use app\models\Sexo;
use app\models\SexoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SexoController implements the CRUD actions for Sexo model.
 */
class SexoController extends Controller
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
     * Lists all Sexo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SexoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sexo model.
     * @param int $SEX_ID Sex ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($SEX_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($SEX_ID),
        ]);
    }

    /**
     * Creates a new Sexo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sexo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'SEX_ID' => $model->SEX_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sexo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $SEX_ID Sex ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($SEX_ID)
    {
        $model = $this->findModel($SEX_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'SEX_ID' => $model->SEX_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sexo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $SEX_ID Sex ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($SEX_ID)
    {
        $this->findModel($SEX_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sexo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $SEX_ID Sex ID
     * @return Sexo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($SEX_ID)
    {
        if (($model = Sexo::findOne(['SEX_ID' => $SEX_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
