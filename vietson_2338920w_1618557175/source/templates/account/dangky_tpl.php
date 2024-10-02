<div class="wrap-user">
    <div class="title-user d-flex align-items-end justify-content-between">
        <span><?=dangky?></span>
        <a href="account/dang-nhap" title="<?=dangnhap?>"><?=dangnhap?></a>
    </div>
    <form class="form-user validation-user" novalidate method="post" action="account/dang-ky" enctype="multipart/form-data">
        <div class="row mar-input-group">
            <div class="item-input-group col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="tendoanhnghiep" name="tendoanhnghiep" placeholder="Tên doanh nghiệp" required>
                    <div class="invalid-feedback">Vui lòng nhập Tên doanh nghiệp của bạn</div>
                </div>
            </div>
            <div class="item-input-group col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="masothue" name="masothue" placeholder="Mã số thuế" required>
                    <div class="invalid-feedback">Vui lòng nhập Mã số thuế của bạn</div>
                </div>
            </div>

            <div class="item-input-group col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên người liên hệ" required>
                    <div class="invalid-feedback">Vui lòng nhập Tên người liên hệ</div>
                </div>
            </div>
            <div class="item-input-group col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="Số điện thoại" required>
                    <div class="invalid-feedback">Vui lòng nhập Số điện thoại của bạn</div>
                </div>
            </div>
        </div>
        <div class="input-group input-user">

            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">Vui lòng nhập Email</div>
        </div>
        <div class="button-user no-maxw">
            <input type="submit" class="btn btn-primary btn-block" name="dangky" value="<?=dangky?>" disabled>
        </div>

        <div class="note-user">
            <span>Bạn đã có tài khoản ! </span>
            <a href="account/dang-nhap" title="<?=dangkytaiday?>">Đăng nhập tại đây</a>
        </div>
    </form>
</div>