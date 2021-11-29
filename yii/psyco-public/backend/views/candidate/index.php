<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CandidateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Candidates';
$this->params['breadcrumbs'][] = $this->title;

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/views/myasset');
?>

<div class="row">
    <div class="col-2">
        <p>
            <?php echo Html::button('<span class="fa fa-plus"></span> NEW CANDIDATE', ['value' => Url::to(['/candidate/create']), 'class' => 'btn btn-success', 'id' => 'modalBttnCandidate']);

            

            $this->registerJs('
                $(function(){
                  $("#modalBttnCandidate").click(function(){
                      $("#candidate").modal("show")
                        .find("#formCandidate")
                        .load($(this).attr("value"));
                  });
                });

                $("#modalBttnUptCandidate").click(function(){
                  $("#uptCandidate").modal("show")
                    .find("#formUptCandidate")
                    .load($(this).attr("value"));
                });
            ');

            Modal::begin([
                    'title' => '<h4>New Candidate</h4>',
                    'id' =>'candidate',
                    'size' => 'modal-lg'
                ]);

            echo '<div id="formCandidate"></div>';

            Modal::end();

            Modal::begin([
                    'title' => '<h4>Edit Candidate</h4>',
                    'id' =>'uptCandidate',
                    'size' => 'modal-md'
                ]);

            echo '<div id="formUptCandidate"></div>';

            Modal::end();

            ?>
        </p>
    </div>
    <div class="col-4">
        <a href="file/offline.xls" target="_blank">Download Offline Excel Question</a>
    </div>
</div>





<div class="candidate-index">

    <div class="card card-primary card-outline">
        <div class="card-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'attribute' => 'can_name',
                'value' => function($model){
                    return '<a class="modalBttnUptCandidate" href="javascript:void(0)" value="' . Url::to(['/candidate/update', 'id' => $model->id]) . '" >'.$model->can_name .'<span class="fa fa-pencil"></span></a>';

                    // return Html::a($model->can_name.'<span class="glyphicon glyphicon-pencil"></span>', ['/candidate/update', 'id' => $model->id], ['class' => 'modalBttnUptCandidate', 'href' => 'javascript:void(0)']);
                }
            ],
            'username',
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
            
            [
                'attribute' => 'can_batch',
                'value' => function($model){
                    if($model->batch){
                       return $model->batch->bat_text; 
                    }
                }
            ], 
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>


</div>
