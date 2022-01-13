<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\bootstrap4\Modal;
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Url;
use softark\duallistbox\DualListbox;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analysis';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="result-index">
<div class="card card-primary">
<div class="card-body">
<div class="row">
<!-- <div class="col-2">
</div> -->
<div class="col-8">
    <div class="card card-primary card-outline">
        <div class="card-body">
           <?php $form = ActiveForm::begin([
                'id' => 'favorite-form',
                'enableAjaxValidation' => false,
            ]); ?>

            <?php echo $form->field($model, 'grad_ids')->widget(DualListbox::className(),[
                    'items' => $items,
                    'options' => [
                        'multiple' => true,
                        'size' => 8,
                    ],
                    'clientOptions' => [
                        'nonSelectedListLabel' => 'Available Domain',
                        'selectedListLabel' => 'Selected Domain',
                        'moveOnSelect' => false,
                    ],
                ])
                ->hint(false)
                ->label(false);
            ?>

            

            
        </div>
    </div>

    <?php if($batch->column1):?>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <?php echo $form->field($model2, 'col_ids')->widget(DualListbox::className(),[
                    'items' => $items2,
                    'options' => [
                        'multiple' => true,
                        'size' => 8,
                    ],
                    'clientOptions' => [
                        'nonSelectedListLabel' => 'Available '.$batch->column1,
                        'selectedListLabel' => 'Selected '.$batch->column1,
                        'moveOnSelect' => false,
                    ],
                ])
                ->hint(false)
                ->label(false);
            ?>

        </div>
    </div>
    <?php endif;?>

    <?php if($batch->column2):?>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <?php echo $form->field($model2, 'col2_ids')->widget(DualListbox::className(),[
                    'items' => $items3,
                    'options' => [
                        'multiple' => true,
                        'size' => 8,
                    ],
                    'clientOptions' => [
                        'nonSelectedListLabel' => 'Available '.$batch->column2,
                        'selectedListLabel' => 'Selected '.$batch->column2,
                        'moveOnSelect' => false,
                    ],
                ])
                ->hint(false)
                ->label(false);
            ?>
        </div>
    </div>
    <?php endif;?>

    <?php if($batch->column3):?>
    <div class="card card-primary card-outline">
        <div class="card-body">
           

            <?php echo $form->field($model2, 'col3_ids')->widget(DualListbox::className(),[
                    'items' => $items4,
                    'options' => [
                        'multiple' => true,
                        'size' => 8,
                    ],
                    'clientOptions' => [
                        'nonSelectedListLabel' => 'Available '.$batch->column3,
                        'selectedListLabel' => 'Selected '.$batch->column3,
                        'moveOnSelect' => false,
                    ],
                ])
                ->hint(false)
                ->label(false);
            ?>

        </div>
    </div>
    <?php endif;?>

    <?php if($batch->column4):?>
    <div class="card card-primary card-outline">
        <div class="card-body">
           

            <?php echo $form->field($model2, 'col4_ids')->widget(DualListbox::className(),[
                    'items' => $items5,
                    'options' => [
                        'multiple' => true,
                        'size' => 8,
                    ],
                    'clientOptions' => [
                        'nonSelectedListLabel' => 'Available '.$batch->column4,
                        'selectedListLabel' => 'Selected '.$batch->column4,
                        'moveOnSelect' => false,
                    ],
                ])
                ->hint(false)
                ->label(false);
            ?>
        </div>
    </div>
    <?php endif;?>

    
    <?= $form->field($batch, 'limit')->input('number', ['min' => 1, 'step' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton('RESULT', [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
        
</div>
<div class="col-2">
</div>
</div>
</div>
</div>
</div>


