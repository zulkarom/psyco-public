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
                        'size' => 15,
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

            <div class="form-group">
                <?= Html::submitButton('RESULT', [
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


