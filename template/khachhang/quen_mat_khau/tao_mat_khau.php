<?php
$error_password = '';
if ($f->isPOST()) {
    // Lấy email và mật khẩu người dùng nhập
    $filterAll = $f->filter();
    $mat_khau = trim($filterAll['mat_khau'] ?? '');
    $nhap_lai_mat_khau = trim($filterAll['nhap_lai_mat_khau'] ?? '');


    if ($nhap_lai_mat_khau != $mat_khau) {
        $error_password = 'Mật khẩu không khớp';
    }
    if ($error_password == '') {
        $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);
        echo $mat_khau;
        $mat_khau_update = $db->update('khach_hang', ['mat_khau' => $mat_khau], 'id = ' . getSession('id_quen_mat_khau'));
        // Cập nhật mật khẩu
        if ($mat_khau_update) {
            // Xóa OTP và email khỏi session
            removeSession('otp');
            removeSession('email');
            $f->redirect('./dang-nhap');
        } else {
            $error_password = 'Đổi mật khẩu không thành công';
        }
    }
}
// setSession('email', 'minh.boy200@gmail.com');
echo getSession("email") ? getSession("email") : '';
?>
<section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="./assets/images/service/harddrive.jpg" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
                Đăng nhập
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
                <li>Đổi mật khẩu</li>
            </ul>
        </div>
    </div>
</section>
<section class="content-section">
    <div class="container">
        <div class="section-head text-center container-md">
            <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
                Đổi mật khẩu
            </h2>
        </div>
        <form class="sign-in-form" method="post">
            <div class="medium-container">
                <div style="justify-content: center;" class="row rows-lg cols-lg rows-lg d-flex">
                    <div class="sm-col-8">
                        <div class="item-form" data-inview-showup="showup-translate-right">
                            <div class="offs-lg">
                                <div class="field-group">
                                    <div class="field-wrap has-icon">
                                        <input id="password" class="field-control" name="mat_khau" type="password"
                                            placeholder="Nhập mật khẩu" required />
                                        <span class="field-back"></span>
                                        <span class="field-icon">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <!-- Icon mắt -->
                                    <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword"></i>

                                </div>
                                <div class="field-group">
                                    <div class="field-wrap has-icon">
                                        <input id="password2" class="field-control" name="nhap_lai_mat_khau"
                                            type="password" placeholder="Nhập lại mật khẩu" required />
                                        <span class="field-back"></span>
                                        <span class="field-icon">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <!-- Icon mắt -->
                                    <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword2"></i>
                                    <span class="field-sub-text <?= $error_password ? 'text-danger' : 'd-none' ?>"><i
                                            class="fas fa-times error-text"></i> <?= $error_password ?></span>
                                </div>
                            </div>
                            <div class="text-right">

                                <button class="btn text-upper">
                                    Hoàn tất
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePassword');

        toggleIcon.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';

            // Đổi icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password2');
        const toggleIcon = document.getElementById('togglePassword2');

        toggleIcon.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';

            // Đổi icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.sign-in-form').on('submit', function(e) {
            e.preventDefault(); // chặn hành vi submit mặc định

            var password = $('#password').val();
            var password2 = $('#password2').val();
            var form = this;

            if (password === password2) {
                // Nếu giống nhau: hiện thông báo rồi mới submit
                Swal.fire({
                    title: "Đổi mật khẩu thành công!",
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    didOpen: () => {
                        $('.swal2-container').css('z-index', 99999); // tăng z-index
                    }
                }).then(function() {
                    form.submit(); // Gửi form sau khi đóng popup
                });
            } else {
                // Nếu không giống nhau: submit ngay
                form.submit();
            }
        });
    });
</script>