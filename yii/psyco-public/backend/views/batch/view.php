<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\Batch */

$this->title = $model->bat_text;
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$column1[] = array();
$column2[] = array();
$column3[] = array();

$attributes = [
            'bat_text',
            [
                'attribute' => 'bat_show',
                'value' => function($model){
                    return $model->showText;
                }
            ],
        ];
        if($model->column1)
        {
            $attributes[] = [
                'attribute' => 'column1',
                'value' => function($model){
                    return $model->column1;
                }
            ];
        }
        if($model->column2)
        {
            $attributes[] = [
                'attribute' => 'column2',
                'value' => function($model){
                    return $model->column2;
                }
            ];
        }
        if($model->column3)
        {
            $attributes[] = [
                'attribute' => 'column3',
                'value' => function($model){
                    return $model->column3;
                }
            ];
        }
?>

<div class="card">
<div class="card-body">
<div class="batch-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('View Candidates', ['view-candidates', 'bat_id' => $model->id], ['class' => 'btn btn-info']) ?>
       

        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>
</div>
</div>
</div>

