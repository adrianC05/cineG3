<?php

namespace app\controllers;

use app\models\Socio;
use app\models\SocioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SocioController implements the CRUD actions for Socio model.
 */
class SocioController extends Controller
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
     * Lists all Socio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SocioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Socio model.
     * @param int $SOC_ID Soc ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($SOC_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($SOC_ID),
        ]);
    }

    /**
     * Creates a new Socio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Socio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'SOC_ID' => $model->SOC_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Socio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $SOC_ID Soc ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($SOC_ID)
    {
        $model = $this->findModel($SOC_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'SOC_ID' => $model->SOC_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Socio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $SOC_ID Soc ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($SOC_ID)
    {
        $this->findModel($SOC_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Socio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $SOC_ID Soc ID
     * @return Socio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($SOC_ID)
    {
        if (($model = Socio::findOne(['SOC_ID' => $SOC_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
