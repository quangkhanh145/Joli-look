<?php
$this->title = 'Đăng nhập | JoliLook';
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div id="main"  class=""  >
    <noscript><div class="js_error">
        <h2>Javascript Disabled</h2>
        <p>We detect that the Javascript of your Browser is disable. That will make some functionalities in our website not to work.<br> <b>Please, enable javascript to enjoy a better user experience on our website.</b></p>
    </div>
    </noscript>
    <style>
        .error{
            padding: 15px 0 0 0;
        }
    </style>
    <div class="page account form">
        <div class="content-holder login-boxes mobile-hide">
            <h2 class="h1 text-center space-around border-bottom nomargin">My account</h2>
            <div class="grid grid-vstretch grid-center border-bottom">
            <div class="border-right w-50">
                <div class="box bordered-box dark">
                    <!-- <form name="login-form" id="login-form" class="form" action="/user/login" method="POST"> -->
                    <?php
$form = ActiveForm::begin(['id' => 'login-form', 'options' => [
	'class' => 'form',
	'name' => 'login-form'],
	'fieldConfig' => [
		'template' => "{input}",
		'options' => ['tag' => null],
	]]);
?>
                    <h3 class="h6 uppercase">Log in to your account</h3>
                    <?=$form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Email address', 'type' => 'email', 'name' => 'email', 'id' => false, 'class' => false]])->label(false)->textInput()?>
                    <?=$form->field($model, 'password', ['inputOptions' => ['placeholder' => 'Password', 'type' => 'password', 'name' => 'password', 'id' => false, 'class' => false]])->label(false)->passwordInput()?>
                    <div class="grid grid-2-cols grid-baseline">
                        <div class="text-left">
                        <?=Html::checkbox('reveal-password', false, ['id' => 'show-pwd'])?> <?=Html::label('Show password', 'show-pwd')?>
                        </div>
                        <a href="/user/forgot-password" class="underlined text-right">Forgot password?</a>
                    </div>
                    <button type="submit" class="button full dark">Continue</button>
                    <?php ActiveForm::end();?>
                </div>
            </div>
            <div class="w-50 rel">
                <a href="<?=Yii::$app->homeUrl?>site/create" class="box button-box uppercase"><span>This is my first time</span></a>
            </div>
        </div>
    </div>
    <div class="mobile-only tablet-hide">
        <h2 class="h1 page-title">My account</h2>
        <div class="content-holder bordered">
            <div class="h-space">
                <h3 class="h3">Sign in</h3><a class="button full dark js" href="<?=Yii::$app->homeUrl?>site/usermobile">Log in to your account</a>
                <a class="button full js" href="<?=Yii::$app->homeUrl?>site/create">This is my first time</a>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs("jQuery('#show-pwd').change(function(){
    jQuery('[name=" . 'password' . "]').attr('type',this.checked?'text':'password');
})");
?>