<?php

namespace backend\controllers;

use Yii;
use common\models\Delicate;
use common\models\Position;
use common\models\Vote;
use common\models\DelicateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\VoteSearch;
use common\models\PositionSearch;

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
       // $dataProvider->query->groupBy(['ncc_id']);
           $dataProvider->sort = ['defaultOrder' => ['delicate_id' => 'DESC']]; 

           
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
         
        ]);
    }

     public function actionDelicate($ncc_id)
    {
        $searchModel = new DelicateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 
        $dataProvider->query->andFilterWhere(['ncc_id'=>$ncc_id]);
        $modelPositions = Position::find()->all();

           
        return $this->render('delicates', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ncc_id'=>$ncc_id,
            'modelPositions'=>$modelPositions,
         
        ]);
    }




   

    public function actionVote($id)
    {
        $searchModel = new VoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $dataProvider->query->andFilterWhere(['delicate_id'=>$id]);

        return $this->render('vote', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'model' => $this->findModel($id),

        ]);
    }

    public function actionSummary()
    {
        // $modelDelicates = Delicate::find()->all();
        // $modelPositions = Position::find()->all();

        return $this->render('summary', [
            // 'modelDelicates' => $modelDelicates,
            // 'modelPositions' => $modelPositions,
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
        $modelVotes = Vote::find()->where(['delicate_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelVotes' => $modelVotes,
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
        $modelVote = new Vote();

        // $modelVode = new Vote();
        $modelPositions = Position::find()
                            // ->joinWith('candidate')
                            ->all();

        if ($model->load(Yii::$app->request->post())) {
            
            // print_r($_POST['candidate']);
            // die;
             $img = UploadedFile::getInstance($model, 'photo');

            if($img != null) {
                $filename = rand().'.'.$img->extension;
                $img->saveAs(Yii::getAlias('@root').'/public/img/'. $filename);
                $model->photo = $filename;
            }
            $model->created_at = date('Y-m-d H:i:s');
            $model->recommender_id = Yii::$app->user->id;
          
             if($model->save(false)) {
                 // if($_POST['candidate']){
                 //    foreach($_POST['candidate'] as $candidate){
                 //        //put transaction commit
                 //        $modelVote = new Vote();
                 //        $modelVote->delicate_id = $model->delicate_id;
                 //        $modelVote->candidate_id = $candidate;
                 //        $modelVote->save(false);

                 //    }
                 // }
                Yii::$app->session->setFlash('success', "The data was created successfully.");
            return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelPositions' => $modelPositions
            //'modelVote' = $modelVote
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

       public function actionUpdateVote($id)
    {
        $model = $this->findModel($id);
           $modelPositions = Position::find()
                            // ->joinWith('candidate')
                            ->all();
       $image = $model->photo;

        if ($model->load(Yii::$app->request->post())) {
 

            $model->recommender_id = Yii::$app->user->id;
            if($model->save(false)) {
                 if($_POST['candidate']){
                    foreach($_POST['candidate'] as $candidate){
                        //put transaction commit
                        $modelVote = new Vote();
                        $modelVote->delicate_id = $id;
                        $modelVote->candidate_id = $candidate;
                        $modelVote->save(false);

                    }
                 }
                Yii::$app->session->setFlash('success', "The data was created successfully.");
            return $this->redirect(['vote?id='.$id]);
            }
        }

        return $this->render('vote_form', [
            'model' => $model,
            'modelPositions' => $modelPositions

        ]);
    }

    public function actionCsv(){
        $fileName = "Export.xls";
        
        $myfile = fopen($fileName, "w");

        header('Content-Encoding: UTF-8'); // vilh, change to UTF-8!
        header("Content-type: application/x-msexcel; charset=utf-8");
        //header('Content-type: text/plain');
        header("Content-Disposition: attachment; filename=$fileName");
        $modelDelicates = Delicate::find()->all();
        $modelPositions = Position::find()->all();

        $txt .=  "S.N.,Delicate Name,Ncc,Political Background,Phone,Email,Recommender,";

      foreach($modelPositions as $modelPosition)
      {
        $txt .= $modelPosition->title.",";
                

     }
     $txt.=",\r\n";
     echo $txt;

      $sn = 1;  
    foreach($modelDelicates as $modelDelicate){
            $delicate_name = $modelDelicate->name;
            $ncc = $modelDelicate->ncc->title;
            $political = $modelDelicate->political_background;
            $phone = $modelDelicate->phone;
            $email = $modelDelicate->email;
            $recommender_name = $modelDelicate->recommender->full_name;
            $txt = "$sn,$delicate_name, $ncc,$political,$phone,$email,$recommender_name,";

           foreach($modelPositions as $modelPosition)
               {
                foreach($modelDelicate->votes as $modelVote){
                    if($modelVote->candidate->position_id == $modelPosition->position_id)
                         $txt1 .= $modelVote->candidate->name;
                }

             
            }

          //  fwrite($myfile, $txt);
          echo $txt.$txt1."\r\n";
            $sn++;
        }


       
        fclose($myfile);

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
