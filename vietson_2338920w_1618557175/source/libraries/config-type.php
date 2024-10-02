<?php
    /* Config type - Group */
    $config['group'] = array(
        "Group Sản Phẩm" => array(
            "product" => array("san-pham"),
            "tag" => array("san-pham"),
            "photo_static" => array("san-pham")
        ),
        "Group Tin Tức" => array(
            "news" => array("tin-tuc")
        )
    );

    /* Config type - Product */
    require_once LIBRARIES.'type/config-type-product.php';

    /* Config type - Tags */
    //require_once LIBRARIES.'type/config-type-tags.php';

    /* Config type - Newsletter */
    //require_once LIBRARIES.'type/config-type-newsletter.php';

    /* Config type - News */
    require_once LIBRARIES.'type/config-type-news.php';

    /* Config type - Static */
    require_once LIBRARIES.'type/config-type-static.php';

    /* Config type - Photo */
    require_once LIBRARIES.'type/config-type-photo.php';

    /* Seo page */
    foreach ($config['static'] as $k => $v) {
      if(isset($v['seopage']) && $v['seopage']==true){
      $config['seopage']['page'][$k]=$v['title_main'];
      }
    }
    if(isset($config['product'])){
    foreach ($config['product'] as $k => $v) {
      if(isset($v['seopage']) && $v['seopage']==true){
      $config['seopage']['page'][$k]=$v['title_main'];  
      }
    }
    }
    foreach ($config['news'] as $k => $v) {
      if(isset($v['seopage']) && $v['seopage']==true){
      $config['seopage']['page'][$k]=$v['title_main'];
      }
    }

    foreach ($config['photo']['man_photo'] as $k => $v) {
      if(isset($v['seopage']) && $v['seopage']==true){
      $config['seopage']['page'][$k]=$v['title_main_photo'];
      }
    }
    $config['seopage']['width'] = 300;
    $config['seopage']['height'] = 200;
    $config['seopage']['thumb'] = '300x200x1';
    $config['seopage']['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

    /* Setting */
    $config['setting']['diachi'] = true;
    $config['setting']['dienthoai'] = true;
    $config['setting']['hotline'] = true;
    $config['setting']['zalo'] = true;
    $config['setting']['oaidzalo'] = true;
    $config['setting']['email'] = true;
    $config['setting']['website'] = true;
    $config['setting']['fanpage'] = true;
    $config['setting']['toado'] = true;
    $config['setting']['toado_iframe'] = true;

    /* Quản lý import */
    $config['import']['images'] = true;
    $config['import']['thumb'] = '100x100x1';
    $config['import']['img_type'] = ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF";

    /* Quản lý export */
    $config['export']['category'] = true;

    /* Quản lý tài khoản */
    $config['user']['active'] = true;
    $config['user']['admin'] = true;
    $config['user']['visitor'] = true;

    /* Quản lý phân quyền */
    $config['permission'] = true;

    /* Quản lý địa điểm */
    $config['places']['active'] = false;
    $config['places']['placesship'] = false;

    /* Quản lý giỏ hàng */
    $config['order']['active'] = true;
    $config['order']['search'] = false;
    $config['order']['ship'] = false;
    $config['order']['excel'] = false;
    $config['order']['word'] = false;
    $config['order']['excelall'] = false;
    $config['order']['wordall'] = false;
    $config['order']['thumb'] = '100x100x1';

    /* Quản lý thông báo đẩy */
    $config['onesignal'] = false;
?>