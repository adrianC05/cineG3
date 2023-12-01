<?php

namespace app\controllers;

use app\models\Formato;
use app\models\FormatoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormatoController implements the CRUD actions for Formato model.
 */
class FormatoController extends Controller
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
     * Lists all Formato models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FormatoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formato model.
     * @param int $FOR_ID For ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($FOR_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($FOR_ID),
        ]);
    }

    /**
     * Creates a new Formato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Formato();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'FOR_ID' => $model->FOR_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Formato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $FOR_ID For ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($FOR_ID)
    {
        $model = $this->findModel($FOR_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'FOR_ID' => $model->FOR_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Formato model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $FOR_ID For ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($FOR_ID)
    {
        $this->findModel($FOR_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Formato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $FOR_ID For ID
     * @return Formato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($FOR_ID)
    {
        if (($model = Formato::findOne(['FOR_ID' => $FOR_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
