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
        'attributes' => [
            'bat_text',
            [
                'attribute' => 'bat_show',
                'value' => function($model){
                    return $model->showText;
                }
            ],
            'column1',
            'column2',
            'column3',
        ],
    ]) ?>
</div>
</div>
</div>

