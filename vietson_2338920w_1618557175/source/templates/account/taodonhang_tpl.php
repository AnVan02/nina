<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <?php
                include TEMPLATE."account/leftuser_tpl.php";
            ?>
            
        </div>
        <div class="col-sm-9 col-md-10">
            <div class="content-us">
                <div class="title-us">
                    <h2>Thông tin nhận hàng</h2>
                </div>
                <div class="info-ship-order">
                    <p><strong style="font-size: 16px"><?=$row_detail['ten']?></strong> </p>
                    <p><strong>Điện thoại:</strong> <?=$row_detail['dienthoai']?></p>
                    <p><strong>Email:</strong> <?=$row_detail['email']?></p>
                    <p><strong>Địa chỉ hóa đơn:</strong> <?=$row_detail['diachi']?></p>
                    <p><strong>Địa chỉ giao hàng:</strong> <?=$row_detail['diachi']?></p>
                </div>
            </div>
            <div class="content-us">
                <div class="title-us">
                    <h2>Tìm kiếm sản phẩm</h2>
                </div>
                <div class="tab-search">
                        <ul class="nav nav-tabs" role="tablist">
                          <li><a href="javascript:void(0)" class="<?php if(!isset($_GET['type']) || $_GET['type']=='name')echo 'active'?>" data-search="name">Tìm theo tên sản phẩm</a></li>
                          <li><a  href="javascript:void(0)" class="<?php if(isset($_GET['type']) && $_GET['type']=='code')echo 'active'?>" data-search="code">Tìm theo Mã sản phẩm</a></li> 
                        </ul>
                        
                        <div class="tab-content">
                            <form method="get" class="form-search-product">                       
                                <div class="input-group">
                                    <input class="typesearch" type="hidden" name="type" value="<?php if(isset($_GET['type']) && $_GET['type']=='code')echo 'code';else echo 'name';?>">
                                    <input autocomplete="off" type="text" class="txt-search form-control" name="s" value="<?php if(isset($_GET['s']))echo $_GET['s']?>" placeholder="Nhập tên sản phẩm cần tìm..." required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                </div>
                <?php if(isset($_GET['s'])){?>
                <div class="title-us">
                    <h2>Sản phẩm</h2>
                </div>

                <div class="info-product-order">
                    <div class="thead d-flex align-items-center justify-content-between">
                        <div class="stt">
                            STT
                        </div>
                        <div class="code-product-user">
                            Mã sản phẩm
                        </div>
                        <div class="name-product-user">
                            Tên sản phẩm
                        </div>
                        <div class="pricr-product-user">
                            Giá
                        </div>
                        <div class="status-product-user">
                            Trạng thái
                        </div>
                        <div class="detail-product-user">
                            Chi tiết
                        </div>
                    </div>
                    <div class="content-product-user">
                        <?php  for($i=0;$i<count($product);$i++) {?>
                            <div class="item-product-user d-flex align-items-center justify-content-between">
                                <div class="stt">
                                    <?=$i+1?>
                                </div>
                                <div class="code-product-user">
                                    <?=$product[$i]['masp']?>
                                </div>
                                <div class="name-product-user">
                                   <a href="<?=$product[$i][$sluglang]?>" title="<?=$product[$i]['ten'.$lang]?>"><?=$product[$i]['ten'.$lang]?></a>
                                </div>
                                <div class="pricr-product-user">
                                    <?php if($product[$i]['giasi']>0){?>
                                        <?=number_format($product[$i]['giasi'],0,",",",")?> đ 
                                    <?php }elseif($product[$i]['giamoi']>0){?>
                                        <?=number_format($product[$i]['giamoi'],0,",",",")?> đ 
                                    <?php }else{?>
                                        <?=number_format($product[$i]['gia'],0,",",",")?> đ 
                                    <?php }?>
                                    <a href="<?=$product[$i][$sluglang]?>" title="<?=$product[$i]['ten'.$lang]?>"><span class="cart-buy-user" data-id="<?=$product[$i]['id']?>" data-numb="0" data-action="addnow">Mua hàng</span></a>
                                </div>
                                <div class="status-product-user">
                                    <?php if($product[$i]['trangthai']!=''){?><span><?=$product[$i]['trangthai']?></span><?php }?>
                                </div>
                                <div class="detail-product-user">
                                    <a href="<?=$product[$i][$sluglang]?>">
                                        <i class="fas fa-window-restore"></i>
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                        <div class="clear"></div>
                        <div class="mar-profix">
                            <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>