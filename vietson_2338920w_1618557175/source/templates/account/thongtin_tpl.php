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
                    <h2>Thông tin cá nhân</h2>
                </div>
                <form class="form-user validation-user" novalidate method="post" action="account/thong-tin-ca-nhan" enctype="multipart/form-data">
                    <label for="basic-url"><?=hoten?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=nhaphoten?>" value="<?=$row_detail['ten']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                    </div>
                    <label for="basic-url"><?=taikhoan?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?=nhaptaikhoan?>" value="<?=$row_detail['username']?>" readonly required>
                    </div>
      
                    <label for="basic-url"><?=gioitinh?></label>
                    <div class="input-group input-user">
                        <div class="radio-user custom-control custom-radio">
                            <input type="radio" id="nam" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==1)?'checked':''?> value="1" required>
                            <label class="custom-control-label" for="nam"><?=nam?></label>
                        </div>
                        <div class="radio-user custom-control custom-radio">
                            <input type="radio" id="nu" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==2)?'checked':''?> value="2" required>
                            <label class="custom-control-label" for="nu"><?=nu?></label>
                        </div>
                    </div>
                    <label for="basic-url"><?=ngaysinh?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="<?=nhapngaysinh?>" value="<?=date("d/m/Y",$row_detail['ngaysinh'])?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>
                    <label for="basic-url">Email</label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?=nhapemail?>" value="<?=$row_detail['email']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                    </div>
                    <label for="basic-url"><?=dienthoai?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone-square"></i></div>
                        </div>
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=nhapdienthoai?>" value="<?=$row_detail['dienthoai']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>
                    <label for="basic-url"><?=diachi?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-map"></i></div>
                        </div>
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=nhapdiachi?>" value="<?=$row_detail['diachi']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
                    </div>
                    <div class="button-user maxw">
                        <input type="submit" class="btn btn-primary btn-block" name="capnhatthongtin" value="<?=capnhat?>" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>