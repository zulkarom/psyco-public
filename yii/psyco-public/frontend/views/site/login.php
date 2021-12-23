<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use frontend\assets\FrontendAsset;

FrontendAsset::register($this);

$dirAssets = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/frontendAssets');

$this->title = 'UJIAN PSIKOMETRIK / PSYCHOMETRIC TEST';
?>
<div class="site-login">

    
        <div class="container">

    <div>
        <div style="margin: 0 auto; width:90%">

            <!-- login box on left side -->
            <div>
            
<img src="<?=$dirAssets?>/images/Psychometric-Tests.png" width="80%" />

<div class="row">
                
                <div class="col-md-12">
                
                
                
                

                <div class="row">

                <div class="col-md-6">
                
                <?php 
                
                // if($this->open == 1){
                ?>
                <h4> MULA MENJAWAB / <i>START ANSWERING</i>  </h4><br />
                <?php $form = ActiveForm::begin(); ?>

                
                <div class="form-group">

                <?= $form
                    ->field($model, 'username')
                    ->label('NRIC/PASSPORT NO.:')
                    ->textInput(['class' => 'form-control input-lg']) 
                 ?>
                </div>
                <?= Html::submitButton('LOG IN', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                <br /><br />
                <?php 
                // } else { 
                
                // echo '<h3>TUTUP / CLOSED</h3>';
                // }
                ?>
                </div>
                <?php ActiveForm::end(); ?>
                
                
                <div class="col-md-6">
                
                    <?php 
                
                // if($this->open == 1){
                ?>
                    <h4> DAFTAR / <i>REGISTER</i>  </h4><br />
                
                <div class="form-group">
                <?= $form
                    ->field($model, 'username')
                    ->label('NAMA / NAME.:')
                    ->textInput(['class' => 'form-control input-lg']) 
                ?>
                </div>

                
                <div class="form-group">
                <?= $form
                    ->field($model, 'username')
                    ->label('NRIC/PASSPORT NO.:')
                    ->textInput(['class' => 'form-control input-lg']) 
                 ?>
                </div>                
                    <?= Html::submitButton('REGISTER', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                
                <?php 
                // } else { 
                
                // echo '<h3>TUTUP / CLOSED</h3>';
                // }
                ?>
                
                
                
                
                
                </div>
                </div>
        
                </div>
                <div class="col-md-1"></div>
            </div>

            
            
                
                

            </div>



        </div>
    </div>
</div>

</div>
