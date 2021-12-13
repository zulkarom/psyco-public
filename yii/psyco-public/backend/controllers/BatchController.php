<?php

namespace backend\controllers;

use Yii;
use backend\models\Batch;
use backend\models\Answer;
use backend\models\BatchSearch;
use backend\models\Candidate;
use backend\models\BatchCandidateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BatchController implements the CRUD actions for Batch model.
 */
class BatchController extends Controller
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
     * Lists all Batch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewCandidates($bat_id)
    {
        $searchModel = new BatchCandidateSearch();
        $searchModel->bat_id = $bat_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $batch = $this->findModel($bat_id);


        if(Yii::$app->request->post()){

            $data = Yii::$app->request->post('json_candidate');
            $data = json_decode($data);

            //  echo '<pre>';
            // print_r($data);die(); 

            if($data){
                foreach (array_slice($data,1) as $can) {
                    if(is_array($can) and $can){
                        $checkCan = Candidate::find()->where(['username' => $can[1]])->one();
                        $newAns = new Answer();
                        if($checkCan){
                            $checkAns = Answer::find()->where(['can_id' => $checkCan->id, 'bat_id' => $bat_id])->one();
                            if(!$checkAns){
                                $newAns->can_id = $checkCan->id;
                                $newAns->bat_id = $bat_id;
                                /*foreach((array_slice($data, 0, 1)) as $dt){
                                   $newAns->column1 = $dt[2]; 
                                   $newAns->column2 = $dt[3]; 
                                   $newAns->column3 = $dt[4]; 
                                }*/
                                $newAns->column1 = $can[2]; 
                                $newAns->column2 = $can[3]; 
                                $newAns->column3 = $can[4]; 

                                for($i=1;$i<=120;$i++){
                                    $q = 'q'.$i;
                                    $newAns->$q = '-1';
                                }
                                if(!$newAns->save()){
                                    
                                }
                            }
                        }else{
                            
                            // if(!$checkAns){
                                $new = new Candidate();
                                $new->can_name = $can[0];
                                $new->username = $can[1];
                                $new->can_batch = $batch->id;

                                if($new->save()){
                                    $newAns->can_id = $new->id;
                                    $newAns->bat_id = $bat_id;
                                    $newAns->column1 = $can[2]; 
                                    $newAns->column2 = $can[3]; 
                                    $newAns->column3 = $can[4]; 
                                    for($i=1;$i<=120;$i++){
                                        $q = 'q'.$i;
                                        $newAns->$q = '-1';
                                    }
                                    if(!$newAns->save()){
                                    
                                    }
                                }
                            // }
                        }
                    }
                }
                return $this->redirect(['view-candidates', 'bat_id' => $batch->id]);
            }

        }

        return $this->render('view-candidates', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'batch' => $batch,
        ]);
    }

    /**
     * Displays a single Batch model.
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
     * Creates a new Batch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Batch();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Batch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCreateCandidate($id)
    {
        $model = new Candidate();
        $modelBatch = $this->findModel($id);
        $modelAnswer = new Answer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($model->save()){
                    
                    $modelAnswer->can_id = $model->id;
                    for($i=1;$i<=120;$i++){
                        $q = 'q'.$i;
                        $modelAnswer->$q = '-1';
                    }
                    if($modelAnswer->save()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create-candidate', [
            'model' => $model,
            'modelBatch' => $modelBatch,
            'modelAnswer' => $modelAnswer,
        ]);
    }

    public function actionUpdateCandidate($cid,$bid)
    {
        $model = Candidate::findOne($cid);
        $modelBatch = $this->findModel($bid);
        $modelAnswer = Answer::find()->where(['can_id' => $cid, 'bat_id' => $bid])->one();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) 
                && $modelAnswer->load($this->request->post())) {
                if($model->save()){                    
                    if($modelAnswer->save()){
                        Yii::$app->session->addFlash('success', 'Data Updated');
                        return $this->redirect(['update-candidate', 'cid' => $cid, 'bid' => $bid]);
                    }
                }
            }
        }else {
            $model->loadDefaultValues();
        }

        return $this->render('update-candidate', [
            'model' => $model,
            'modelBatch' => $modelBatch,
            'modelAnswer' => $modelAnswer,
        ]);
    }

    public function actionUploadCandidates()
    {
        // $model = new Candidate();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post())) {
        //         if($model->save()){
        //             $new = new Answer();
        //             $new->can_id = $model->id;
        //             for($i=1;$i<=120;$i++){
        //                 $q = 'q'.$i;
        //                 $new->$q = '-1';
        //             }
        //             if($new->save()){
        //                 return $this->redirect(['view', 'id' => $model->id]);
        //             }
        //         }
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        return $this->renderAjax('upload-candidates', [
            // 'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Batch model.
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
     * Finds the Batch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Batch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Batch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
