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
    <div class="col-md-4">
        <?= $form->field($model, 'others', [
        'addon' => ['prepend' => ['content'=>'<span class="fa fa-search"></span>']]])->label(false)->textInput(['placeholder' => "Search Name or NRIC"]) ?> 


    </div>
    <div class="col-md-4">

        <?= $form->field($model, 'bat_id')->dropDownList(
            ArrayHelper::map(Batch::find()->all(),'id', 'bat_text'), ['options'=>[$bat_id=>["Selected"=>true]]]
        )->label(false) ?>

    </div>
    <div class="col-md-4">

            <?= $form->field($model, 'answer_status')->dropDownList(
                Common::status(), ['prompt' => 'Select Status',  'class' => 'form-control select-choice'])->label(false) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

<?php 

$this->registerJs('

$("#answersearch-answer_status").change(function(){
    $("#sel-result-form").submit();
});

$("#answersearch-bat_id").change(function(){
    $("#sel-result-form").submit();
});

$("#answersearch-others").change(function(){
    $("#sel-result-form").submit();
});
');

?>

