<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <?php
                include TEMPLATE."account/leftuser_tpl.php";
            ?>
            
        </div>
        <div class="col-sm-9 col-md-10">
            <div class="content-us">
                <div class="thead-notification d-flex align-items-center justify-content-between">
                    <div class="stt-notification">
                        STT
                    </div>
                    <div class="date-notification">
                        Ngày
                    </div>
                    <div class="title-notification">
                        Tiêu đề
                    </div>
                    
                    <div class="link-notification">
                        Link
                    </div>
                </div>
                <?php if(count($news)>0) { for($i=0;$i<count($news);$i++) { ?>
                    <div class="item-notification d-flex align-items-center justify-content-between">
                        <div class="stt-notification">
                            <?=$i+1?>
                        </div>
                        <div class="date-notification">
                            <?=date('d/m/Y',$news[$i]['ngaytao'])?>
                        </div>
                        <div class="title-notification">
                            <?=$news[$i]['ten'.$lang]?>
                        </div>
                        
                        <div class="link-notification">
                            <a href="account/thong-bao?id=<?=$news[$i]['id']?>" class="text-decoration-none">  <span class="label bg-info">Xem chi tiết</span></a>
                        </div>
                    </div>
                <?php } } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>Bạn chưa có thông báo nào.!</strong>
                    </div>
                <?php } ?>
                <div class="clear"></div>
                <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
            </div>
        </div>
    </div>
</div>