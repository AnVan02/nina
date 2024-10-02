<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <?php
                include TEMPLATE."account/leftuser_tpl.php";
            ?>
            
        </div>
        <div class="col-sm-9 col-md-10">
            <?php if($row_detail){?>
            <div class="content-us">
                <div class="thead-notification d-flex align-items-center justify-content-between">
                    <?=$row_detail['ten'.$lang]?>
                </div>
                <div class="content-notification-detail">
                    <?=htmlspecialchars_decode($row_detail['noidung'.$lang])?>
                </div>
            </div>
            <?php }else{?>
                <div class="alert alert-warning" role="alert">
                    <strong>Bạn chưa có thông báo nào.!</strong>
                </div>
            <?php }?>
        </div>
    </div>
</div>