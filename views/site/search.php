<?
$this->title = 'Result';
?>
<div id="main"  class=""  >
    <noscript>
    <div class="js_error">
        <h2>Javascript Disabled</h2>
        <p>We detect that the Javascript of your Browser is disable. That will make some functionalities in our website not to work.<br> <b>Please, enable javascript to enjoy a better user experience on our website.</b></p>
    </div>
</noscript>
<div class="promotion">
    <div class="page-content">
        <div class="view-as desktop-only">
            <span>View as</span>
            <a href="#catalog-listing" data-gridtype="grid-2-cols" class="grayed-out"><img src='<?=Yii::$app->homeUrl?>images/view-two-columns.svg' alt="Two columns" /></a>
            <a href="#catalog-listing" data-gridtype="grid-4-cols" class="grayed-out selected"><img src='<?=Yii::$app->homeUrl?>images/view-four-columns.svg' alt="Four columns" /></a>
        </div>
        <ul id="catalog-listing" class="grid products-list grid-2-cols nobullet">
            <?php foreach ($danhmuc as $muc): ?>
                <li class="grid-item">
                <div class="img">
                <ul class="main-img">
                <?php foreach ($ds_sanpham as $sanpham): ?>
                    <?php if ($sanpham->id_danhmuc === $muc->id): ?>
                        <li>
                        <a href="<?=Yii::$app->homeUrl?>site/product-details<?php echo "?id=" . $sanpham->id; ?>">
                            <img src="<?=Yii::$app->homeUrl?><?php echo $sanpham->image; ?>" alt="<?php echo $muc->tensp . " " . $sanpham->mau_sac; ?>"
                            title="<?php echo $muc->tensp . " " . $sanpham->mau_sac; ?>"/>
                        </a>
                        </li>
                    <?php endif?>
                <?php endforeach;?>
                </ul>
                </div>
                <ul class="infos">
                <li>
                    <div class="displayGenderOptions">
                        <ul class="product-categories">
                            <li><a class="button"><?php echo $muc->gioi_tinh; ?></a></li>
                        </ul>
                    </div>
                    <ul class="product_details">
                        <?php if ($muc->tag === "new"): ?>
                        <li class=" new ">
                        <div class="tag"><?php echo ucfirst($muc->tag); ?></div>
                        <?php endif?>
                        <h2 class="h2 subtitle"><?php echo ucfirst($muc->tensp); ?></h2>

                        <div class="price"><?php echo $muc->gia_don_trong . " VNĐ"; ?></div>
                </li>
                    </ul>
                </li>
                </ul>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
</div>
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?=Html::jsFile(Url::to(['js/products.js']))?>
<?=Html::jsFile(Url::to(['js/lazy_img_loader.js']))?>