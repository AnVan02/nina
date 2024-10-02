<div class="about-index">
	<div class="img-about wow fadeInRight">
		<img src="<?=THUMBS?>/665x570x1/<?=UPLOAD_NEWS_L.$sale['photo']?>" alt="<?=$sale['ten'.$lang]?>">
	</div>
	<div class="content-about wow fadeInLeft">
		<div class="wrap-content-ab">
			<div class="textdescr"><?=htmlspecialchars_decode($sale['mota'.$lang])?></div>
			<a href="chuong-trinh-khuyen-mai" class="text-decoration-none readmore">Xem Thêm <i class="bi bi-chevron-double-right"></i></a>
		</div>
		
	</div>
	
</div>
<div class="product-hot">
	<div class="img-pro-hot wow fadeInRight">
		<img src="<?=THUMBS?>/630x470x1/<?=UPLOAD_PHOTO_L.$prohot['photo']?>" alt="<?=$prohot['ten'.$lang]?>">
	</div>
	<div class="content-prohot wow fadeInLeft">
		<div class="wrap-ct-pr">
			<div class="label-pro">Sản phẩm tiêu biểu</div>
			<h2><?=$prohot['ten'.$lang]?></h2>
			<p><?=$prohot['mota'.$lang]?></p>
			<a href="<?=$prohot['link']?>" class="text-decoration-none readmore no-shadow">Xem Thêm <i class="bi bi-chevron-double-right"></i></a>
		</div>
	</div>
</div>

<div class="scroll_product owl-carousel owl-theme">
	<?php foreach ($product as $k => $val) {?>
		<div class="padd-pro">
			<div class="item-pro">
				<div class="img-pro">
					<a href="<?=$val[$sluglang]?>" title="<?=$val['ten'.$lang]?>">
					<img class="hover_scale" onerror="this.src='<?=THUMBS?>/285x320x2/assets/images/noimage.png';" src="<?=THUMBS?>/285x320x1/<?=UPLOAD_PRODUCT_L.$val['photo']?>" alt="<?=$val['ten'.$lang]?>"/>
					</a>
				</div>
				<div class="descr-pro">
					<a href="<?=$val[$sluglang]?>" title="<?=$val['ten'.$lang]?>" class="text-decoration-none">
						<h3><?=$val['ten'.$lang]?></h3>
					</a>
					<div class="sku"><?=$val['masp']?></div>
					<p><?=$val['mota'.$lang]?></p>
					<a href="<?=$val[$sluglang]?>" class="text-decoration-none readmore no-shadow">Xem Thêm <i class="bi bi-chevron-double-right"></i></a>
				</div>
				
			</div>
		</div>
	<?php }?>
</div>
