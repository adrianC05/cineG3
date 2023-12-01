<?php

namespace app\controllers;

use app\models\Pelicula;
use app\models\PeliculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeliculaController implements the CRUD actions for Pelicula model.
 */
class PeliculaController extends Controller
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
     * Lists all Pelicula models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeliculaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pelicula model.
     * @param int $PEL_ID Pel ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PEL_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PEL_ID),
        ]);
    }

    /**
     * Creates a new Pelicula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pelicula();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PEL_ID' => $model->PEL_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pelicula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $PEL_ID Pel ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PEL_ID)
    {
        $model = $this->findModel($PEL_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PEL_ID' => $model->PEL_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelicula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $PEL_ID Pel ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PEL_ID)
    {
        $this->findModel($PEL_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pelicula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $PEL_ID Pel ID
     * @return Pelicula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PEL_ID)
    {
        if (($model = Pelicula::findOne(['PEL_ID' => $PEL_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
