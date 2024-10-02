<div class="row mr-pro">
<?php
 for($i=0;$i<count($product);$i++) {
    $catesp = $d->rawQueryOne("select id, id_list, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options from #_product_cat where id = ? and type = ? limit 0,1",array($product[$i]['id_cat'],$type));
    ?>
    <div class="wrap-product col-6 col-sm-6 col-md-3 col-lg-3 wow fadeInUp">
        <div class="product hover_scaleing">
            <a class="text-decoration-none" href="<?=$product[$i][$sluglang]?>" title="<?=$product[$i]['ten'.$lang]?>">
                <div class="img-product">
                <img class="hover_scale" onerror="this.src='<?=THUMBS?>/<?=$config['product'][$product[$i]['type']]['width']?>x<?=$config['product'][$product[$i]['type']]['height']?>x1/assets/images/noimage.jpg';" src="<?=$func->checkwarter($config['website']['watermark'])?>/<?=$config['product'][$product[$i]['type']]['width']?>x<?=$config['product'][$product[$i]['type']]['height']?>x1/<?=UPLOAD_PRODUCT_L.$product[$i]['photo']?>" alt="<?=$product[$i]['ten'.$lang]?>"/>
                </div>
                <h3><?=$product[$i]['ten'.$lang]?></h3>
            </a>
            <div class="des-pro-in">
                <?=$product[$i]['mota'.$lang]?>
            </div>
            <?php if($idc){?>
            <div class="lbcompare">
              <label>
                  Thêm vào so sánh
                 
                  <input type="checkbox" name="addCompare" class="addcompare" data-category-id="<?=$catesp['tenkhongdauvi']?>" value="<?=$product[$i]['id']?>" <?php  if($arr_comp!=''){ if( in_array($product[$i]['id'], $arr_comp))echo 'checked';}?> <?php if($check_compare!='' && $check_compare!=$catesp['tenkhongdauvi'])echo 'disabled';?>> <span class="checkmark"></span>
              </label>
            </div>
            <?php }?>
            <p class="price">

                <span class="pricenew"><?=$func->pricenew($product[$i]['id'], ' đ')?></span> <span class="priceold"><?=$func->priceold($product[$i]['id'], ' đ')?></span>
                
            </p>
        </div>
    </div>
<?php } ?>
</div>