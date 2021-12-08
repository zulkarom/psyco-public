<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use common\models\Common;
use yii\helpers\ArrayHelper;
use backend\models\Batch;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CandidateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Candidates';
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $batch->bat_text, 'url' => ['view', 'id' => $batch->id]];
$this->params['breadcrumbs'][] = $this->title;

$columns = [
          
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'attribute' => 'can_name',
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'username',
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column1 ,
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column2 ,
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column3 ,
                'value' => function($model){
                    return "";
                }
            ],
            

        ];

?>

<h4><?= $batch->bat_text?></h4>

<div class="bttn-arrange">  
    <?php echo Html::button('<span class="fa fa-upload"></span> UPLOAD CANDIDATES', ['value' => Url::to(['/batch/upload-candidates']), 'class' => 'btn btn-success', 'id' => 'modalBttnUpload']);

        $this->registerJs('
            $(function(){
              $("#modalBttnUpload").click(function(){
                  $("#upload").modal("show")
                    .find("#formUpload")
                    .load($(this).attr("value"));
              });
            });

           
        ');

        Modal::begin([
                'title' => '<h4>Upload Candidates</h4>',
                'id' =>'upload',
                'size' => 'modal-lg'
            ]);

        echo '<div id="formUpload"></div>';

        Modal::end();
    ?>
   &nbsp
    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'columnSelectorOptions'=>[
                'label' => 'Columns',
                'class' => 'btn btn-danger',
                'style'=> 'display:none;', 
            ],
            'fontAwesome' => true,
            'dropdownOptions' => [
                'label' => 'EXPORT TEMPLATE',
                'class' => 'btn btn-danger',
                'style'=> 'color:white;',
            ],
            'filename' => $batch->bat_text.'-Batch Template',
            'clearBuffers' => true,
            
            'exportConfig' => [
                ExportMenu::FORMAT_EXCEL_X => false,
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
            ],
        ]);
    ?> 
</div>
<br/>

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
                    return Html::a($model->can_name.'<span class="glyphicon glyphicon-pencil"></span>', ['/candidate/update', 'id' => $model->id], ['class' => 'modalBttnUptCandidate']);
                }
            ],
            'username',
            [
                'format' => 'raw',
                'header' =>  $batch->column1 ,
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column2 ,
                'value' => function($model){
                    return "";
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column3 ,
                'value' => function($model){
                    return "";
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{delete}',
                //'visible' => false,
                'buttons'=>[
                    'delete'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span> Delete',['individual-result', 'id' => $model->id],['class'=>'btn btn-danger btn-sm']);
                    },
                ],
            
            ],
        ],
    ]); ?>

</div>
</div>


</div>