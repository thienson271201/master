<?php
// show thông tin khách hàng
$khach_hang_id = getSession('khach_hang_id');
$user_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id = '$khach_hang_id'");
echo '<pre>';
print_r($user_profile);
echo '</pre>';

// cập nhật thông tin khách hàng
if ($f->isPOST())
{
    $filterAll = $f->filter();
    echo '<pre>';
    print_r($filterAll);
    echo '</pre>';

}
?>
<section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
                Thông tin cá nhân
            </h1>
        </div>
    </div>
    <div class="section-footer">
        <div class="container" data-inview-showup="showup-translate-down">
            <ul class="page-path">
                <li><a href="./">Trang chủ</a></li>
                <li class="path-separator">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </li>
                <li>Hồ sơ</li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <nav class="user-dashboard-menu">
            <ul>
                <li class="menu-item">
                    <a href="?page=thong_tin_tai_khoan">Bảng điều khiển</a>
                </li>
                <li class="menu-item"><a href="?page=thong_tin_ca_nhan">Hồ sơ</a></li>
                <li class="menu-item"><a href="?page=lich_su_don_hang">Đơn hàng</a></li>
                <li class="menu-btn menu-stick-right">
                    <a class="btn btns-bordered-alt text-upper" href="?page=dang_xuat">Đăng xuất</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
<section class="shift-lg content-section">
    <div class="container">
        <form class="user-profile" method="POST">
            <h4 class="text-upper" data-inview-showup="showup-translate-right">
                Thông tin cá nhân
            </h4>
            <div class="row cols-lg rows-md">
                <!-- Hình ảnh -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group field-type-image">
                        <label>Tải ảnh đại diện - JPEG 70x70</label>
                        <div class="field-wrap">
                            <input class="field-file-control" name="avatar" type="file" />
                            <input class="field-control" name="avatarPlaceholder"
                                placeholder="Không có ảnh nào được tải lên" />
                            <span class="field-addon-btn"><a class="field-file-btn text-upper btn" href="#">Tải ảnh
                                    lên</a></span>
                            <span class="field-back"></span>
                            <div class="file-preview">
                                <div class="file-preview-image">
                                    <img src="" alt="" />
                                </div>
                                <div class="file-no-preview">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="file-preview-bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Họ và tên -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="fullName" placeholder="Họ và tên" required="required"
                                value="<?= $user_profile['ten_khach_hang'] ?>" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="email" type="email" placeholder="Email"
                                required="required" value="<?= $user_profile['email'] ?>" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="phone" placeholder="Số điện thoại" required="required"
                                value="<?= $user_profile['so_dien_thoai'] ?>" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="address" placeholder="Địa chỉ" required="required">
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="ward" required>
                                <option value="">Chọn Phường / Xã</option>
                                <?php
                                $dsxa = $db->getRaw('SELECT * FROM xaphuongthitran');
                                foreach ($dsxa as $xa):
                                    ?>
                                    <option value="<?= $xa['xaid'] ?>"><?= $xa['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="ward" required>
                                <option value="">Chọn Quận / Huyện</option>
                                <?php
                                $dshuyen = $db->getRaw('SELECT * FROM quanhuyen');
                                foreach ($dshuyen as $huyen):
                                    ?>
                                    <option value="<?= $huyen['maqh'] ?>"><?= $huyen['name'] ?></option>
                                <?php endforeach; ?>
                                <!-- thêm option khác tùy bạn -->
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="ward" required>
                                <option value="">Chọn Tỉnh / Thành phố</option>
                                <?php
                                $dstinh = $db->getRaw('SELECT * FROM tinhthanhpho');
                                foreach ($dstinh as $tinh):
                                    ?>
                                    <option value="<?= $tinh['matp'] ?>"><?= $tinh['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="password" type="password" placeholder="Mật khẩu"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="confirmPassword" type="password"
                                placeholder="Nhập lại mật khẩu" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shift-lg offs-lg" data-inview-showup="showup-translate-right"></div>
            <div data-inview-showup="showup-translate-right">
                <button class="btn md-col-2 text-upper" type="submit">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
</section>
<!-- Nút trở lên -->
<a href="#" class="scroll-top disabled"><i class="fas fa-angle-up" aria-hidden="true"></i></a>