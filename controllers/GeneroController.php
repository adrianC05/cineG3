<?php

namespace app\controllers;

use app\models\Genero;
use app\models\GeneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GeneroController implements the CRUD actions for Genero model.
 */
class GeneroController extends Controller
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
     * Lists all Genero models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GeneroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Genero model.
     * @param int $GEN_ID Gen ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($GEN_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($GEN_ID),
        ]);
    }

    /**
     * Creates a new Genero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Genero();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'GEN_ID' => $model->GEN_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Genero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $GEN_ID Gen ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($GEN_ID)
    {
        $model = $this->findModel($GEN_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'GEN_ID' => $model->GEN_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Genero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $GEN_ID Gen ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($GEN_ID)
    {
        $this->findModel($GEN_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Genero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $GEN_ID Gen ID
     * @return Genero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($GEN_ID)
    {
        if (($model = Genero::findOne(['GEN_ID' => $GEN_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
