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
                    <h2>Điểm thưởng</h2>
                </div>
                <div class="content-point">
                    <p>Điểm hãng: <b><?=$row_detail['diemhang']?></b> Point</p>
                    <p>Điểm công ty: <b><?=$row_detail['diemcongty']?></b> Point</p>
                </div>
            </div>
            <?php if(count($orderdr)>0){?>
            <?php for ($i=0; $i < count($orderdr); $i++) {
                $detail_order = $d->rawQuery("select * from table_order_detail where id_order = ?  order by id desc",array($orderdr[$i]['id']));
            ?>
            <div class="content-us">
                <div class="title-us">
                    <p>Lịch sử điểm - Mã đơn hàng: <b>#<?=$orderdr[$i]['madonhang']?></b></p>
                </div>
                <div class="info-product-order">
                    <div class="thead-order-detail d-flex align-items-center justify-content-between">
                        <div class="name-pro-point">
                            Sản phẩm
                        </div>
                        <div class="qua-pro-point">
                            Số lượng
                        </div>
                        <div class="brand-pro-point">
                            Điểm hãng
                        </div>
                        <div class="company-pro-point">
                            Điểm công ty
                        </div>
                    </div>
                    <?php 
                    $tongdiemhang=0;
                    $tongdiemcongty=0;
                    foreach ($detail_order as $key => $value) {
                        $proorder = $d->rawQueryOne("select id, diemhang,diemcongty, ten$lang, tenkhongdauvi, tenkhongdauen,photo from #_product where id = ? limit 0,1",array($value['id_product']));

                        $diemhang=$proorder['diemhang']*$value['soluong'];
                        $tongdiemhang +=$diemhang;
                        $diemcongty=$proorder['diemcongty']*$value['soluong'];
                        $tongdiemcongty +=$diemcongty;
                    ?>
                    <div class="item-order-detail d-flex align-items-center justify-content-between">
                        <div class="name-pro-point">
                            <a href="<?=$proorder[$sluglang]?>" title="<?=$proorder['ten'.$lang]?>">
                                <?=$proorder['ten'.$lang]?>
                            </a>
                        </div>
                        <div class="qua-pro-point">
                           <?=$value['soluong']?>
                        </div>
                        <div class="brand-pro-point">
                             <?=$diemhang?> Point
                        </div>
                        <div class="company-pro-point">
                             <?=$diemcongty?> Point
                        </div>
                       
                    </div>
                   
                    <?php }?>

                    <div class="item-order-detail d-flex align-items-center justify-content-between">
                        <div class="label-total-point">
                            <b>Tổng điểm</b> 
                        </div>
                        <div class="brand-pro-point">
                             <b><?=$tongdiemhang?></b> Point
                        </div>
                        <div class="company-pro-point">
                             <b><?=$tongdiemcongty?></b> Point
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php }else{?>
                <div class="alert alert-warning" role="alert">
                    <strong>Bạn chưa có điểm thưởng nào.!</strong>
                </div>
            <?php }?>
        </div>
    </div>
</div>