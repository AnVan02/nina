<div class="wrap-content">
	<div class="row">
		<?php for($i=0;$i<count($product);$i++) {
			if(!in_array($product[$i]['id'],$arrcomp)) continue;
			$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_list where id = ? and type = ? and hienthi > 0 limit 0,1",array($product[$i]['id_list'],'san-pham'));
			$pro_cat = $d->rawQueryOne("select id, id_thuoctinh, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_cat where id = ? and type = ? and hienthi > 0 limit 0,1",array($product[$i]['id_cat'],'san-pham'));
			$arr_tt = explode(',', $pro_cat['id_thuoctinh']);
			$properties = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id, photo from #_product_brand where type = ? and hienthi > 0 order by stt,id desc",array('san-pham'));
			?>
		<div class="col-6 col-sm-6 col-md-3 col-lg-3">
			<div class="product">
				<a class="text-decoration-none" href="<?=$product[$i][$sluglang]?>" title="<?=$product[$i]['ten'.$lang]?>">
	                <div class="img-product">
	                <img class="hover_scale" onerror="this.src='<?=THUMBS?>/<?=$config['product'][$product[$i]['type']]['width']?>x<?=$config['product'][$product[$i]['type']]['height']?>x1/assets/images/noimage.jpg';" src="<?=$func->checkwarter($config['website']['watermark'])?>/<?=$config['product'][$product[$i]['type']]['width']?>x<?=$config['product'][$product[$i]['type']]['height']?>x1/<?=UPLOAD_PRODUCT_L.$product[$i]['photo']?>" alt="<?=$product[$i]['ten'.$lang]?>"/>
	                </div>
	                <h3><?=$product[$i]['ten'.$lang]?></h3>
	            </a>
	            <p class="price"><span class="pricenew"><?=$func->pricenew($product[$i]['id'], ' đ')?></span> <span class="priceold"><?=$func->priceold($product[$i]['id'], ' đ')?></span></p>
	            <ul class="properties">
	            	<li>
	            		<span class="pull-left">Thương hiệu</span>
	            		<strong class="pull-right"><?=$pro_list['ten'.$lang]?></strong>
	            	</li>
	            	<?php foreach ($properties as $k => $val) {
	            		if(!in_array($val['id'],$arr_tt)) continue;
	            		$giatri = $d->rawQueryOne("select * from #_product_properties where id_properties = ? and id_cat = ? and id_product= ? limit 0,1",array($val['id'],$pro_cat['id'],$product[$i]['id']));
	            		?>
	            	<li>
	            		<span class="pull-left"><?=$val['ten'.$lang]?></span>
	            		<strong class="pull-right"><?=$giatri['giatri']?></strong>
	            	</li>
	            	<?php }?>
	            </ul>
        	</div>
		</div>
		<?php }?>
	</div>
</div>