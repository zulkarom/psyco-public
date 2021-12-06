<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-2">
        <p>
            <?php echo Html::button('<span class="fa fa-plus"></span> NEW BATCH', ['value' => Url::to(['/setting/create-batch']), 'class' => 'btn btn-success', 'id' => 'modalBttnBatch']);

            

            $this->registerJs('
                $(function(){
                  $("#modalBttnBatch").click(function(){
                      $("#batch").modal("show")
                        .find("#formBatch")
                        .load($(this).attr("value"));
                  });
                });

               
            ');

            Modal::begin([
                    'title' => '<h4>New Batch</h4>',
                    'id' =>'batch',
                    'size' => 'modal-lg'
                ]);

            echo '<div id="formBatch"></div>';

            Modal::end();

            

            ?>
        </p>
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<div class="setting-index">
    <div class="card card-primary card-outline">
        <div class="card-body">

          <a href="file/offline.xls" target="_blank">Download Offline Excel Question</a>
          <br/><br/>

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
                <?php 
                $i=1;
                foreach($batches as $batch){
                echo'<tr>
                    <td>'.$i.'</td>
                    <td>'.$batch->bat_text.'</td>
                    <td>
                      '.$form->field($batch, 'bat_show')->dropDownList( [1 => 'Yes' , 0 => 'No'] )->label(false).'
                    </td>
                  </tr>';
                  $i++;
                }
                ?>
              </tbody>
            </table>
        </div>
    </div>

</div>

<div class="form-group">
    <?= Html::submitButton('Save Setting', ['class' => 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>
