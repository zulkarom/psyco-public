<?php
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Common;
use backend\models\Batch;

$month = date('n');

$dftBatch = Batch::find()->where(['bat_show' => 1])->one();
$bat_id = $dftBatch->id;

?>

<?php 

$form = ActiveForm::begin([
'id' => 'sel-result-form',
'method' => 'get',

]); ?>  
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, 'others', [
        'addon' => ['prepend' => ['content'=>'<span class="fa fa-search"></span>']]])->label(false)->textInput(['placeholder' => "Search Name or NRIC"]) ?> 


    </div>
</div>
    <?php ActiveForm::end(); ?>

<?php 

$this->registerJs('

$("#resultsearch-answer_status").change(function(){
    $("#sel-result-form").submit();
});

$("#resultsearch-others").change(function(){
    $("#sel-result-form").submit();
});
');

?>

