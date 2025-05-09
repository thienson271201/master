<?php
// cập nhật thông tin khách hàng
if ($f->isPOST())
{
    $filterAll = $f->filter();

    $data_update = [
        'ten_khach_hang' => $filterAll['ten_khach_hang'],
        'email' => $filterAll['email'],
        'so_dien_thoai' => $filterAll['so_dien_thoai'],
        'tinh_thanhpho' => $filterAll['tinh_thanhpho'],
        'quan_huyen' => $filterAll['quan_huyen'],
        'xa_phuong' => $filterAll['xa_phuong'],
        'dia_chi' => $filterAll['dia_chi'],
        'ngay_cap_nhat' => date('Y-m-d H:i:s')
    ];
    if (!empty($filterAll['mat_khau']))
    {
        $data_update['mat_khau'] = password_hash($filterAll['mat_khau'], PASSWORD_DEFAULT);
    }
    $anhdaidien = $f->upload('anh_dai_dien', 'images');
    if ($anhdaidien != 'noimage.jpg')
    {
        $data_update['anh_dai_dien'] = $anhdaidien;
    }
    $id = getSession('khach_hang_id');
    $update_status = $db->update('khach_hang', $data_update, "id=$id");
}
// show thông tin khách hàng
$khach_hang_id = getSession('khach_hang_id');
$user_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id = '$khach_hang_id'");
?>

<section class="shift-lg content-section">
    <div class="container">
        <form onsubmit="return checkPasswords()" class="user-profile" method="POST" enctype="multipart/form-data">
            <h4 class="text-upper" data-inview-showup="showup-translate-right">
                Thông tin cá nhân
            </h4>
            <div class="row cols-lg rows-md">
                <!-- Hình ảnh -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group field-type-image">
                        <label>Tải ảnh đại diện - JPEG 70x70</label>
                        <div class="field-wrap">
                            <input class="field-file-control" name="anh_dai_dien" type="file" accept="image/*" />
                            <input class="field-control" name="avatarPlaceholder"
                                placeholder="Không có ảnh nào được tải lên" />
                            <span class="field-addon-btn"><a class="field-file-btn text-upper btn" href="#">Tải ảnh
                                    lên</a></span>
                            <span class="field-back"></span>
                            <div class="file-preview">
                                <div class="file-preview-image">
                                    <img src="upload/images/<?= $user_profile['anh_dai_dien'] ?>" alt="" />
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
                            <input class="field-control" name="ten_khach_hang" placeholder="Họ và tên"
                                required="required" value="<?= $user_profile['ten_khach_hang'] ?>" />
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
                            <input class="field-control" name="so_dien_thoai" placeholder="Số điện thoại"
                                required="required" value="<?= $user_profile['so_dien_thoai'] ?>" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="tinh_thanhpho" id="tinh_thanhpho" required>
                                <option value="">Chọn Tỉnh / Thành phố</option>
                                <?php
                                $dstinh = $db->getRaw('SELECT * FROM tinhthanhpho');
                                foreach ($dstinh as $tinh):
                                    ?>
                                    <option <?= $tinh['matp'] == $user_profile['tinh_thanhpho'] ? 'selected' : '' ?>
                                        value="<?= $tinh['matp'] ?>"><?= $tinh['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>

                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="quan_huyen" id="quan_huyen" required>
                                <option value="">Chọn Quận / Huyện</option>
                                <?php
                                if (!empty($user_profile['tinh_thanhpho'])):
                                    $tinh = $user_profile['tinh_thanhpho'];
                                    $dshuyen = $db->getRaw("SELECT * FROM quanhuyen where matp=$tinh");
                                    foreach ($dshuyen as $huyen):
                                        ?>
                                        <option <?= $huyen['maqh'] == $user_profile['quan_huyen'] ? 'selected' : '' ?>
                                            value="<?= $huyen['maqh'] ?>"><?= $huyen['name'] ?></option>
                                    <?php endforeach;
                                endif; ?>
                                <!-- thêm option khác tùy bạn -->
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="xa_phuong" id="xa_phuong" required>
                                <option value="">Chọn Phường / Xã</option>
                                <?php
                                if (!empty($user_profile['quan_huyen'])):
                                    $huyen = $user_profile['quan_huyen'];
                                    $dsxa = $db->getRaw("SELECT * FROM xaphuongthitran where maqh=$huyen");
                                    foreach ($dsxa as $xa):
                                        ?>
                                        <option <?= $xa['xaid'] == $user_profile['xa_phuong'] ? 'selected' : '' ?>
                                            value="<?= $xa['xaid'] ?>"><?= $xa['name'] ?></option>
                                    <?php endforeach;
                                endif; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="dia_chi" placeholder="Địa chỉ"
                                value="<?= $user_profile['dia_chi'] ?>" required="required">
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="mat_khau" type="password" placeholder="Mật khẩu"
                                id="password1" />
                            <span class="field-back"></span>
                        </div>
                        <!-- Icon mắt -->
                        <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword1"></i>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="nhap_lai_mat_khau" type="password"
                                placeholder="Nhập lại mật khẩu" id="password2" />
                            <span class="field-back"></span>
                        </div>
                        <!-- Icon mắt -->
                        <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword2"></i>
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
<script>
    function checkPasswords() {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirmPassword').value;
        // Nếu cả 2 ô đều trống thì không kiểm tra
        if (password === '' && confirm === '') {
            return true;
        }
        if (password !== confirm) {
            alert('Mật khẩu không khớp!');
            return false; // ngăn form submit
        }
        // Kiểm tra độ dài tối thiểu
        if (password.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự!');
            return false;
        }

        // Kiểm tra có ít nhất 1 chữ cái viết hoa
        if (!/[A-Z]/.test(password)) {
            alert('Mật khẩu phải có ít nhất 1 chữ cái viết hoa!');
            return false;
        }

        // Kiểm tra có ít nhất 1 chữ số
        if (!/[0-9]/.test(password)) {
            alert('Mật khẩu phải có ít nhất 1 chữ số!');
            return false;
        }
        return true; // cho phép submit
    }
</script>
<script>
    $(document).ready(function () {
        $('#tinh_thanhpho').on('change', function () {
            var matp = $(this).val();
            // Reset quận và xã trước khi load lại
            $('#quan_huyen').html('<option value="">Chọn Quận / Huyện</option>');
            $('#xa_phuong').html('<option value="">Chọn Phường / Xã</option>');
            $.ajax({
                url: 'api/loaddiachi.php',
                method: 'POST',
                data: {
                    key: 'quanhuyen',
                    matp: matp
                },
                success: function (data) {
                    $('#quan_huyen').html(data);
                },
                error: function () {
                    alert('Có lỗi khi tải danh sách quận/huyện');
                }
            });
        });
    });
    $('#quan_huyen').on('change', function () {
        var maqh = $(this).val();
        // Reset xã trước khi load lại
        $('#xa_phuong').html('<option value="">Chọn Phường / Xã</option>');
        $.ajax({
            url: 'api/loaddiachi.php',
            method: 'POST',
            data: {
                key: 'xaphuong',
                maqh: maqh
            },
            success: function (data) {
                $('#xa_phuong').html(data);
            },
            error: function () {
                alert('Có lỗi khi tải danh sách xã/phường');
            }
        });
    });
</script>
<script>
    function setupToggle(iconId, inputId) {
        const icon = document.getElementById(iconId);
        const input = document.getElementById(inputId);

        icon.addEventListener('click', function () {
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }

    // Gắn cho từng cặp input + icon
    document.addEventListener('DOMContentLoaded', function () {
        setupToggle('togglePassword1', 'password1');
        setupToggle('togglePassword2', 'password2');
    });
</script>