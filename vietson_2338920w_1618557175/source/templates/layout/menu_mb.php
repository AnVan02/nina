<div class="menuRightMain">
	<div class="menuRight">
		<ul>
      <div class="logo_mobile">
        <a  href=""><img class="transition" src="<?=THUMBS?>/180x55x2/<?=UPLOAD_PHOTO_L.$logo['photo']?>" alt="Logo"/></a>
      </div>
      <div class="search">
        <input type="text" id="keyword" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword');"/>
        <p onclick="onSearch('keyword');"><i class="fas fa-search"></i></p>
    </div>
      <li class="transition">
          <a class="transition" href="" title="<?=trangchu?>"><span><?=trangchu?></span></a>
      </li>
      <li class="sub">
          <a href="san-pham">
           <span class="msci">Sản Phẩm</span>
          </a>
          <?php if(count($splistmenu)>0){?>
          <i class="fas fa-angle-down"></i>
          <ul >
            <?php for($i=0;$i<count($splistmenu); $i++) {
                $spcatmenu = $d->rawQuery("SELECT ten$lang, tenkhongdauvi, tenkhongdauen, id FROM table_product_cat WHERE hienthi=1 AND id_list = ? ORDER BY stt,id DESC",array($splistmenu[$i]['id'])); ?>
                <li class="sub">
                    <a  title="<?=$splistmenu[$i]['ten'.$lang]?>" href="<?=$splistmenu[$i][$sluglang]?>"><span><?=$splistmenu[$i]['ten'.$lang]?></span></a>
                    <?php if(count($spcatmenu)>0) { ?>
                      <i class="fas fa-angle-down"></i>
                        <ul >
                            <?php for($j=0;$j<count($spcatmenu);$j++) {
                                $spitemmenu = $d->rawQuery("SELECT ten$lang, tenkhongdauvi, tenkhongdauen, id FROM table_product_item WHERE hienthi=1 AND id_cat = ? ORDER BY stt,id DESC",array($spcatmenu[$j]['id'])); ?>
                                <li class="sub">
                                    <a  title="<?=$spcatmenu[$j]['ten'.$lang]?>" href="<?=$spcatmenu[$j][$sluglang]?>"><span><?=$spcatmenu[$j]['ten'.$lang]?></span></a>
                                    <?php if(count($spitemmenu)) { ?>
                                      <i class="fas fa-angle-down"></i>
                                        <ul >
                                            <?php for($u=0;$u<count($spitemmenu);$u++) {
                                                $spsubmenu = $d->rawQuery("SELECT ten$lang, tenkhongdauvi, tenkhongdauen, id FROM table_product_sub WHERE hienthi=1 AND id_item = ? ORDER BY stt,id DESC",array($spitemmenu[$u]['id'])); ?>
                                                <li class="sub">
                                                    <a  title="<?=$spitemmenu[$u]['ten'.$lang]?>" href="<?=$spitemmenu[$u][$sluglang]?>"><span><?=$spitemmenu[$u]['ten'.$lang]?></span></a>
                                                    <?php if(count($spsubmenu)) { ?>
                                                      <i class="fas fa-angle-down"></i>
                                                        <ul >
                                                            <?php for($s=0;$s<count($spsubmenu);$s++) { ?>
                                                                <li>
                                                                    <a  title="<?=$spsubmenu[$s]['ten'.$lang]?>" href="<?=$spsubmenu[$s][$sluglang]?>"><span><?=$spsubmenu[$s]['ten'.$lang]?></span></a>
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
        <?php }?>
      </li>
      <li class="transition">
          <a class="transition <?php if($com=='tin-tuc') echo 'active'; ?>" href="tin-tuc" title="<?=tintuc?>"><span><?=tintuc?></span></a>
      </li>
      <li class="transition"><a class="transition <?php if($com=='chinh-sach-dai-ly') echo 'active'; ?>" href="chinh-sach-dai-ly" title="Chính Sách Đại Lý"><span>Chính Sách Đại Lý</span></a></li>
      <li class="transition"><a class="transition <?php if($com=='ho-tro') echo 'active'; ?>" href="ho-tro" title="Hỗ Trợ"><span>Hỗ Trợ</span></a></li>
     

		</ul>

	</div>
</div>

<div class="over"></div>