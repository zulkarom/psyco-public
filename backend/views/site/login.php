<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Psychometric';

// $fieldOptions1 = [
//     'options' => ['class' => 'input-group mb-3'],
//     'inputTemplate' => "{input}
//             <div class='input-group-text'>
//               <span class='fa fa-user'></span>
//             </div>
//           </div>"
// ];

$fieldOptions = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => "{input}<div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fa fa-lock'></span>
            </div>
          </div>"
];
?>
<div class="site-login">

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Psychometric</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        
            <?= $form
                ->field($model, 'username', $fieldOptions)
                ->label(false)
                ->textInput(['placeholder' => 'Username', 'class' => 'form-control']) 
             ?>

             <?= $form
                ->field($model, 'password', $fieldOptions)
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
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
          </div>
          <!-- /.col -->
        </div>

      <div class="social-auth-links text-center mt-2 mb-3">
      </div>

      <p class="mb-1">
        <a href="">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  <!-- /.card -->
</div>

<?php ActiveForm::end(); ?>
