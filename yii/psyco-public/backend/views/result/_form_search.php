<?php
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Common;
use backend\models\Batch;

?>

<?php 

$form = ActiveForm::begin([
'id' => 'sel-result-form',
'method' => 'get',

]); ?>  
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'can_batch')->dropDownList(
            ArrayHelper::map(Batch::find()->all(),'id', 'bat_text'), ['prompt' => 'Select Batch', 'class' => 'form-control']
        )->label(false) ?>


    </div>
    <div class="col-md-6">

            <?= $form->field($model, 'answer_status')->dropDownList(
                Common::status(), ['prompt' => 'Select Status',  'class' => 'form-control select-choice'])->label(false) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

<?php 

$this->registerJs('

$("#resultsearch-answer_status").change(function(){
    $("#sel-result-form").submit();
});

$("#resultsearch-can_batch").change(function(){
    $("#sel-result-form").submit();
});
');

?>

