<div class="menu">
   <ul class="d-flex align-items-center justify-content-between wrap-content">
        <li class="transition">
            <a class="transition <?php if($com=='san-pham') echo 'active'; ?>" href="san-pham" title="<?=sanpham?>"><span> <img src="assets/images/img-data/iconpro.png" alt="<?=sanpham?>"><?=sanpham?></span></a>
            <?php if(count($splistmenu)) { ?>
                <ul class="transition">
                    <?php for($i=0;$i<count($splistmenu); $i++) {
                        $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_cat where find_in_set(?,id_list) and hienthi > 0 order by stt,id desc",array($splistmenu[$i]['id'])); ?>
                        <li class="transition">
                            <a class="transition" title="<?=$splistmenu[$i]['ten'.$lang]?>" href="<?=$splistmenu[$i][$sluglang]?>"><span><?=$splistmenu[$i]['ten'.$lang]?></span></a>
                            <?php if(count($spcatmenu)>0) { ?>
                                <ul class="transition">
                                    <?php for($j=0;$j<count($spcatmenu);$j++) {
                                        $spitemmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_item where id_cat = ? and hienthi > 0 order by stt,id desc",array($spcatmenu[$j]['id'])); ?>
                                        <li class="transition">
                                            <a class="transition" title="<?=$spcatmenu[$j]['ten'.$lang]?>" href="<?=$splistmenu[$i][$sluglang]?>/<?=$spcatmenu[$j][$sluglang]?>.html"><span><?=$spcatmenu[$j]['ten'.$lang]?></span></a>
                                            <?php if(count($spitemmenu)) { ?>
                                                <ul class="transition">
                                                    <?php for($u=0;$u<count($spitemmenu);$u++) {
                                                        $spsubmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_sub where id_item = ? and hienthi > 0 order by stt,id desc",array($spitemmenu[$u]['id'])); ?>
                                                        <li class="transition">
                                                            <a class="transition" title="<?=$spitemmenu[$u]['ten'.$lang]?>" href="<?=$spitemmenu[$u][$sluglang]?>"><span><?=$spitemmenu[$u]['ten'.$lang]?></span></a>
                                                            <?php if(count($spsubmenu)) { ?>
                                                                <ul>
                                                                    <?php for($s=0;$s<count($spsubmenu);$s++) { ?>
                                                                        <li class="transition">
                                                                            <a class="transition" title="<?=$spsubmenu[$s]['ten'.$lang]?>" href="<?=$spsubmenu[$s][$sluglang]?>"><span><?=$spsubmenu[$s]['ten'.$lang]?></span></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
        <li class="transition">
            <a class="transition <?php if($com=='tin-tuc') echo 'active'; ?>" href="tin-tuc" title="<?=tintuc?>"><span><img src="assets/images/img-data/icontin.png" alt="<?=tintuc?>"> <?=tintuc?></span></a>
        </li>
        <li class="transition"><a class="transition <?php if($com=='chinh-sach-dai-ly') echo 'active'; ?>" href="chinh-sach-dai-ly" title="Đại Lý"><span><img src="assets/images/img-data/iconcsach.png" alt="Đại Lý"> Đại Lý</span></a></li>
        <li class="transition"><a class="transition <?php if($com=='ho-tro') echo 'active'; ?>" href="ho-tro" title="Hỗ Trợ"><span> <img src="assets/images/img-data/iconhtro.png" alt="Hỗ Trợ"> Hỗ Trợ</span></a></li>
        
    </ul>
</div>
<?php if(array_key_exists($login_member, $_SESSION) && $_SESSION[$login_member]['active'] == true) { ?>
    <div class="user-header">
        <a href="account/thong-tin-ca-nhan">
            Hi, <span><?=$_SESSION[$login_member]['ten']?></span>
        </a>
    </div>
<?php } else { ?>
    <div class="user-header">
        <a href="account/dang-nhap">
            <i class="fas fa-user"></i>
            <span class="hidemb">Đăng Nhập</span>
        </a>
    </div>
<?php } ?>