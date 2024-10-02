<div class="wrap-content">
    <div class="grid-pro-detail w-clear">
        <div class="left-pro-detail w-clear">
            <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: true; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?=$func->checkwarter($config['website']['watermark'])?>/<?=$config['product'][$row_detail['type']]['width']*2?>x<?=$config['product'][$row_detail['type']]['height']*2?>x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>"><img onerror="this.src='<?=$func->checkwarter($config['website']['watermark'])?>/560x450x2/assets/images/noimage.png';" src="<?=$func->checkwarter($config['website']['watermark'])?>/560x450x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>"></a>
            
                <div class="gallery-thumb-pro">
                    <div class="owl-thumb-pro">
                        <div class="padd-thumb-pro">
                            <div class="item-thumb-pro">
                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=$func->checkwarter($config['website']['watermark'])?>/560x450x2/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>"><img onerror="this.src='<?=$func->checkwarter($config['website']['watermark'])?>/560x450x2/assets/images/noimage.png';" src="<?=$func->checkwarter($config['website']['watermark'])?>/560x450x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>"></a>
                            </div>
                        </div>
                        <?php if($hinhanhsp) { if(count($hinhanhsp) > 0) { ?>
                        <?php foreach($hinhanhsp as $v) { ?>
                            <div class="padd-thumb-pro">
                                    <div class="item-thumb-pro">
                                    <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=$func->checkwarter($config['website']['watermark'])?>/560x450x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
                                        <img onerror="this.src='<?=$func->checkwarter($config['website']['watermark'])?>/560x450x2/assets/images/noimage.png';" src="<?=$func->checkwarter($config['website']['watermark'])?>/560x450x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php } } ?>
                    </div>
                </div>
           
        </div>

        <div class="right-pro-detail w-clear">
            <h2 class="title-pro-detail"><?=$row_detail['ten'.$lang]?></h2>
            <div class="social-plugin social-plugin-pro-detail w-clear">
                <div class="addthis_inline_share_toolbox_qj48"></div>
                <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
            </div>
            <ul class="attr-pro-detail">
                <li class="w-clear"> 
                    <label class="attr-label-pro-detail">Mã SP:</label>
                    <div class="attr-content-pro-detail"><?=(isset($row_detail['masp']) && $row_detail['masp'] != '') ? $row_detail['masp'] : 0?></div>
                </li>

                <li class="w-clear">
                    <label class="attr-label-pro-detail">Hãng:</label>
                    <div class="attr-content-pro-detail"><a class="text-decoration-none" href="<?=$pro_list[$sluglang]?>" title="<?=$pro_list['ten'.$lang]?>"><?=$pro_list['ten'.$lang]?></a></div>
                </li>
                <li class="w-clear">
                    <div class="attr-content-pro-detail">
                        <?php if(isset($_SESSION[$login_member]['active']) || ($_SESSION[$login_member]['active'])){?>
                            <?php if($row_detail['giasi']>0){?>
                                <span class="pricenew"><?=number_format($row_detail['giasi'],0,",",",")?> đ</span>
                            <?php }else{?>
                            <span class="pricenew"><?=$func->pricenew($row_detail['id'], ' đ')?></span> <span class="priceold"><?=$func->priceold($row_detail['id'], ' đ')?></span>
                            <?php }?>
                        <?php }else{?>
                            <span class="pricenew"><?=$func->pricenew($row_detail['id'], ' đ')?></span> <span class="priceold"><?=$func->priceold($row_detail['id'], ' đ')?></span>
                        <?php }?>
                        
                    </div>
                </li>
                <li class="desc-pro-detail"><?=(isset($row_detail['mota'.$lang]) && $row_detail['mota'.$lang] != '') ? htmlspecialchars_decode($row_detail['mota'.$lang]) : ''?></li>
               
                <li class="w-clear"> 
                    <label class="attr-label-pro-detail"><?=soluong?>:</label>
                    <div class="attr-content-pro-detail">
                        <div class="quantity-pro-detail">
                            <span class="quantity-minus-pro-detail">-</span>
                            <input type="number" class="qty-pro" min="1" max="<?=$row_detail['soluong']?>" numb="<?=$cart->maxnumber($row_detail['id'])?>"  value="<?=$cart->shownumber($row_detail['id'])?>" readonly />
                            <span class="quantity-plus-pro-detail">+</span>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="cart-pro-detail">
                <a class="transition buynow addcart text-decoration-none" data-id="<?=$row_detail['id']?>" data-action="buynow"><span>Mua ngay</span></a>
                <a class="transition addnow addcart text-decoration-none" data-id="<?=$row_detail['id']?>" data-action="addnow"><span>Thêm vào giỏ hàng</span></a>
                
            </div>
        </div>

        <div class="clear"></div>
        <?php if(isset($pro_tags) && count($pro_tags) > 0) {?>
        <div class="tags-pro-detail w-clear">
            <?php foreach($pro_tags as $v) { ?>
                <a class="transition text-decoration-none w-clear" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><i class="fas fa-tags"></i><?=$v['ten'.$lang]?></a>
            <?php }?>
        </div>
        <?php }?>

        <div class="clear"></div>

        <div class="tabs-pro-detail">
            <ul class="ul-tabs-pro-detail w-clear">
                <li class="active" data-tabs="info-pro-detail">Thông tin chi tiết</li>
                <li class="" data-tabs="config-pro-detail">Cấu hình chi tiết</li>
                <li class="" data-tabs="note-pro-detail">Lưu ý</li>
            </ul>
            <div class="content-tabs-pro-detail info-pro-detail active"><?=(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') ? htmlspecialchars_decode($row_detail['noidung'.$lang]) : ''?></div>
            <div class="content-tabs-pro-detail config-pro-detail"><?=(isset($row_detail['cauhinh'.$lang]) && $row_detail['cauhinh'.$lang] != '') ? htmlspecialchars_decode($row_detail['cauhinh'.$lang]) : ''?></div>
            <div class="content-tabs-pro-detail note-pro-detail"><?=(isset($row_detail['luuy'.$lang]) && $row_detail['luuy'.$lang] != '') ? htmlspecialchars_decode($row_detail['luuy'.$lang]) : ''?></div>
        </div>
    </div>
    <?php if(count($product)>0){?>
    <div class="title-main"><span>Sản phẩm liên quan</span></div>
    <div class="content-main w-clear">
        <?php
            include TEMPLATE.LAYOUT."product.php";
        ?>
        <div class="clear"></div>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    </div>
    <?php }?>
</div>