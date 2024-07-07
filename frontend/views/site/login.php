<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */
//jojoi
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use frontend\assets\LogAsset;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
LogAsset::register($this);
?>
<div class="wrapper">
        <div class="title-text">
          <div class="title login">Login Form</div>
          <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">

        
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Sign in</label>
            <label for="signup" class="slide signup"> Sign up</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($login, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($login, 'password')->passwordInput() ?>


            <?= $form->field($login, 'rememberMe')->checkbox() ?>
            <div class="signup-link">Not a member? <a href="">Sign up!</a></div>
            <div class="form-group">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($signup, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($signup, 'email') ?>

        <?= $form->field($signup, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    <script> 
    const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form#login-form");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (()=>{
  console.log('salom');
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});

    </script>