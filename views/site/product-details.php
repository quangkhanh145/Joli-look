<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $danhmuc->tensp . ' | JoliLook';
?>
<div id="main"  class="page-product">
    <noscript>
        <div class="js_error">
            <h2>Javascript Disabled</h2>
            <p>We detect that the Javascript of your Browser is disable. That will make some functionalities in our website not to work.<br> <b>Please, enable javascript to enjoy a better user experience on our website.</b></p>
        </div>
    </noscript>
    <style>
        @media only screen and (min-width: 721px) {
            #sub-nav,
            #footer_container, header .content-holder { max-width: none; }
        }
    </style>
    <div id="product_details_block">
        <div class="product-details">
            <div class="product-img">
                <div class="swipe">
                    <a href="" class="icon-prev preventDef"><img src="<?=Yii::$app->homeUrl?>images/icon-back.svg" alt="Previous" class="" /></a>
                    <ul class="img-holder nobullet">
                        <li class="font-image">
                        <img src="<?=Yii::$app->homeUrl?><?php echo $sanpham->image; ?>" alt="<?php echo $danhmuc->tensp . " " . $sanpham->mau_sac; ?>"
                            title="<?php echo $danhmuc->tensp . " " . $sanpham->mau_sac; ?>"/>
                        </li>
                    </ul>
                    <div class="measurements-overlay" data-view="front">
                        <a class="overlay-trigger"></a>
                        <div class="overlay-lensDiameter overlay-item horizontal below" title="Lens Diameter"><span>50mm</span></div>
                        <div class="overlay-lensDepth overlay-item vertical" title="Lens Depth">
                            <div class="vert-wrap">
                                <span>43mm</span>
                            </div>
                        </div>
                        <div class="overlay-bridgeWidth overlay-item horizontal second" title="Bridge Width"><span>21mm</span></div>
                        <div class="overlay-templeLength overlay-item horizontal temple" title="Temple Length"><span>135mm</span></div>
                        <div class="overlay-frameWidth overlay-item horizontal first" title="Frame Width"><span>132mm</span></div>
                    </div>
                    <a href="" class="icon-next preventDef"><img src="<?=Yii::$app->homeUrl?>images/icon-back.svg" alt="Next" class="" /></a>
                </div>
            </div>
            <div class="product-desc">
                <div class="product-info rel">
                    <ul class="nobullet">
                        <li>
                            <h1 class="col-sm-12 h2 uppercase">
                                <?php echo $danhmuc->tensp; ?>
                            </h1>
                            <p class="col-sm-12 color uppercase brandon">
                                <?php echo $sanpham->mau_sac; ?>
                            </p>
                            <p class="price col-sm-12 brandon new">
                                <span class="row col-sm-12"> Giá chỉ từ </span>
                                <span class="row col-sm-12">
                                    <strong class="price "><?php echo $danhmuc->gia_don_trong; ?></strong>
                                </span>
                            </p>
                            <p><strong>Bao gồm kính thuốc</strong></p>
                            <p class="mobile-only hspace">Giao hàng miễn phí & Miễn phí đổi trả trong 30 ngày</p>
                        </li>
                    </ul>
                    <div id="choose-lenses" class="hide">
                        <p class="h2 uppercase"><?php echo $danhmuc->tensp; ?></p>
                        <p class="color uppercase brandon"><?php echo $sanpham->mau_sac; ?></p>
                        <a href="#" class="icon-remove"><span class="invisible">Close</span></a>
                        <ul class="nobullet">
                            <li class="h-space border-bottom">
                                <div class="grid">
                                    <div class="w-75 text-left">
                                        <input type="radio" class="cute-radio" name="rx_type" value= "RX" id="RX"/>
                                        <label for="RX">Tròng đơn</label>
                                    </div>
                                    <strong class="w-25 h3 text-right "><?php echo $danhmuc->gia_don_trong; ?></strong>
                                </div>
                                <p class="text-left"></p>
                            </li>
                            <li class="h-space border-bottom">
                                <div class="grid">
                                    <div class="w-75 text-left">
                                        <input type="radio" class="cute-radio" name="rx_type" value="PROG" id="PROG"  />
                                        <label for="PROG">Đa tròng</label>
                                    </div>
                                    <strong class="w-25 h3 text-right "><?php echo $danhmuc->gia_da_trong; ?></strong>
                                </div>
                                <p class="text-left "></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <a id="buyfrom" class="button dark">
                Mua với giá từ<?php echo " " . $danhmuc->gia_don_trong; ?>
                </a>
                <a id="addtocart" class="button dark" style="display: none;">Thêm vào giỏ</a>
                <p class="text-center uppercase">
                    <a wl-state="add" class="wl-link text-link">&hearts; Thêm vào danh sách mong muốn </a>
                    <div id="wl-notlogged" style="display:none">
                    </div>
                </p>
                <div class="social-icons">
                    <img class="facebook-share" src="<?=Yii::$app->homeUrl?>images/icon_fb.png" alt="Facebook share" />
                    <img class="twitter-share" src="<?=Yii::$app->homeUrl?>images/icon_tw.png" alt="Twitter share" />
                    <img class="pinterest-share" src="<?=Yii::$app->homeUrl?>images/icon_pin.png" alt="Pinterest share" />
                </div>
            </div>
        </div>
    </div>
</div>
<?=Html::jsFile(Url::to(['js/products.js']))?>
<?=Html::jsFile(Url::to(['js/lazy_img_loader.js']))?>
<script>
    $('#product_details_block').on('click', '#addtocart', function(e)
            {
                var id = "<?php echo $sanpham->id; ?>";
                if ($("input[name='rx_type']:checked").length > 0){
                    var lens = $("input[name='rx_type']:checked").attr('value');
                    $.ajax({
                    url: "../cart/addcart",
                    type:'post',
                    data: {id: id, lens: lens,
                _csrf : '<?=Yii::$app->request->getCsrfToken()?>'},
                    success: function (data){
                        if(data.success == true){
                            var count = data.count;
                            $('.bag_number_of_items').html(count.toString());
                            $('#bag-items').openMenu();
                        }
                    }
                });
                }
            });
</script>

