<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';

$this->params['breadcrumbs'][] = $this->title;

$columns = [
          
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'label' => 'Full Name(NRIC)',
                'value' => function($model){
                    if($model->candidate){
                        return $model->candidate->can_name.'<br/>('.$model->candidate->username.')';
                    }
                    
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Batch',
                'value' => function($model){
                    return $model->batch->bat_text;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->statusText;
                }
            ],
            [
                'format' => 'raw',
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
        ];
?>

<div class="result-index">

    <div class="row">

        <div class="col-md-10">
            <?= $this->render('_form_search', [
                'model' => $searchModel,
            ]) ?>
        </div>

        <div class="col-md-2">
            <?= Html::a('OVERALL RESULT', ['/result/index', "bat_id" => $searchModel->bat_id, 'type' => 1], ['class' => 'btn btn-info']) ?>
        </div>
    </div>

    

    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'pager' => [
                    'class' => 'yii\bootstrap4\LinkPager',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'others',
                        'label' => 'Name',
                        'value' => function($model){
                        if($model->candidate){
                            return $model->candidate->can_name;
                        }
                            
                        }
                    ],
					[
                        'label' => 'NRIC',
                        'value' => function($model){
                        if($model->candidate){
                            return $model->candidate->username;
                        }
                            
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Batch',
                        'value' => function($model){
                            if($model->batch){
                                return $model->batch->bat_text;
                            }
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

                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 10%'],
                        'template' => '{view}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) use ($batch){
                                return Html::a('<span class="fa fa-eye"></span> VIEW',['/result/individual-result', 'id' => $model->can_id, 'batch_id' => $batch->id],['class'=>'btn btn-info btn-sm']);
                            }
                        ],
                    
                    ],            

                ],
            ]); ?>
        </div>
        </div>
    </div>
</div>


