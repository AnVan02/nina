<?php
	include "ajax_config.php";

	if(isset($_POST["id"]))
	{
		$id = (isset($_POST["id"])) ? htmlspecialchars($_POST["id"]) : 0;
		$id_pro = (isset($_POST["id"])) ? htmlspecialchars($_POST["id_pro"]) : 0;
		$tempstt = $d->rawQueryOne("select id_thuoctinh from #_product_cat where id = ? and type = ? limit 0,1",array($id,'san-pham'));
		$arr_tt = explode(',', $tempstt['id_thuoctinh']);
		$thuoctinh = $d->rawQuery("select tenvi, id from #_product_brand where  type = ? order by stt,id desc",array('san-pham'));
	}

?>
<div class="card card-primary card-outline text-sm">
	<div class="card-header">
	    <h3 class="card-title">Thuộc tính sản phẩm</h3>
	    <div class="card-tools">
	    	<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	</div>
	<div class="card-body">
		<div class="row">
		<?php for($i=0;$i<count($thuoctinh);$i++){
			$giatri = $d->rawQueryOne("select * from #_product_properties where id_properties = ? and id_product = ? and type = ? limit 0,1",array($thuoctinh[$i]['id'],$id_pro,'san-pham'));
			if(!in_array($thuoctinh[$i]['id'],$arr_tt)) continue;?>
		 <div class="form-group col-md-4">
		    <label class="d-block" for="masp"><?=$thuoctinh[$i]['tenvi']?>:</label>
		    <input type="hidden" class="form-control" name="data2[id_cat][]" id="id_cat" value="<?=@$id?>">
		    <input type="hidden" class="form-control" name="data2[id_properties][]" id="id_properties" value="<?=@$thuoctinh[$i]['id']?>">
		    <input type="hidden" class="form-control" name="data2[tenvi][]" id="tenvi" value="<?=@$thuoctinh[$i]['tenvi']?>">
		     <input type="hidden" class="form-control" name="data2[id_giatri][]" id="id_giatri" value="<?=@$giatri['id']?>">
		    <input type="text" class="form-control" name="data2[giatri][]" id="giatri" value="<?=@$giatri['giatri']?>">
		</div>
		<?php }?>
		</div>
	</div>
</div>