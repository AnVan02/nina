<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <?php
                include TEMPLATE."account/leftuser_tpl.php";
            ?>
            
        </div>
        <div class="col-sm-9 col-md-10">
            <?php if(count($orderdr)>0){?>
            <?php for ($i=0; $i < count($orderdr); $i++) {
                $detail_order = $d->rawQuery("select * from table_order_detail where id_order = ?  order by id desc",array($orderdr[$i]['id']));

                $status = $d->rawQueryOne("select id, trangthai from #_status where id = ? limit 0,1",array($orderdr[$i]['tinhtrang']));

            ?>
            <form method="POST" action="">
                <div class="content-us">
                    <div class="title-us">
                        <h2>Đơn hàng #<?=$orderdr[$i]['madonhang']?></h2>
                        <p>Ngày đặt <?=date('d/m/Y h:i:a',$orderdr[$i]['ngaytao'])?></p>
                    </div>
                    <div class="info-product-order">
                        <div class="thead-order-detail d-flex align-items-center justify-content-between">
                            <div class="name-pro-order">
                                Sản phẩm
                            </div>
                            <div class="qua-pro-order">
                                Số lượng
                            </div>
                            <div class="price-pro-order">
                                Đơn giá
                            </div>
                            <div class="total-price-order">
                                Thành tiền
                            </div>
                            <div class="status-pro-order">
                                Trạng thái
                            </div>
                        </div>
                        <?php foreach ($detail_order as $key => $value) {
                            $proorder = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen,photo from #_product where id = ? limit 0,1",array($value['id_product']));
                        ?>
                        <div class="item-order-detail d-flex align-items-center justify-content-between">
                                <div class="name-pro-order">
                                    <a href="<?=$proorder[$sluglang]?>" title="<?=$proorder['ten'.$lang]?>">
                                        <img src="<?=UPLOAD_PRODUCT_L.$proorder['photo']?>" alt="<?=$proorder['ten'.$lang]?>">
                                        <?=$proorder['ten'.$lang]?>
                                    </a>
                                </div>
                                <div class="qua-pro-order">
                                   <select name="soluong[]">
                                       <?php for ($m=1; $m < 50; $m++) {?>
                                        <option value="<?=$m?>" <?php if($m==$value['soluong'])echo 'selected'?>><?=$m?></option>
                                       <?php }?>
                                   </select>
                                   <input type="hidden" name="id_product[]" value="<?=$proorder['id']?>">
                                </div>
                                <div class="price-pro-order">
                                    <?php if($value['giasi']>0){?>
                                        <?=number_format($value['giasi'],0,",",",")?> đ 
                                    <?php }elseif($value['giamoi']>0){?>
                                        <?=number_format($value['giamoi'],0,",",",")?> đ 
                                    <?php }else{?>
                                        <?=number_format($value['gia'],0,",",",")?> đ 
                                    <?php }?>
                                    
                                </div>
                                <div class="total-price-order">
                                    <?php if($value['giasi']>0){?>
                                        <b><?=number_format($value['giasi']*$value['soluong'],0,",",",")?></b> đ <br/>
                                        <span><?=$cart->get_sale_price($proorder['id'],$value['soluong'])?></span><br/>
                                        <b><?=number_format($cart->total_get_price($proorder['id'],$value['soluong']),0,",",",")?></b> đ
                                    <?php }elseif($value['giamoi']>0){?>
                                        <b><?=number_format($value['giamoi']*$value['soluong'],0,",",",")?></b> đ 
                                    <?php }else{?>
                                        <b><?=number_format($value['gia']*$value['soluong'],0,",",",")?></b> đ 
                                    <?php }?>
                                </div>
                                <div class="status-pro-order">
                                    <span class="label <?php if($orderdr[$i]['tinhtrang']==1) echo 'label-default'; if($orderdr[$i]['tinhtrang']==2) echo 'bg-info'; if($orderdr[$i]['tinhtrang']==3) echo 'bg-warning'; if($orderdr[$i]['tinhtrang']==4) echo 'bg-success'; if($orderdr[$i]['tinhtrang']==5) echo 'bg-danger';?>"><?=$status['trangthai']?></span>
                                </div>
                            </div>
                            
                            <?php }?>
                            <div class="item-order-detail d-flex align-items-center justify-content-between">
                                <div class="label-total">
                                    <b>Tổng tiền: </b> 
                                </div>
                                <div class="total-order">
                                    <?=number_format($orderdr[$i]['tonggia'],0,",",",")?> đ
                                </div>
                            </div>
                            <div class="item-order-detail d-flex align-items-center justify-content-between">
                                <div class="edit-order">
                                    <button class="text-decoration-none btn btn-primary">Thay đổi</button>
                                </div>
                            </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$orderdr[$i]['id']?>">
            </form>
            <?php }?>
            <?php }else{?>
                <div class="alert alert-warning" role="alert">
                    <strong>Bạn chưa có đơn hàng nào.!</strong>
                </div>
            <?php }?>
        </div>
    </div>
</div>