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
                    <h2>Đổi mật khẩu</h2>
                </div>
                <form class="form-user validation-user" novalidate method="post" action="account/doi-mat-khau" enctype="multipart/form-data">
                    <label for="basic-url" class="d-none"><?=hoten?></label>
                    <div class="input-group input-user d-none">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=nhaphoten?>" value="<?=$row_detail['ten']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                    </div>
                    <label for="basic-url" class="d-none"><?=taikhoan?></label>
                    <div class="input-group input-user d-none">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?=nhaptaikhoan?>" required>
                    </div>
                    <label for="basic-url"><?=matkhaucu?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="<?=nhapmatkhaucu?>" required>
                        <div class="invalid-feedback">Vui lòng nhập mật khẩu cũ</div>
                    </div>
                    <label for="basic-url"><?=matkhaumoi?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="new-password" name="new-password" placeholder="<?=nhapmatkhaumoi?>" required>
                        <div class="invalid-feedback">Vui lòng nhập mật khẩu mới</div>
                    </div>
                    <label for="basic-url"><?=nhaplaimatkhaumoi?></label>
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="<?=nhaplaimatkhaumoi?>" required>
                        <div class="invalid-feedback">Vui lòng nhập lại mật khẩu mới</div>
                    </div>
                    <label for="basic-url" class="d-none"><?=gioitinh?></label>
                    <div class="input-group input-user">
                        <div class="radio-user custom-control custom-radio d-none">
                            <input type="radio" id="nam" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==1)?'checked':''?> value="1" required>
                            <label class="custom-control-label" for="nam"><?=nam?></label>
                        </div>
                        <div class="radio-user custom-control custom-radio d-none">
                            <input type="radio" id="nu" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==2)?'checked':''?> value="2" required>
                            <label class="custom-control-label" for="nu"><?=nu?></label>
                        </div>
                    </div>
                    <label for="basic-url"  class="d-none"><?=ngaysinh?></label>
                    <div class="input-group input-user d-none">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="<?=nhapngaysinh?>" value="<?=date("d/m/Y",$row_detail['ngaysinh'])?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>
                    <label for="basic-url" class="d-none">Email</label>
                    <div class="input-group input-user d-none">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?=nhapemail?>" value="<?=$row_detail['email']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                    </div>
                    <label for="basic-url" class="d-none"><?=dienthoai?></label>
                    <div class="input-group input-user d-none">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone-square"></i></div>
                        </div>
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=nhapdienthoai?>" value="<?=$row_detail['dienthoai']?>" required>
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>
                    <label for="basic-url" class="d-none"><?=diachi?></label>
                    <div class="input-group input-user d-none">
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