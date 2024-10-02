<div class="wrap-content">
    <div class="row-grid-list-btn">
        <a href="#" id="grid" class="btn btn-default btn-sm"><span class="fa fa-th-large"></span></a>
        <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-list-ul"></span></a> 
    </div>
    <div class="content-main w-clear">
        <?php if(count($product)>0) {?>
            <?php
                include TEMPLATE.LAYOUT."product.php";
            ?>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?=khongtimthayketqua?></strong>
            </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    </div>
    <section class="row-compare">
        <div class="title-compare">
            <a class="link-compare" href="/so-sanh-san-pham">So sánh <span class="numcount"></span> </a> 
        </div>
    </section>
    <div class="loading"></div>
</div>