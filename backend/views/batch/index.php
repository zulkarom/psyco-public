<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Batch;
use common\models\Common;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-index">

    <p>
        <?= Html::a('<span class="fa fa-plus"></span> NEW BATCH', ['/batch/create'], ['class' => 'btn btn-success']);?>
    </p>

    <div class="card card-primary card-outline">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'format' => 'html',
                    'attribute' => 'bat_text',
                    'filter' => Html::activeDropDownList($searchModel, 'bat_text', ArrayHelper::map(Batch::find()->all(),'id', 'bat_text'), ['class'=> 'form-control','prompt' => 'Select Batch']),
                    'value' => function($model){
                        return $model->bat_text; 
                    }
                ], 
                [
                    'format' => 'html',
                    'attribute' => 'bat_show',
                    'filter' => Html::activeDropDownList($searchModel, 'bat_show', Common::showing() ,['class'=> 'form-control','prompt' => 'Select']),
                    'value' => function($model){
                        return $model->showText;
                    }
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 25%'],
                    'template' => '{view} {update} {participant}',
                    //'visible' => false,
                    'buttons'=>[
                        'view'=>function ($url, $model) {
                            return Html::a('<span class="fa fa-eye"></span> VIEW',['/batch/view', 'id' => $model->id],['class'=>'btn btn-info btn-sm']);
                        },
                        'update'=>function ($url, $model) {
                            return Html::a('<span class="fa fa-pencil"></span> UPDATE',['/batch/update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                        },
                        'participant'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span> PARTICIPANTS',['/batch/view-candidates', 'bat_id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                        }
                    ],
                
                ],  
            ],
        ]); ?>
    </div>
</div>


</div>
