<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Psychometric';

$fieldOptions1 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => "{input}
            <div class='input-group-text'>
              <span class='fa fa-user'></span>
            </div>
          </div>"
];

$fieldOptions2 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => "{input}<div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fa fa-lock'></span>
            </div>
          </div>"
];
?>
<div class="site-login">
    <center>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Psychometric</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        
            <?= $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => 'Your Username', 'class' => 'form-control']) 
             ?>

             <?= $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => 'Password', 'class' => 'form-control']) 
             ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="form-group">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
          </div>
          <!-- /.col -->
        </div>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </center>
  <!-- /.card -->
</div>

<?php ActiveForm::end(); ?>
