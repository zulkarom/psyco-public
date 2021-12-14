<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Batch */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    
    input {
  font-family: monospace;
}
label {
  display: block;
}
div {
  margin: 0 0 1rem 0;
}
</style>
<div class="card">
<div class="card-body">
<div class="batch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bat_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bat_show')->dropDownList( [1 => 'Yes' , 0 => 'No'] )?>

    <?= $form->field($model, 'column1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'column2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'column3')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save Batch', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>


<?php


