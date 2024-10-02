<div class="newsletter-socical">
    <div class="wrap-content">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="newsletter">
                    <h3>Đăng ký nhận thông tin mới nhất từ Viết Sơn</h3>
                    <form class="form-newsletter validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                        <div class="newsletter-input">
                            <input type="email" class="form-control" id="email-newsletter" name="email-newsletter" placeholder="<?=nhapemail?>" required />
                            <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                        </div>
                        <div class="newsletter-button">
                            <input type="submit" name="submit-newsletter" value="<?=gui?>" disabled>
                            <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="social">
                    <?php for($i=0;$i<count($social);$i++) { ?>
                        <a href="<?=$social[$i]['link']?>" target="_blank"><img class="hover_scale" src="<?=UPLOAD_PHOTO_L.$social[$i]['photo']?>" alt="<?=$social[$i]['ten'.$lang]?>"></a>
                    <?php } ?>
                </div>
                <div class="hotline">
                    <p><?=$optsetting['hotline']?></p>
                    <?=$optsetting['email']?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-article">
    <div class="wrap-content d-flex align-items-start justify-content-between">
        <div class="footer-news">
            <h2 class="title-footer">Về chúng tôi</h2>
            <ul class="footer-ul">
                <?php foreach($vect as $v) { ?>
                    <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"> <?=$v['ten'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="footer-news">
            <h2 class="title-footer"><?=chinhsach?></h2>
            <ul class="footer-ul">
                <?php foreach($cs as $v) { ?>
                    <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"> <?=$v['ten'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="footer-news">
            <h2 class="title-footer">Liên kết ngân hàng</h2>
            <div class="icon-bank">
                <?php foreach($bank as $v) { ?>
                    <a class="bankimg text-decoration-none" href="<?=$v['link']?>" target="_blank" title="<?=$v['ten'.$lang]?>">
                        <img class="hover_scale" onerror="this.src='<?=THUMBS?>/54x33x2/assets/images/noimage.jpg';" src="<?=THUMBS?>/54x33x1/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"/>
                    </a>
                <?php }?>
            </div>
        </div>

        <div class="footer-news">
            <?=$addons->setAddons('footer-map', 'footer-map', 10);?>
        </div>
    </div>
</div>
<div class="footer-powered">
    <div class="wrap-content">
    <p>&copy; <span id="current-year"><script>document.write(new Date().getFullYear());</script></span> Bản quyền thuộc về CÔNG TY CỔ PHẦN TIN HỌC  <a href="https://www.vietsontdc.com/" ref="nofollow"> VIẾT SƠN</a></p>
       
    </div>
</div>

<?=$addons->setAddons('messages-facebook', 'messages-facebook', 10);?>

<?php if($com!='gio-hang') { ?>
    <a class="cart-fixed text-decoration-none" href="gio-hang" title="Giỏ hàng">
        <i class="fas fa-shopping-bag"></i>
        <span class="count-cart"><?=(isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
    </a>
<?php } ?>
<a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/zl.png" alt="Zalo"></i>
</a>
<a class="btn-phone btn-frame text-decoration-none" href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/hl.png" alt="Hotline"></i>
</a>