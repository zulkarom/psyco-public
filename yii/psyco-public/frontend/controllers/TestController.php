<?php

namespace frontend\controllers;

use Yii;
use backend\models\Answer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Batch;
use backend\models\Question;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class TestController extends Controller
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
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "//main-login";

        $session = Yii::$app->session;
        $batch = $session->get('batch');
        $answer = Answer::find()
        ->where(['bat_id' => $batch, 'can_id' => Yii::$app->user->identity->id])
        ->one();

        $quest = Question::find()->all();
        
        return $this->render('index', [
            'quest' => $quest,
            'answer' => $answer,
        ]); 
    }

    public function actionChangeStatus($status=0){
        $session = Yii::$app->session;
        $batch = $session->get('batch');
        $user_id = Yii::$app->user->identity->id;

        echo $status;
        die();

        // Answer::setStatus($status, $user->id);
        Answer::updateAll(['answer_status' => $status], ['can_id' => $user_id, 'bat_id' => $batch]);
        Answer::processOverallStatus($status, 1, $user_id, $batch);
    }

    public function actionSubmit($last=1)
    {
        $session = Yii::$app->session;
        $batch = $session->get('batch');
        $user = Yii::$app->user->identity->id;

        $time = Yii::$app->request->post('time');
        $qlast = Yii::$app->request->post('qlast');
        $model = Answer::find()
        ->where(['can_id' => $user])
        ->andWhere(['bat_id' => $batch])
        ->one();

        Answer::updateLastSaved($user,$batch,$time,$qlast);

        $total = count(Question::getAllQuestions()); 

        $co = 1;
        for($i=1;$i<=$total;$i++){
            if($i >= $last){
                if($co==1){$c="";}else{$c=", ";}
                // $sql .= $c."q".$i." = :q".$i;
                $q = 'q'.$i;
                $jwb = Yii::$app->request->post($q);
                if($jwb == "" or $jwb == null){
                    $jwb = -1;
                }
                $model->$q = $jwb;
                $co++;
            }
        }
        if(!$model->save()){
            echo 0;                      
        }else{
            $action = Yii::$app->request->post('aksi');
            if ($action ==0){
                Answer::setStatus(3, $user, $batch);
            }
            echo 1;
        }
        
    }
}
