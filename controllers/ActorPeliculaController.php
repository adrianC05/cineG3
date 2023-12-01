<?php

namespace app\controllers;

use app\models\ActorPelicula;
use app\models\ActorPeliculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActorPeliculaController implements the CRUD actions for ActorPelicula model.
 */
class ActorPeliculaController extends Controller
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
     * Lists all ActorPelicula models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ActorPeliculaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActorPelicula model.
     * @param int $APL_ID Apl ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($APL_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($APL_ID),
        ]);
    }

    /**
     * Creates a new ActorPelicula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ActorPelicula();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'APL_ID' => $model->APL_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ActorPelicula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $APL_ID Apl ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($APL_ID)
    {
        $model = $this->findModel($APL_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'APL_ID' => $model->APL_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ActorPelicula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $APL_ID Apl ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($APL_ID)
    {
        $this->findModel($APL_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActorPelicula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $APL_ID Apl ID
     * @return ActorPelicula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($APL_ID)
    {
        if (($model = ActorPelicula::findOne(['APL_ID' => $APL_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
