<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = 'Admin Assignment';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
	'username',
    [
        'format' => 'html',
        'attribute' => 'can_name',
        'label' => 'Full Name',
        'value' => function($model){
            return $model->can_name;
        }
    ],
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}',
	'buttons'=>[
					'view'=>function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span> Assign Role',$url, ['class'=>'btn btn-primary btn-sm']);
						
						
					
					}
				],

];
?>

<div class="row">
    <div class="col-2">
        <p>
            <?php echo Html::button('<span class="fa fa-plus"></span> NEW USER', ['value' => Url::to(['/candidate/create']), 'class' => 'btn btn-success', 'id' => 'modalBttnCandidate']);?>
        </p>
    </div>
    <div class="col-4">
        <a href="file/offline.xls" target="_blank">Download Offline Excel Question</a>
    </div>
</div>

<div class="card">
<div class="card-body"><div class="assignment-index">

    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]);
    ?>
    <?php Pjax::end(); ?>

</div></div>
</div>
