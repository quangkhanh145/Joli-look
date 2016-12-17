<?php
$this->title = 'Đăng ký | JoliLook'
?>
<div id="main"  class="">
    <noscript>
        <div class="js_error">
            <h2>Javascript Disabled</h2>
            <p>We detect that the Javascript of your Browser is disable. That will make some functionalities in our website not to work.<br> <b>Please, enable javascript to enjoy a better user experience on our website.</b></p>
        </div>
    </noscript>
    <div class="page account">
        <div class="content-holder mobile-hide">
            <h2 class="h1 text-center space-around border-bottom nomargin">My account</h2>
            <div class="grid grid grid-center">
                <div class="w-40 text-center space-around">
                    <form name="signup-form" id="signup-form" class="form space-around" action="<?=Yii::$app->homeUrl?>site/create" method="POST">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <h3 class="h6 uppercase">Join Bonlook</h3>
                        <input type="email" name="email" placeholder=" email address" required/>
                        <input type="password" name="password" placeholder=" password" onchange="validatePassword()" required/>
                        <input type="password" name="confirmpassword" placeholder="confirm password" onkeyup="validatePassword()" required required/>
                        <div class="text-left">
                        </div>
                        <button type="submit" class="button full dark">Join</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mobile-only tablet-hide">
            <h2 class="h1 page-title">My account</h2>
            <div class="content-holder bordered">
                <div class="h-space">
                    <h3 class="h3 text-center">Join Bonlook</h3>
                    <form name="signup-form" id="signup-form" class="form" action="<?=Yii::$app->homeUrl?>/user/create" method="POST">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input type="email" name="email" placeholder=" email address" />
                        <input type="password" name="password" placeholder=" password" onchange="validatePassword()" required/>
                        <input type="password" name="confirmpassword" placeholder=" confirm password" onkeyup="validatePassword()" required/>
                        <div class="text-left">
                        </div>
                        <button type="submit" class="button full dark">Join</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var password = $('[name=password]');
var confirm_password = $('[name=confirmpassword]');

function validatePassword(){
  if(password.val() != confirm_password.val()) {
    confirm_password[0].setCustomValidity("Mật khẩu không khớp");
  } else {
    confirm_password[0].setCustomValidity('');
  }
}
</script>