<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use common\models\Common;
use yii\helpers\ArrayHelper;
use backend\models\Batch;
use kartik\export\ExportMenu;
use richardfan\widget\JSRegister;
use yii\widgets\ActiveForm;
use backend\assets\ExcelAsset;

ExcelAsset::register($this); 
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
    <input type="file" id="xlf" style="display:none;" />
    <button type="button" id="btn-importexcel" class="btn btn-info "><span class="fa fa-upload"></span> IMPORT CANDIDATES </button>
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
                'label' => 'DOWNLOAD TEMPLATE',
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
                    if($model->answer){
                        return $model->answer->column1;
                    }
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column2 ,
                'value' => function($model){
                    if($model->answer){
                        return $model->answer->column2;
                    }
                }
            ],
            [
                'format' => 'raw',
                'header' =>  $batch->column3 ,
                'value' => function($model){
                    if($model->answer){
                        return $model->answer->column3;
                    }
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

<div class="modal" id="loadingModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body" align="center">
        <h3>LOADING DATA...</h3>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $form = ActiveForm::begin(['id' => 'form-candidate']); ?>
  <input type="hidden" id="json_candidate" name="json_candidate">
<?php ActiveForm::end(); ?> 

<?php JSRegister::begin(); ?>
<script>

$("#btn-importexcel").click(function(){
    document.getElementById("xlf").click();     
});


var X = XLSX;
  
  function fixdata(data) {
    var o = "", l = 0, w = 10240;
    for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
    o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(l*w)));
    return o;
  }
  
  function to_jsObject(workbook) {
    var result = {};
    workbook.SheetNames.forEach(function(sheetName) {
      var roa = X.utils.sheet_to_json(workbook.Sheets[sheetName], {header:1});
      if(roa.length) result[sheetName] = roa;
    });
    return result;

  }

  var xlf = document.getElementById('xlf');
  
  function handleFile(e) {
    var str;
    var row;
    var files = e.target.files;
    var f = files[0];
  
      var reader = new FileReader();
      reader.onload = function(e) {
        var data = e.target.result;
        var wb;
        var arr = fixdata(data);
          wb = X.read(btoa(arr), {type: 'base64'});
          // console.log(to_jsObject(wb)); 
          var obj = to_jsObject(wb) ;
          for (var key in obj) {
            var sheet = obj[key];
            var i = 1;
            var myJSON = JSON.stringify(sheet);
            console.log(myJSON);

            $("#json_candidate").val(myJSON);
            $('#loadingModal').modal({
               backdrop: 'static',
               keyboard: false,
               show: true
            });
            $("#form-candidate").submit();
            break;
          }
          
      };
      reader.readAsArrayBuffer(f);
    
    
  }

  if(xlf.addEventListener){
  
  xlf.addEventListener('change', handleFile, false);

  }

</script>
<?php JSRegister::end(); ?>