<?php 
	$arrid=$_GET['productid'];
	$exp=explode(',', $arrid);
	$arrcomp=array('');
	foreach ($exp as $k => $val) {
		$arrcomp[]=$val;
	}
	$product = $d->rawQuery("select id,id_list,id_cat,ten$lang,mota$lang, tenkhongdauvi, tenkhongdauen,photo,masp,type from #_product where type = ? and hienthi > 0 order by stt,id desc",array('san-pham'));

	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();
	unset($_SESSION['compare']);
?>