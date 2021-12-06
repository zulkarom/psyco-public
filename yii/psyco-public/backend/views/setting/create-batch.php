<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bat_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bat_show')->dropDownList( [1 => 'Yes' , 0 => 'No'] )?>

    <div class="form-group">
        <?= Html::submitButton('Save Batch', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
