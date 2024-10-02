<?php
    $linkMan = "index.php?com=user&act=man&p=".$curPage;
    $linkSave = "index.php?com=user&act=save&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết tài khoản khách</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit")?"Cập nhật":"Thêm mới";?> tài khoản</h3>
            </div>
            <div class="card-body">
            	<div class="row">
            		
					<div class="form-group col-md-4">
						<label for="username">Tên đăng nhập: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="data[username]" id="username" placeholder="Tên đăng nhập" value="<?=@$item['username']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="password">Mật khẩu:</label>
						<input type="password" class="form-control" name="data[password]" id="password" placeholder="Mật khẩu" <?=($act=="add")?'required':'';?>>
					</div>
					<div class="form-group col-md-4">
						<label for="confirm_password">Nhập lại mật khẩu:</label>
						<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" <?=($act=="add")?'required':'';?>>
					</div>
					<div class="form-group col-md-4">
						<label for="tendoanhnghiep">Tên doanh nghiệp: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="data[tendoanhnghiep]" id="tendoanhnghiep" placeholder="Tên doanh nghiệp" value="<?=@$item['tendoanhnghiep']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="diachi">Địa chỉ:</label>
						<input type="text" class="form-control" name="data[diachi]" id="diachi" placeholder="Địa chỉ" value="<?=@$item['diachi']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="masothue">Mã số thuế:</label>
						<input type="text" class="form-control" name="data[masothue]" id="masothue" placeholder="Mã số thuế" value="<?=@$item['masothue']?>">
					</div>
					<div class="form-group col-md-6">
						<label for="sdtdoanhnghiep">SĐT doanh nghiệp:</label>
						<input type="text" class="form-control" name="data[sdtdoanhnghiep]" id="sdtdoanhnghiep" placeholder="SĐT doanh nghiệp" value="<?=@$item['sdtdoanhnghiep']?>">
					</div>
					<div class="form-group col-md-6">
						<label for="daidien">Đại diện theo PL:</label>
						<input type="text" class="form-control" name="data[daidien]" id="daidien" placeholder="Đại diện theo PL" value="<?=@$item['daidien']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="taikhoannganhang">TK ngân hàng:</label>
						<input type="text" class="form-control" name="data[taikhoannganhang]" id="taikhoannganhang" placeholder="TK ngân hàng" value="<?=@$item['taikhoannganhang']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="chutaikhoan">Chủ tài khoản:</label>
						<input type="text" class="form-control" name="data[chutaikhoan]" id="chutaikhoan" placeholder="Chủ tài khoản" value="<?=@$item['chutaikhoan']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="tennganhang">Tên ngân hàng:</label>
						<input type="text" class="form-control" name="data[tennganhang]" id="tennganhang" placeholder="Tên ngân hàng" value="<?=@$item['tennganhang']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="ten">Tên người liên hệ: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Tên người liên hệ" value="<?=@$item['ten']?>" required>
					</div>
					
					<div class="form-group col-md-4">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="data[email]" id="email" placeholder="Email" value="<?=@$item['email']?>">
					</div>
					<div class="form-group col-md-4">
						<label for="dienthoai">Điện thoại:</label>
						<input type="text" class="form-control" name="data[dienthoai]" id="dienthoai" placeholder="Điện thoại" value="<?=@$item['dienthoai']?>">
					</div>
					

					<div class="form-group col-md-6">
						<label for="diemcongty">Điểm công ty:</label>
						<input type="number" class="form-control" name="data[diemcongty]" id="diemcongty" placeholder="Điểm công ty" value="<?=@$item['diemcongty']?>">
					</div>
					<div class="form-group col-md-6">
						<label for="diemhang">Điểm hãng:</label>
						<input type="number" class="form-control" name="data[diemhang]" id="diemhang" placeholder="Điểm hãng" value="<?=@$item['diemhang']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Kích hoạt:</label>
					<div class="custom-control custom-checkbox d-inline-block align-middle">
                        <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label for="hienthi-checkbox" class="custom-control-label"></label>
                    </div>
				</div>
				<div class="form-group">
					<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
					<input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
				</div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>

<!-- User js -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('#ngaysinh').datetimepicker({
	        timepicker: false,
	        format: 'd/m/Y',
	        formatDate: 'd/m/Y',
	        // minDate: '1950/01/01',
	        maxDate: '<?=date("Y/m/d",time())?>'
	    });
	});
</script>