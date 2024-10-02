<?php
	include "ajax_config.php";

?>
<form method="get" class="form-search-product">                       
    <div class="input-group">
        <input class="typesearch" type="hidden" name="type" value="<?=$_POST['type']?>">
        <input autocomplete="off" type="text" class="txt-search form-control" name="s" value="<?php if(isset($_GET['s']))echo $_GET['s']?>" placeholder="Nhập tên sản phẩm cần tìm..." required>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
<div class="show-jqury">

    <?php 
        $productse = $d->rawQuery("select id,type, ten$lang, tenkhongdauvi,tenkhongdauen, photo, masp from #_product where type = ? and hienthi > 0",array('san-pham'));
    ?>
    <?php if($_POST['type']=='name'){?>
    <script>
      $( function() {
        var availableTags = [
          <?php foreach ($productse as $ks => $vald) {?>
          "<?=$vald['ten'.$lang]?>",
          <?php }?>
        ];
        $( ".txt-search" ).autocomplete({
          source: availableTags
        });
      } );
    </script>
	<?php }else{?>
		<script>
	      $( function() {
	        var availableTags = [
	          <?php foreach ($productse as $ks => $vald) {?>
	          "<?=$vald['masp']?>",
	          <?php }?>
	        ];
	        $( ".txt-search" ).autocomplete({
	          source: availableTags
	        });
	      } );
	    </script>
	<?php }?>
</div>