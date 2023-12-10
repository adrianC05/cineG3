<?php

namespace app\controllers;

use app\models\Pelicula;
use app\models\PeliculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile; // Adjunta archivos
use yii\data\Pagination; // Agregar paginación    
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

        $this->subirImagen($model); // Le pasaremos toda la informacion al modelo y el se encargara de subir la imagen

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

        $this->subirImagen($model); // Le pasaremos toda la informacion al modelo y el se encargara de subir la imagen

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
        $model = $this->findModel($PEL_ID); // Almacenamos la información del registro en la variable $model

        if (file_exists($model->PEL_IMAGEN)) // Verificamos si el archivo existe
        {
            unlink($model->PEL_IMAGEN); // Eliminamos el archivo
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    // List of all Pelicula models.
    public function actionList()
    {
        $model = Pelicula::find();

        // add pagination
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $model->count(),
        ]);

        // Order the results by name
        $peliculas = $model->orderBy('PEL_NOMBRE')
            ->offset($pagination->offset) // Range of data displayed
            ->limit($pagination->limit) // Number of data per page
            ->all();

        //Returning the view
        return $this->render('list', [
            'peliculas' => $peliculas,
            'pagination' => $pagination,
        ]);
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

    // Upload image
    protected function subirImagen(Pelicula $model)
    {
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->ARCHIVO = UploadedFile::getInstance($model, 'ARCHIVO'); // Obtenemos la instancia del archivo

                //Validamos que el archivo exista y sea valido
                if ($model->validate()) {

                    // Guardamos el archivo en la carpeta uploads
                    if ($model->ARCHIVO) {

                        // Eliminamos el archivo anterior
                        if (file_exists($model->PEL_IMAGEN)) // Verificamos si el archivo existe
                        {
                            unlink($model->PEL_IMAGEN); // Eliminamos el archivo
                        }

                        // Creamos la ruta donde se guardara el archivo
                        $rutaArchivo = 'uploads/' . time() . '_' . $model->ARCHIVO->baseName . '.' . $model->ARCHIVO->extension; // Creamos la ruta donde se guardara el archivo

                        // Guardamos el archivo nuevo
                        if ($model->ARCHIVO->saveAs($rutaArchivo)) { // Guardamos el archivo
                            $model->PEL_IMAGEN = $rutaArchivo; // Guardamos la ruta en el campo de la base de datos
                        }
                    }
                }
                // Guardamos el registro en la base de datos
                if ($model->save(false)) {
                    return $this->redirect(['index']); // Redireccionamos a la vista index
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    }
}
