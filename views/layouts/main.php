<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\cart;
use yii\helpers\Html;
use yii\helpers\Url;
$cart = new Cart();
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=Html::encode($this->title)?></title>
    <link href="icon.png" data-menuid="shortcut icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento" type="text/css">
    <?=Html::cssFile(Url::to(['css/main.css']))?>
    <?=Html::jsFile(Url::to(['js/jquery-3.1.1.js']))?>
    <?=Html::jsFile(Url::to(['js/jquery.customSelect.min.js']))?>
    <?=Html::jsFile(Url::to(['js/slick.js']))?>
    <?=Html::jsFile(Url::to(['js/menu.js']))?>
    <?=Html::jsFile(Url::to(['js/cart.js']))?>
    <?php $this->head()?>
</head>
<body>
    <?php $this->beginBody()?>

    <header>
        <div class="header-holder mobile-only">
          <a href="#bag-items" class="bag-icon js-slide">
          <?=Html::img(Url::to(['images/icon-bag.svg']), ['alt' => 'Open bag'])?>
          <span class="bag_number_of_items"><?php $count = $cart->count();
echo $count;?></span></a>
          <a href="#menu-categories" id="open-menu" class="menu-icon js-slide">
            <?=Html::img(Url::to(['images/icon-menu.svg']), ['alt' => 'Open menu'])?>
          </a>
          <a href="#search, #search-field" class="search-icon js-open"><img src="<?=Yii::$app->homeUrl?>images/icon-magnifier.svg" alt="Search" /></a>
          <div class="header-logo"><a href="<?=Yii::$app->homeUrl?>"><img src="<?=Yii::$app->homeUrl?>images/logo.png" alt="Jolilook" /></a></div>
      </div>
      <div class="header-content">
        <div class="holder">
            <div class="content-holder">
                <div class="header-logo desktop-only"><a href="<?=Yii::$app->homeUrl?>"><img src="<?=Yii::$app->homeUrl?>images/logo.png" alt="Jolilook" /></a>
                </div>
                <nav id="main-nav" class="menu-holder">
                    <div id="slideout-header" class="nav-header mobile-only">
                      <a href="#" class="back-icon js-slide"><img src="<?=Yii::$app->homeUrl?>images/icon-back.svg" alt="Back" /></a>
                      <h2 class="menu-title"></h2>
                      <a href="#" class="js-close close-icon right"><img src="<?=Yii::$app->homeUrl?>images/icon-menu.svg" alt="Close menu" /></a>
                  </div>
                  <ul id="menu-categories" class="menu-list slideout" data-menutitle="">
                    <li class="mobile-only noborder" data-menutitle="Search">
                        <a href="#search, #search-field" class="boxed js-open js-slide">Search</a>
                    </li>
                    <?php if (Yii::$app->user->isGuest) {
	print('<li data-menutitle="Login" class="mobile-only noborder">
                        <a href="' . Yii::$app->homeUrl . 'site/user" class="boxed">Login</a>
                    </li>');
} else {
	print('<li data-menutitle="Login" class="mobile-only noborder"><a href="/user" class="boxed">
                <div class="vertical-align-middle">My account</div>
              </a>
            </li>
            <li data-menutitle="Logout" class="mobile-only noborder">
              <a href="' . Yii::$app->homeUrl . 'site/logout" class="boxed">Log out</a>
            </li>');
}

?>
                    <li id="women-li" class="hspace">
                        <?=Html::a('Women', Url::to(['site/women'], true), ['class' => 'desktop-only selected'])?>
                        <a href="#women" class="mobile-only js-slide">Women</a>
                        <div id="women" class="slideout" data-menutitle="Women">
                            <ul id="women_sub_nav">
                                <li data-menutitle="Women - Eyeglasses" >
                                    <a href="<?=Yii::$app->homeUrl?>site/eyeglasses-women">
                                    <img src="<?=Yii::$app->homeUrl?>images/collections/women/emily-luciano/menu_eyeglasses.jpg" class="desktop-only" alt="" />
                                    <em class="desktop-only">see</em>eyeglasses
                                    </a>
                                    <div id="mobile_sub_nav_container_women_eyeglasses" class="slideout mobile-only" data-menutitle="Eyeglasses">
                                    <ul>
                                    <li><a href="/eyeglasses/women">All</a></li>
                                    <li><a href="/eyeglasses/women/square">Square</a></li>
                                    <li><a href="/eyeglasses/women/cateye">Cateye</a></li>
                                    <li><a href="/eyeglasses/women/rectangle">Rectangle</a></li>
                                    <li><a href="/eyeglasses/women/round">Round</a></li>
                                    <li><a href="/eyeglasses/women/bestsellers">Bestsellers</a></li>
                                    </ul>
                                    </div>
                                </li>
                      <li data-menutitle="Women - Sunglasses" >
                          <a href="/sunglasses/women">
                            <img src="<?=Yii::$app->homeUrl?>images/menu_sunglasses.jpg" class="desktop-only" alt="" />
                            <em class="desktop-only">see</em>sunglasses
                        </a>
                        <div id="mobile_sub_nav_container_women_sunglasses" class="slideout mobile-only" data-menutitle="Sunglasses">
                            <ul>
                              <li><a href="/sunglasses/women">All</a></li>
                              <li><a href="/sunglasses/women/square">Square</a></li>
                              <li><a href="/sunglasses/women/cateye">Cateye</a></li>
                              <li><a href="/sunglasses/women/rectangle">Rectangle</a></li>
                              <li><a href="/women/sunglasses/round">Round</a></li>
                              <li><a href="/sunglasses/women/bestsellers">Bestsellers</a></li>
                          </ul>
                      </div>
                  </li>
                  <li data-menutitle="Women - Accessories"  class="desktop-only">
                      <a href="/accessories/women">
                        <img src="<?=Yii::$app->homeUrl?>images/menu/women/menu_accessories.jpg" class="desktop-only" alt="" />
                        <em class="desktop-only">see</em>Accessories
                    </a>
                    <div id="" class="slideout mobile-only" data-menutitle="">
                        <ul>
                        </ul>
                    </div>
                </li>
                <li data-menutitle="Women - our bestsellers"  class="desktop-only">
                  <a href="/women/bestsellers">
                    <img src="<?=Yii::$app->homeUrl?>images/women/menu_bestsellers_women.jpg" class="desktop-only" alt="" />
                    <em class="desktop-only">shop</em>our bestsellers
                </a>
                <div id="" class="slideout mobile-only" data-menutitle="">
                    <ul>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>

<li id="men-li">
    <a href="<?=Yii::$app->homeUrl?>site/men" class="desktop-only ">Men</a>
    <a href="#men" class="mobile-only js-slide">Men</a>
    <div id="men" class="slideout" data-menutitle="Men">
      <ul id="men_sub_nav">
       <li data-menutitle="Men - Eyeglasses">
        <a href="/eyeglasses/men">
          <img src="<?=Yii::$app->homeUrl?>images/collections/men/studio/homepage/genderless/menu_studio_eyeglasses.jpg" class="desktop-only" alt="" />
          <em class="desktop-only">see</em>eyeglasses
      </a>
      <div id="mobile_sub_nav_container_men_eyeglasses" class="slideout mobile-only" data-menutitle="Eyeglasses">
          <ul>
            <li><a href="/eyeglasses/men">All</a></li>
            <li><a href="/eyeglasses/men/square">Square</a></li>
            <li><a href="/eyeglasses/men/cateye">Cateye</a></li>
            <li><a href="/eyeglasses/men/rectangle">Rectangle</a></li>
            <li><a href="/eyeglasses/men/round">Round</a></li>
            <li><a href="/eyeglasses/men/bestsellers">Bestsellers</a></li>
        </ul>
    </div>
</li>
<li data-menutitle="Men - Sunglasses">
    <a href="/sunglasses/men">
      <img src="<?=Yii::$app->homeUrl?>images/collections/men/studio/homepage/genderless/menu_studio_sunglasses.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">see</em>sunglasses
  </a>
  <div id="mobile_sub_nav_container_men_sunglasses" class="slideout mobile-only" data-menutitle="Sunglasses">
      <ul>
        <li><a href="/sunglasses/men">All</a></li>
        <li><a href="/sunglasses/men/square">Square</a></li>
        <li><a href="/sunglasses/men/cateye">Cateye</a></li>
        <li><a href="/sunglasses/men/rectangle">Rectangle</a></li>
        <li><a href="/sunglasses/men/round">Round</a></li>
        <li><a href="/sunglasses/men/bestsellers">Bestsellers</a></li>
    </ul>
</div>
</li>
<li data-menutitle="Men - Accessories" class="desktop-only">
    <a href="/accessories/men">
      <img src="<?=Yii::$app->homeUrl?>images/menu/men/menu_accessories.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">see</em>Accessories
  </a>
  <div id="" class="slideout mobile-only" data-menutitle="">
      <ul>
      </ul>
  </div>
</li>
<li data-menutitle="Men - our bestsellers" class="desktop-only">
    <a href="/men/bestsellers">
      <img src="<?=Yii::$app->homeUrl?>images/men/menu_bestsellers_men2.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">shop</em>our bestsellers
  </a>
  <div id="" class="slideout mobile-only" data-menutitle="">
      <ul>
      </ul>
  </div>
</li>
</ul>
</div>
</li>

<li id="collab-li"><a href="#collab" class="js-slide ">Collections</a>
  <div id="collab" class="slideout" data-menutitle="Collections">
    <ul id="collab_sub_nav">
      <li data-menutitle="Collections - Emily Luciano">
        <a href="/women/collection/emily-luciano">
          <img src="<?=Yii::$app->homeUrl?>images/collections/women/emily-luciano/menu_collection.jpg" class="desktop-only" alt="" />
          <em class="desktop-only">view</em>Emily Luciano
      </a>
  </li>
  <li data-menutitle="Collections - Luxe Essential">
    <a href="/women/collection/luxe-essential">
      <img src="<?=Yii::$app->homeUrl?>images/collections/luxe-essential/menu_collection.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">view</em>Luxe Essential
  </a>
</li>
<li data-menutitle="Collections - Mariper Morin">
    <a href="/women/collection/maripier-morin">
      <img src="<?=Yii::$app->homeUrl?>images/menu/collaborations/mpmorin_menu.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">view</em>Mariper Morin
  </a>
</li>
<li data-menutitle="Collections - All collections">
    <a href="/women/collection/all">
      <img src="<?=Yii::$app->homeUrl?>images/collections/quartz/quartz_menu.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">view</em>All collections
  </a>
</li>
</ul>
</div>
</li>

<li id="tryon-li"><a href="#tryon" class="js-slide ">try on</a>
  <div id="tryon" class="slideout" data-menutitle="Try on">
    <ul id="tryon_sub_nav">
      <li data-menutitle="Try on - Virtual try on">
        <a href="/virtual-try">
          <img src="<?=Yii::$app->homeUrl?>images/menu/menu_virtualmirror.jpg" class="desktop-only" alt="" />
          <em class="desktop-only">do the</em>virtual try on
      </a>
  </li>
  <li data-menutitle="Try on - Your face shape">
    <a href="/faceshape">
      <img src="<?=Yii::$app->homeUrl?>images/menu/menu_faceshape.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">shop for</em>your face shape
  </a>
</li>
<li data-menutitle="Try on - An Appointment">
    <a href="/rdv">
      <img src="<?=Yii::$app->homeUrl?>images/menu/menuhelp_appointment2.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">book</em>An Appointment
  </a>
</li>
<li data-menutitle="Try on - The perfct fit">
    <a href="/perfect-fit">
      <img src="<?=Yii::$app->homeUrl?>images/perfectfit_menu.jpg" class="desktop-only" alt="" />
      <em class="desktop-only">get</em>the perfect fit
  </a>
</li>
</ul>
</div>
</li>

<li id="help-li"><a id="help-desktop_link" href="#help-mobile, #help-desktop" class="js-slide">Help</a>
  <div class="slideout desktop-only" data-menutitle="Help">
    <ul>
      <li data-menutitle="Help - Contact us">
        <a href="/contact#main" class="faq">
          <img class="desktop-only" src="<?=Yii::$app->homeUrl?>images/menu/menuhelp_prescription.jpg" alt="" />
          <span>Contact us</span>
      </a>
  </li>
  <li data-menutitle="Help - Faqs">
    <a href="/contact#main" class="faq">
      <img class="desktop-only" src="<?=Yii::$app->homeUrl?>images/menu/menuhelp_faq.jpg" alt="" />
      <span>Read the <strong>FAQ</strong></span>
  </a>
</li>
</ul>
</div>
<div id="help-mobile" class="slideout mobile-only" data-menutitle="Help">
    <ul>
      <li data-menutitle="Help - Contact us">
        <a href="/contact#main">Contact us</a>
    </li>
    <li data-menutitle="Help - Faqs">
        <a href="/contact#main">Read the <strong>FAQ</strong></a>
    </li>
</ul>
</div>
</li>
<li data-menutitle="Contact us" class="noborder mobile-only cols">
  <a href="/contact#main" class="boxed col-4">Contact us</a>
</li>
<li data-menutitle="My Wishlist" class="noborder mobile-only">
  <a href="/user?redirect=/user/wishlist" class="boxed wishlist-link">&#x2665; My Wishlist</a>
</li>
</ul>
<ul id="menu-account" class="desktop-only">
    <li data-menutitle="Search"><a id="search-desktop_link" href="#search, #search-field" class="js-open">Search</a></li>
    <?php
if (Yii::$app->user->isGuest) {
	print('<li data-menutitle="Login"><a href="' . Yii::$app->homeUrl . 'site/user">Login</a></li>');
} else {
	print('<li data-menutitle="My account" class="dropdown left top_menu">
  <a href="/user" class="select-icon">My account</a>
  <ul>
  <a href="/user/orders">My orders</a>
  <a href="' . Yii::$app->homeUrl . 'site/myaccount">My profile</a>
  <a href="/user/wishlist">My Wishlist</a>
  <a href="' . Yii::$app->homeUrl . 'site/logout">Log out</a>
  </ul>
  </li>');
}
?>
  <li data-menutitle="My bag" class="bag">
      <a id="cart-desktop_link" href="#bag-items" class="js-slide">
        <span class="invisible">My bag</span>
        <div class="bag-icon">
          <img src="<?=Yii::$app->homeUrl?>images/icon-bag.svg" class="mobile-only" alt="Open bag" />
          <img src="<?=Yii::$app->homeUrl?>images/icon-bag.png" class="mobile-hide" alt="Open bag" />
          <span class="bag_number_of_items"><?php $count = $cart->count();
echo $count;?></span>
      </div>
  </a>
</li>
</ul>
</nav>
</div>
</div>
<div id="sub-nav">
    <div id="shopping-cart" class="menu-holder cart">
        <div id="tablet-nav-header" class="nav-header">
            <a href="#" class="js-close close-icon x"><img src="<?=Yii::$app->homeUrl?>images/icon-close.svg" alt="Close menu" /></a>
        </div>
        <div id="bag-items" class="slideout content">
            <h2 class="h1">My bag</h2>
            <div class="need-help uppercase desktop-only">
                <ul><li><a class="subtitle-italic support-email" href="mailto:support@Jolilook.com"><em><span>support@Jolilook.com</span></em></a></li></ul>
            </div>
            <ul class="list-items">
                <?php
$listcart = $cart->getCart();
if ($listcart):
	foreach ($listcart as $item):
	?>
													                <li>
													                  <a href="#">
									                          <img src="<?=Yii::$app->homeUrl?><?php echo $item['image']; ?>" class="cart-preview"/>
													                  </a>
													                  <div class="cart-description">
													                    <p>Sản phẩm<strong><?php echo $item['ten']; ?></strong></p>
													                    <p>Màu sắc<strong><?php echo $item['mau']; ?></strong></p>
													                    <p>Loại<strong><?php if ($item['loai_trong'] === "RX") {
		echo "Đơn tròng";
	} else {
		echo "Đa tròng";
	}
	?></strong></p>
													                    <p class="desktop-only"> Giá tiền <strong><?php echo $item['gia']; ?></strong></p>
													                  </div>
													                  <a href="#" class="bag-remove" data-id="<?php echo $item['id']; ?>" data-lens = "<?php echo $item['loai_trong']; ?>">
													                    <img src="<?=Yii::$app->homeUrl?>images/icon-close.svg" alt="Close menu">
													                  </a>
													                </li>
													              <?php endforeach;?>
            <?php endif;?>
                <li class="cart-notification" style="display: none">
                    <div class="cart-notification-text">
                                        Please note: If your order contains pre-order items, your order will only ship once all items become available.
                    </div>
                </li>
            </ul>
            <div class="totals">
                <div class="desktop-only add-new-coupon-section" >
                    <div id="form_promocode" class="form promo-code">
                        <span class="add-new-coupon uppercase">I have a coupon code</span>
                        <div id="code" class="togglebox" style="display: block;">
                            <input type="text" placeholder="Enter your coupon code" id="couponcode" name="coupon" />
                            <button id="apply-coupon-code" class="button-icon invert icon-submit">Apply</button>
                            <div class="coupon-validation-section" style="position: absolute; left: 0px; top: -27px; text-transform: uppercase; font-weight: bold; font-size: 12px;min-width:300px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-only add-new-coupon-section" >
                    <div id="form_promocode_mobile" class="form promo-code">
                        <input type="text" placeholder="Promo code" id="promocode" name="coupon" />
                        <button class="button-apply-mobile button full">Apply</button>
                        <div class="coupon-validation-section" style="text-transform: uppercase; font-weight: bold; font-size: 20px; text-align: center; margin: 10px 0 20px 0;">
                        </div>
                    </div>
                </div>
                <div class="remove-new-coupon-section" >
                    <p class="coupon">
                        <a class="remove-coupon-code" data-code="" href="#">
                        Coupon <span class="uppercase"></span>
                        Applied<img src="<?=Yii::$app->homeUrl?>images/icon-close.svg" alt="remove coupon"/>
                        </a>
                    </p>
                </div>
                <p class="subtotal">Subtotal: <span id="subtotal">$0.00</span></p>
                <div class="buttons-holder">
                    <a id="continue_shopping" href="#" class="button js-close">Continue Shopping</a>
                    <a id="checkout" href="/checkout" class="button dark">Checkout</a>

                </div>
            </div>
        </div>
    </div>
    <div id="search">
        <div id="search-field" class="content">
            <form id="search-form" action="<?=Yii::$app->homeUrl?>site/search" method="get">
                <div class="holder">
                    <div id="search-suggest" class="text-center">cateye</div>
                    <input type="text" name="search-kwd" id="search-kwd" class="text-center" placeholder="Search" />
                </div>
                <a href="#" class="js-close close-icon"><img src="<?=Yii::$app->homeUrl?>images/icon-close.svg" alt="Close menu" /></a>
            </form>
        </div>
    </div>
</div>
</div>
</header>
 <?=$content?>
<footer>
<div class="wrapper">
        <div id="footer_container">
          <div class="row">
            <div class="footer-infos col-xs-12 col-sm-4 col-lg-2">
              <div class="footer-logo"><a href="/"><img src="<?=Yii::$app->homeUrl?>images/jolilook.png" alt="Jolilook" /></a>
              </div>
              <a href="/contact">Contact us</a>
              <a href="mailto:support@Jolilook.com">support@Jolilook.com</a>
              <a href="tel:1-877-755-6659">Call 1-877-755-6659</a>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 col-lg-push-2">
              <div class="social-icons">
                <a href="//www.facebook.com/Jolilook.eyewear" target="_blank"><img src="<?=Yii::$app->homeUrl?>images/icon_fb.png" alt="Facebook JoliLook" /></a>
                <a href="//twitter.com/JoliLook" target="_blank"><img src="<?=Yii::$app->homeUrl?>images/icon_tw.png" alt="Twitter JoliLook" /></a>
                <a href="//instagram.com/Jolilook" target="_blank"><img src="<?=Yii::$app->homeUrl?>images/icon_insta.png" alt="Instagram JoliLook" /></a>
                <a href="//pinterest.com/Jolilook/" target="_blank"><img src="<?=Yii::$app->homeUrl?>images/icon_pin.png" alt="Pinterest JoliLook" /></a>
                <a href="images/snap_chat_pop_up.jpg" target="_blank" class="popup"><img src="<?=Yii::$app->homeUrl?>images/snapchat_icon.png" alt="Snapchat JoliLook" /></a>
              </div>
              <nav class="footer-menu">
                <div class="row">
                  <div class="col-sm-6">
                    <a href="/return-policy">Return &amp; Shipping</a>
                    <a href="/contact#faq">FAQ</a>
                    <a href="/locations">Locations </a>
                  </div>
                  <div class="col-sm-6">
                    <a href="/about-us">About us</a>
                    <a href="/careers">Careers</a>
                    <a href="/rdv">Book an appointment</a>
                  </div>
                </div>
              </nav>
            </div>
            <div class="col-xs-12 col-sm-3 col-lg-4 mobile-hide newsletter-btn">
              <a href="#subscribeForm_container" class="button js-newsletter-subscribe">Join our newsletter</a>
            </div>
          </div>
          <div class="copyright">
            <p>&copy; Jolilook 2016</p>
            <a href="/terms-of-use">Privacy policy &amp; Terms</a>
          </div>
        </div>
        <div id="subscribeForm_container">
          <form id="subscribe-form" action="/signup" method="POST" data-contest="closed">
          <input type="hidden" name="id" value="fc5ab12bb4">
          <input type="hidden" name="MERGE4" id="MERGE4" value="en" />
          <input type="hidden" name="MERGE9" id="MERGE9" value="female" />
          <input type="hidden" name="origin" id="origin" value="web" />
          <div class="subscribe-form-content">
            <a href="#" class="js-close close-icon x invert">
            <img src="<?=Yii::$app->homeUrl?>images/icon-close.svg" alt="Close menu" /></a>
            <div class="grid grid-vcenter">
              <div class="col-xs-12 col-md-6">
                <h2 class="h2">Get the newsletter</h2>
                <p class="subscribe-msg">
        Sign up for our newsletter and be the first to know about the latest collections, events and promotions.                                            </p>
              </div>
              <div class="col-xs-12 col-md-6 form">
                <div class="grid grid-2-cols grid-bottom">
                  <div>
                    <label class="label">Enter your email</label>
                    <input type="email" name="MERGE0" id="MERGE0" placeholder="Email" required />
                  </div>
                  <div>
                    <button name="subscribe-submit" id="subscribe-submit" class="button dark">
                  SEND
                    </button>
                  </div>
                </div>
              </div>
              <div class="newsletter-subscription-message" style="display:none">
                <div class="success text-center">
                  <p>You are now subscribe to our newsletter!</p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
        <div class="newsletter-mobile-only mobile-only" data-is-logged-in="">
        <p>Subscribe to our newsletter
        <img src="<?=Yii::$app->homeUrl?>images/newsletter_arrow.jpg" alt="Arrow right"></p>
        <form class="newsletter-form">
        <input class="newsletter-email" type="email" name="newsletter-email" placeholder="Email">
        <input class="newsletter-submit" type="submit" name="newsletter-submit" value="OK"/>
        </form>
        </div>
  </div>
            </footer>

            <?php $this->endBody()?>
        </body>
        </html>
        <?php $this->endPage()?>
