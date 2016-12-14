<?
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
            <div class="page account form">

    <div class="content-holder mobile-hide">

        <h2 class="h1 text-center space-around border-bottom nomargin">My account</h2>

        <div class="grid grid-center grid-vstretch border-bottom">
            <div class="border-right w-50">
                <div class="box">
                    <!-- <form name="login-form" id="login-form" class="form space-around" action="/user/login" method="POST"> -->
                    <?php
$form = ActiveForm::begin(['id' => 'login-form', 'action' => 'user',
	'options' => [
		'class' => 'form space-around',
		'name' => 'login-form'],
	'fieldConfig' => [
		'template' => "{input}",
		'options' => ['tag' => null],
	]]);
?>
                        <h3 class="h6 uppercase">Log in to your account</h3>
                        <input type="hidden" name="redirect" value="/user" />
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
        </div>

    </div>

    <div class="mobile-only tablet-hide">

        <h2 class="h1 page-title">My account</h2>

        <div class="content-holder bordered">
            <div class="h-space">
                <h3 class="h3 text-center">Log in to your account</h3>
                                    <?php
$form = ActiveForm::begin(['id' => 'login-form', 'action' => 'user',
	'options' => [
		'class' => 'form space-around',
		'name' => 'login-form'],
	'fieldConfig' => [
		'template' => "{input}",
		'options' => ['tag' => null],
	]]);
?>
                    <input type="hidden" name="redirect" value="/user" />
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

    </div>

</div>
<?php
$this->registerJs("jQuery('#show-pwd').change(function(){
    jQuery('[name=" . 'password' . "]').attr('type',this.checked?'text':'password');
})");
?>