<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View All Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-index">

    <p>
        <?= Html::a('Download Result', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="card card-primary card-outline">
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'html',
                        'label' => 'Full Name(NRIC)',
                        'value' => function($model){
                            return $model->can_name.'<br/>'.$model->username;
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Department / Batch',
                        'value' => function($model){
                            return $model->department.'<br/>'.$model->batch->bat_text;
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function($model){
                            return $model->statusText;
                        }
                    ],
                    [
                        'attribute' => 'finished_at',
                        'value' => function($model){
                            if($model->finished_at){
                                return date('d M Y h:i:s', $model->finished_at);
                            }
                            else{
                                return "-";
                            }
                        }
                    ],                   

                ],
            ]); ?>

        </div>
    </div>


</div>
