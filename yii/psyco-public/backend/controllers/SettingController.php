<?php

namespace backend\controllers;

use backend\models\Setting;
use backend\models\Setting2;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use backend\models\Batch;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
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
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = Setting::findOne(1);
        // $model2 = Setting2::findOne(2);
        $batches = Batch::find()->all();

        if ($model->load(Yii::$app->request->post()) 
            && $batches->load(Yii::$app->request->post())) {

            // echo "<pre>";
            // print_r($batches->load(Yii::$app->request->post()));
            // die();
            // if($model->save()){
            //     if($model2->save()){
            //         Yii::$app->session->addFlash('success', "Setting Updated");
            //         return $this->redirect(['index']);
            //     }
            // }
        }

        return $this->render('index', [
            'model' => $model,
            // 'model2' => $model2,
            'batches' => $batches,
        ]);
    }

    /**
     * Displays a single Setting model.
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

    /**
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateBatch()
    {
        $model = new Batch();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('setting/index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create-batch', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Setting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
