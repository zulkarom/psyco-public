<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\bootstrap4\Modal;
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Url;
use softark\duallistbox\DualListbox;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View All Result';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="result-index">

    

    

    <div class="card card-primary card-outline">
        <div class="card-body">
            <?php
                $options = [
                    'multiple' => true,
                    'size' => 20,
                ];
                // echo $form->field($model, $attribute)->listBox($items, $options);
                echo $form->field($model, $attribute)->widget(DualListbox::className(),[
                    'items' => $items,
                    'options' => $options,
                    'clientOptions' => [
                        'moveOnSelect' => false,
                        'selectedListLabel' => 'Selected Items',
                        'nonSelectedListLabel' => 'Available Items',
                    ],
                ]);
            ?>
        </div>
    </div>
</div>


