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

    public function changestatus($status=0){
        $batch = $session->get('batch');
        $user_id = Yii::$app->user->identity->id;

        // Answer::setStatus($status, $user->id);
        Answer::updateAll(['can_id' => $user_id, 'bat_id' => $batch], ['answer_status' => $status]);
        Answer::processOverallStatus($status, 1, $user, $batch);
    }

    public function submit($last=1)
    {
        TestModel::saveAllAnswers($last);
    }

    // public static function setStatus($status,$user)
    // {
    //     $database = DatabaseFactory::getFactory()->getConnection();
    //     $sql = "UPDATE users
    //         SET answer_status = :status
    //         WHERE user_id = :user ;";
    //     $query = $database->prepare($sql);
    //     $query->execute(array(':status'=>$status,':user'=>$user));
    //     self::processOverallStatus($status, 1, $user);
    // }
    
}
