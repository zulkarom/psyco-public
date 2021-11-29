<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="setting-index">
    <div class="card card-primary card-outline">
        <div class="card-body">

            <?= $form->field($model, 'setting_num')->dropDownList( [1 => 'Yes' , 0 => 'No'] )->label('Open Online Interview') ?>

            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Batch Name</th>
                  <th>Showing</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td><?=$batch->bat_text?></td>
                  <td>
                    <?= $form->field($model2, 'setting_num')->dropDownList( [1 => 'Yes' , 0 => 'No'] )->label(false) ?>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>

</div>

<div class="form-group">
    <?= Html::submitButton('Save Setting', ['class' => 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>
