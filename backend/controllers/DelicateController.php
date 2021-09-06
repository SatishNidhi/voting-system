<?php

namespace backend\controllers;

use Yii;
use common\models\Delicate;
use common\models\DelicateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DelicateController implements the CRUD actions for Delicate model.
 */
class DelicateController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Delicate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DelicateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Delicate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Delicate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Delicate();

        if ($model->load(Yii::$app->request->post())) {
             $img = UploadedFile::getInstance($model, 'photo');

            if($img != null) {
                $filename = rand().'.'.$img->extension;
                $img->saveAs(Yii::getAlias('@root').'/public/img/'. $filename);
                $model->photo = $filename;
            }
            $model->created_at = date('Y-m-d H:i:s');
            $model->recommender_id = Yii::$app->user->id;
          
             if($model->save(false)) {
                Yii::$app->session->setFlash('success', "The data was created successfully.");
            return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Delicate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       $image = $model->photo;

        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'photo');
    
            if($img != null) {
                $filename = rand().'.'.$img->extension;
                $img->saveAs(Yii::getAlias('@root').'/public/img/product/'. $filename);
                $model->photo = $filename;

                if($image != null) {
                    // delete old file
                    unlink(Yii::getAlias('@root').'/public/img/product/'.$image);
                }

            } else { 
                $model->photo = $image;
            }

            $model->recommender_id = Yii::$app->user->id;
            if($model->save(false)) {
                Yii::$app->session->setFlash('success', "The data was updated successfully.");
            return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Delicate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Delicate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Delicate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Delicate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
