<?php
	$func->checkHTTP($http,$config['arrayDomainSSL'],$config_base,$config_url);
	/* Validate URL */
	$func->checkUrl($config['website']['index']);

	/* Check login */
    $func->checkLogin();

	/* Mobile detect */
    $deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
    if($config['website']['mobile']=='true'){
    if($deviceType == 'computer') @define('TEMPLATE','./templates/');
    else @define('TEMPLATE','./templates_mobile/');
   	}else{
   		@define('TEMPLATE','./templates/');
   	}

    /* Watermark */
    $wtmPro = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark','photo_static'));
	$wtmNews = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark-news','photo_static'));

    /* Router */
    $router->setBasePath($config['database']['url']);
    $router->map('GET',array('admin/','admin'), function(){
		global $func, $config;
		$func->redirect($config['database']['url']."admin/index.php");
		exit;
	});
	$router->map('GET',array('admin','admin'), function(){
		global $func, $config;
		$func->redirect($config['database']['url']."admin/index.php");
		exit;
	});
    $router->map('GET|POST', '', 'index', 'home');
    $router->map('GET|POST', 'index.php', 'index', 'index');
    $router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
    $router->map('GET|POST', '[a:com]', 'allpage', 'show');
    $router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
    $router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
    $router->map('GET|POST', '[a:brand]/[a:cate].html', 'brand', 'brandpage');
    $router->map('GET', THUMBS.'/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func;
        $func->createThumb($w,$h,$z,$src,null,THUMBS);
    },'thumb');
    if($config['website']['watermark']==true){
    $router->map('GET', WATERMARK.'/product/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func, $wtmPro;
        $func->createThumb($w,$h,$z,$src,$wtmPro,"product");
    },'watermark');
    $router->map('GET', WATERMARK.'/news/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func, $wtmNews;
        $func->createThumb($w,$h,$z,$src,$wtmNews,"news");
    },'watermarkNews');
    }
   	$match = $router->match();

	if(is_array($match))
	{
		if(is_callable($match['target']))
		{
			call_user_func_array($match['target'], $match['params']); 
		}
		else
		{
			if(isset($match['params']['brand']))
			{
				$brand = $match['params']['brand'];
				$cate = $match['params']['cate'];
				$com = 'san-pham';
			}
			else
			{
				$com = (isset($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
			}
			$get_page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;

		}
	}
	else
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit;
	}

    /* Setting */
    $sqlCache = "select * from #_setting";
    $setting = $cache->getCache($sqlCache,'fetch',7200);
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;

    /* Lang */
    if(isset($match['params']['lang']) && $match['params']['lang'] != '') $_SESSION['lang'] = $match['params']['lang'];
    else if(!isset($_SESSION['lang']) && !isset($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
    $lang = $_SESSION['lang'];

    /* Slug lang */
    $sluglang = 'tenkhongdauvi';

    /* SEO Lang */
    $seolang = "vi";

    /* Require datas */
    require_once LIBRARIES."lang/lang$lang.php";
    require_once SOURCES."allpage.php";

	/* Tối ưu link */
	$requick=array();
	if(isset($config['product'])){
	foreach ($config['product'] as $key => $value) {
		if(isset($value['list']) && $value['list']==true ){
			$requick[]=array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>$key,"type"=>$key);
		}
		if(isset($value['cat']) && $value['cat']==true){
			$requick[]=array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>$key,"type"=>$key);
		}
		if(isset($value['item']) && $value['item']==true){
			$requick[]=array("tbl"=>"product_item","field"=>"idi","source"=>"product","com"=>$key,"type"=>$key);
		}
		if(isset($value['sub']) && $value['sub']==true){
			$requick[]=array("tbl"=>"product_sub","field"=>"ids","source"=>"product","com"=>$key,"type"=>$key);
		}
		if(isset($value['brand']) && $value['brand']==true){
		$requick[]=array("tbl"=>"product_brand","field"=>"idb","source"=>"product","com"=>"thuong-hieu","type"=>$key);
		}
		if(isset($value['sitemap']) && $value['sitemap']==true){
		$requick[]=array("tbl"=>"product","field"=>"id","source"=>"product","com"=>$key,"type"=>$key,'menu'=>true);
		}	
		/* Tags */
		if(isset($value['tags']) && $value['tags']==true){
		$requick[]=array("tbl"=>"tags","tbltag"=>"product","field"=>"id","source"=>"tags","com"=>"tags-".$key,"type"=>$key,'menu'=>true);
		}

	}

	
	}
	foreach ($config['news'] as $key => $value) {
		if(isset($value['list'])  && $value['list']==true){
		$requick[]=array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>$key,"type"=>$key);
		}
		if(isset($value['cat']) && $value['cat']==true){
		$requick[]=array("tbl"=>"news_cat","field"=>"idc","source"=>"news","com"=>$key,"type"=>$key);
		}
		if(isset($value['item']) && $value['item']==true){
		$requick[]=array("tbl"=>"news_item","field"=>"idi","source"=>"news","com"=>$key,"type"=>$key);
		}
		if(isset($value['sub']) && $value['sub']==true){
		$requick[]=array("tbl"=>"news_sub","field"=>"ids","source"=>"news","com"=>$key,"type"=>$key);
		}
		if(isset($value['sitemap']) && $value['sitemap']==true){
		$requick[]=array("tbl"=>"news","field"=>"id","source"=>"news","com"=>$key,"type"=>$key,'menu'=>true);
		}	
		if(isset($value['tags']) && $value['tags']==true){
		$requick[]=array("tbl"=>"tags","tbltag"=>"product","field"=>"id","source"=>"tags","com"=>"tags-".$key,"type"=>$key,'menu'=>true);
		}

	}

	foreach ($config['static'] as $key => $value) {
		if(isset($value['sitemap']) && $value['sitemap']==true){
		$requick[]=array("tbl"=>"static","field"=>"id","source"=>"static","com"=>$key,"type"=>$key,'menu'=>$value['sitemap']);
		}
	}


	/* Find data */
	if(empty($brand) && $com != 'tim-kiem' && $com != 'account' && $com != 'sitemap')
	{
		foreach($requick as $k => $v)
		{
			$url_tbl = (isset($v['tbl']) && $v['tbl'] != '') ? $v['tbl'] : '';
			$url_tbltag = (isset($v['tbltag']) && $v['tbltag'] != '') ? $v['tbltag'] : '';
			$url_type = (isset($v['type']) && $v['type'] != '') ? $v['type'] : '';
			$url_field = (isset($v['field']) && $v['field'] != '') ? $v['field'] : '';
			$url_com = (isset($v['com']) && $v['com'] != '') ? $v['com'] : '';
			
			if($url_tbl!='' && $url_tbl!='static' && $url_tbl!='photo')
			{
				$row = $d->rawQueryOne("select id from #_$url_tbl where $sluglang = ? and type = ? and hienthi > 0 limit 0,1",array($com,$url_type));
				
				if($row['id'])
				{
					$_GET[$url_field] = $row['id'];
					$com = $url_com;
					break;
				}
			}
		}
	}

	foreach ($config['static'] as $key => $value) {

		if($com==$key){
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_main=$title_crumb = $value['title_main'];
			break;
		}
	}
	if(isset($config['product'])){
	foreach ($config['product'] as $key => $value) {
		if($com==$key){
			$source = "product";
			$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			if($value['sitemap']==true){
			$title_main=$title_crumb = $value['title_main'];
			}
			break;
		}
	}
	}
	foreach ($config['news'] as $key => $value) {
		if($com==$key){
			$source = "news";
			if($key=='hinh-anh'){
				$pagset=12;
				$template = isset($_GET['id']) ? "album/album_detail" : "album/album";
				
				
			}else{
				$pagset=12;
				$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			}
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			if($value['sitemap']==true){
				$title_main=$title_crumb = $value['title_main'];
			}
			break;
		}
	}



	/* Switch coms */
	switch($com)
	{
		case 'ho-tro':
			$source = "contact";
			$template = "contact/contact";
			$seo->setSeo('type','object');
			$type = $com;
			$title_main=$title_crumb = 'Hỗ Trợ';
			break;

		case 'album':
			$template = "album/hinhanh";
			$seo->setSeo('type','object');
			$type = $com;
			$title_main=$title_crumb = 'Album';
			break;

		case 'view':
			$source = "view_product";
			break;

		case 'gio-hang':
			$source = "order";
			$template = "order/order";
			$seo->setSeo('type','object');
			$type = $com;
			$title_main=$title_crumb = 'Giỏ Hàng';
			break;

		case 'tim-kiem':
			$source = "search";
			$template = "product/product";
			$seo->setSeo('type','object');
			$type = $com;
			$title_main=$title_crumb = timkiem;
			break;

		case 'tags-san-pham':
			$source = "tags";
			$template = "product/product";
			$type = $url_type;
			$table = $url_tbltag;
			$seo->setSeo('type','object');
			$title_crumb = null;
			break;

		case 'so-sanh-san-pham':
			$source = "compare";
			$template = "compare/compare";
			$type = $com;
			$seo->setSeo('type','object');
			$title_main=$title_crumb = "So sánh sản phẩm";
			break;

		
		case 'video':
			$source = "video";
			$template = "video/video";
			$type = $com;
			$seo->setSeo('type','object');
			$title_main=$title_crumb = "Video Clip";
			break;



		case 'account':
			$source = "user";
			$type="dang-ky";
			break;

		case 'ngon-ngu':
			if(isset($lang))
			{
				switch($lang)
				{
					case 'vi':
						$_SESSION['lang'] = 'vi';
						break;
					case 'en':
						$_SESSION['lang'] = 'en';
						break;
					case 'ci':
						$_SESSION['lang'] = 'ci';
						break;
					default:
						$_SESSION['lang'] = 'vi';
						break;
				}
			}
			$func->redirect($_SERVER['HTTP_REFERER']);
			break;

		case 'sitemap':
			include_once LIBRARIES."sitemap.php";
			exit();
			
		case '':
		case 'index':
			$source = "index";
			$template ="index/index";
			$seo->setSeo('type','website');
			break;

		default: 
		if(!isset($template)){
			header('HTTP/1.0 404 Not Found', true, 404);
			include("404.php");
			exit();
		}
	}

	/* Include sources */
	if($source!='') include SOURCES.$source.".php";
	if(!isset($template))
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
	}
	if($source!='index'){

	$banner = $d->rawQueryOne("select id, photo, options from #_photo where type = ? and act = ? limit 0,1",array('banner-'.$type,'photo_static'));
	}
?>