<?php
$this->title = Yii::$app->user->identity->email . " | JoliLook";
?>
<div id="main"  class=""  >
    <noscript>
    <div class="js_error">
        <h2>Javascript Disabled</h2>
        <p>We detect that the Javascript of your Browser is disable. That will make some functionalities in our website not to work.<br> <b>Please, enable javascript to enjoy a better user experience on our website.</b></p>
    </div>
    </noscript>
    <div class="page account">
        <div class="content-holder large mobile-hide">
            <div class="border-bottom clearfix" style="display: inherit;">
                <div class="grid grid-vcenter right space-around w-66">
                    <div class="w-50 text-center">
                        <h2 class="h1 nomargin">My account</h2>
                    </div>
                    <div class="w-50 text-right uppercase">
                        <span class="small">Logged in as</span><br />
                        <strong><?=Yii::$app->user->identity->email?></strong><br />
                        <a href="<?=Yii::$app->homeUrl?>site/logout" class="small">Log out</a>
                    </div>
                </div>
            </div>
            <div class="grid space-before">
                <div class="w-25 space-before">
                    <ul class="nobullet section_menu w-75">
                        <li><a href="/user">About you</a></li>
                        <li><a href="/user/orders">My orders</a></li>
                        <li><a href="/user/wishlist">My Wishlist</a></li>
                        <li><a href="/user/preferences">My Preferences</a></li>
                    </ul>
                </div>
                <div id="col-main" class="w-75">
                    <div class="space-around">
                        <h3 class="h2 uppercase">About you</h3>
                        <p>Manage your personal information and edit your email settings.</p>
                        <form name="editaccount-form" id="editaccount-form" class="form" action="/user/save" method="POST">
                        <input type="email" name="username" placeholder="Email address" value="<?=Yii::$app->user->identity->email?>" readonly/>
                        <input type="text" name="name" placeholder="Name" value="<?=Yii::$app->user->identity->name?>" />
                        </form>
                        <a href="#change-password" id="change-password" class="button full dark">I want to change my password</a>
                        <div id="change-password-inputs" style="display:none;">
                            <input type="password" name="oldpassword" placeholder="Current password" />
                            <input type="password" name="newpassword" placeholder="New password" />
                            <input type="password" name="confirmpassword" placeholder="Confirm Password" />
                        </div>
                         <button type="submit" class="button full dark">Save My Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-only tablet-hide">
            <h2 class="h2 subtitle text-center">My account</h2>
            <div class="content-holder bordered">
                <ul class="nobullet section_menu space-before">
                    <li><a href="/user#mvView">About you</a></li>
                    <li><a href="/user/orders#mvView">My orders</a></li>
                    <li><a href="/user/wishlist#mvView">My Wishlist</a></li>
                    <li><a href="/user/preferences#mvView">My Preferences</a></li>
                </ul>
                <div id="mvView" style="padding-top:30px;">
                    <h3 class="h2 uppercase h-space">About you</h3>
                    <p>Manage your personal information and edit your email settings.</p>
                    <form name="editaccount-form" id="editaccount-form" class="form" action="/user/save" method="POST">
                        <input type="email" name="username" placeholder="Email address" value="<?=Yii::$app->user->identity->email?>" readonly/>
                        <input type="text" name="name" placeholder="Name" value="<?=Yii::$app->user->identity->name?>" />
                        <a href="#change-password" id="change-password" class="button full dark">I want to change my password</a>
                        <div id="change-password-inputs" style="display:none;">
                            <input type="password" name="oldpassword" placeholder="Current password" />
                            <input type="password" name="newpassword" placeholder="New password" />
                            <input type="password" name="confirmpassword" placeholder="Confirm Password" />
                        </div>
                        <button type="submit" class="button full dark">Save My Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>