<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Candidate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('USERNAME:<br/><i>Letak No. Kad Pengenalan tanpa (-) e.g. 900213035599</i>') ?>

    <?= $form->field($model, 'can_name')->textInput(['maxlength' => true])->label('FULLNAME:') ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true])->label('DEPARTMENT:') ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="fa fa-floppy-o"></span> Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
