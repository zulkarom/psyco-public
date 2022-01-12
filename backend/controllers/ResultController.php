<?php

namespace backend\controllers;

use Yii;
use backend\models\Candidate;
use backend\models\GradeCategory;
use backend\models\Question;
use backend\models\ResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\pdf\pdf_individual;
use backend\models\pdf\pdf_result;
use backend\models\AnalysisDomain;
use backend\models\AnalysisDemographic;
use backend\models\Domain;
use backend\models\Batch;
/**
 * ResultController implements the CRUD actions for Candidate model.
 */
class ResultController extends Controller
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
     * Lists all Candidate models.
     * @return mixed
     */
    public function actionIndex($bat_id)
    {
        $domains = Domain::find()->where(['bat_id' => $bat_id])->all();
        $demos = Demographic::find()->where(['bat_id' => $bat_id])->all();
        $searchModel = new ResultSearch();
        $searchModel->bat_id = $bat_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'domains' => $domains,
            'demos' => $demos,
        ]);
    }

    public function actionAnalysis($id)
    {

        $model = new AnalysisDomain();
        $model2 = new AnalysisDemographic();
        $batch = Batch::findOne($id);
        $model->batch_id = $id;
        $model2->batch_id = $id;

        
        if ($model->load(Yii::$app->request->post()) 
            && $model2->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->saveDomains();
            }
            if ($model2->validate()) {
                $model2->saveColumn1();
                $model2->saveColumn2();
                $model2->saveColumn3();
                $model2->saveColumn4();
            }
            return $this->redirect(['index', 'bat_id' => $id]);
        }
        $model->loadDomains();
        $model2->loadColumn1();
        $model2->loadColumn2();
        $model2->loadColumn3();
        $model2->loadColumn4();

        $items = AnalysisDomain::getAvailableDomain();
        $items2 = AnalysisDemographic::getAvailableColumn1($id);
        $items3 = AnalysisDemographic::getAvailableColumn2($id);
        $items4 = AnalysisDemographic::getAvailableColumn3($id);
        $items5 = AnalysisDemographic::getAvailableColumn4($id);

        return $this->render('analysis', [
            'batch' => $batch,
            'model' => $model,
            'model2' => $model2,
            'items' => $items,
            'items2' => $items2,
            'items3' => $items3,
            'items4' => $items4,
            'items5' => $items5,
        ]);
    }

    

    /**
     * Displays a single Candidate model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionIndividualPdf($id){

        $model = $this->findModel($id);
        $pdf = new pdf_individual;
        $pdf->gcat = GradeCategory::find()->all();
        $pdf->user = $model;
        $pdf->generatePdf();
    }

    public function actionIndividualResult($id){

        $model = $this->findModel($id);
        $gcat = GradeCategory::find()->all();

        return $this->render('individualresult', [
            'user' => $model,
            'gcat' => $gcat,
        ]);
    }

    public function actionResultPdf($id){

        $pdf = new pdf_result;
        $pdf->gcat = GradeCategory::find()->all();
        $pdf->users = Candidate::find()
                    ->alias('a')
                    ->select($this->columResultAnswers())
                    ->joinWith(['batch b', 'answer c'])
                    ->where(['!=' ,'a.id', 1])
                    ->all();

        $pdf->generatePdf();
        exit();
    }

    private function columResultAnswers(){
        $result = GradeCategory::find()->all();
        $colum = ["a.id", "a.username", "a.can_name", "a.department", "a.can_zone", "a.can_batch",  "b.bat_text" ,
        "a.answer_status", "a.overall_status", "a.finished_at"];
        $c=1;
        
        foreach($result as $row){
        if($c==1){$comma="";}else{$comma=", ";}
            $str = "";
            $quest = Question::find()->where(['grade_cat' => $row->id])->all();
            $i=1;
            $jumq = count($quest);
            // echo $jumq;die();
            foreach($quest as $rq){
                if($i == $jumq){$plus = "";}else{$plus=" + ";}
                $str .= "IF(q".$rq->que_id ." > 0,1,0) ". $plus ;
            $i++;
            }
            $str .= " as c". $row->id;
        $c++;  
        $colum[] = $str; 
        }
        return $colum;
    }

    public function actionUploadResult($id){

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('upload-result', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Candidate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Candidate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Candidate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
