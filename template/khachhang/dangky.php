<?php
if ($f->isPOST())
{
  $filterAll = $f->filter();

  // Kiểm tra số điện thoại: bắt đầu bằng 0 và đúng 10 chữ số
  if (!preg_match('/^0\d{9}$/', $filterAll['so_dien_thoai']))
  {
    echo '<script>alert("Số điện thoại không hợp lệ. Phải bắt đầu bằng số 0 và có đúng 10 chữ số.");</script>';
  } elseif ($filterAll['mat_khau'] !== $filterAll['nhap_lai_mat_khau'])
  {
    echo '<script>alert("Mật khẩu và nhập lại mật khẩu không khớp.");</script>';
  } else
  {
    $khach_hang = [
      'ten_khach_hang' => $filterAll['ten_khach_hang'],
      'email' => $filterAll['email'],
      'mat_khau' => password_hash($filterAll['mat_khau'], PASSWORD_DEFAULT),
      'so_dien_thoai' => $filterAll['so_dien_thoai'],
      'ngay_tao' => date('Y-m-d H:i:s')
    ];

    $insertStatus = $db->insert('khach_hang', $khach_hang);
    if ($insertStatus)
      $f->redirect('dang-nhap');
  }
}
?>
<section class="with-bg solid-section">
  <div class="fix-image-wrap" data-image-src="./assets/images/service/harddrive.jpg" data-parallax="scroll"></div>
  <div class="theme-back"></div>
  <div class="container page-info">
    <div class="section-alt-head container-md">
      <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        ĐĂNG KÝ
      </h1>
    </div>
  </div>
  <div class="section-footer">
    <div class="container" data-inview-showup="showup-translate-down">
      <ul class="page-path">
        <li><a href="index-2.html">Trang chủ</a></li>
        <li class="path-separator">
          <i class="fas fa-chevron-right" aria-hidden="true"></i>
        </li>
        <li>Đăng ký</li>
      </ul>
    </div>
  </div>
</section>
<section class="content-section">
  <div class="container">
    <form class="sign-up-form" method="post">
      <h2 class="section-title text-upper text-lg showup-translate-right text-center"
        data-inview-showup="showup-translate-right">
        Đăng ký
      </h2>
      <div class="row cols-lg rows-md d-flex" style="display: flex;
      flex-direction: column;
      align-items: center;">
        <div class="sm-col-8" data-inview-showup="showup-translate-left">
          <div class="field-group">
            <div class="field-wrap">
              <input class="field-control width:100%" name="ten_khach_hang" placeholder="Họ và tên"
                required="required" />
              <span class="field-back"></span>
            </div>
          </div>
        </div>
        <div class="sm-col-8" data-inview-showup="showup-translate-right">
          <div class="field-group">
            <div class="field-wrap">
              <input class="field-control" name="email" type="email" placeholder="Email" required="required" />
              <span class="field-back"></span>
            </div>
          </div>
        </div>
        <div class="sm-col-8" data-inview-showup="showup-translate-left">
          <div class="field-group">
            <div class="field-wrap">
              <input class="field-control" name="so_dien_thoai" placeholder="Số điện thoại" required="required" />
              <span class="field-back"></span>
            </div>
          </div>
        </div>
        <div class="sm-col-8" data-inview-showup="showup-translate-right">
          <div class="field-group">
            <div class="field-wrap">
              <input class="field-control" name="mat_khau" id="password1" type="password" placeholder="Mật khẩu"
                required="required" />
              <span class="field-back"></span>

            </div>
            <!-- Icon mắt -->
            <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword1"></i>

          </div>
        </div>
        <div class="sm-col-8" data-inview-showup="showup-translate-left">
          <div class="field-group">
            <div class="field-wrap">
              <input class="field-control" name="nhap_lai_mat_khau" id="password2" type="password"
                placeholder="Nhập lại mật khẩu" required="required" />
              <span class="field-back"></span>
            </div>
            <!-- Icon mắt -->
            <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword2"></i>
          </div>
        </div>
      </div>

      <div class="row cols-lg rows-md text-right" style="display: flex;
      flex-direction: column;
      align-items: center;">
        <div class="sm-col-8 shift-lg offs-lg" data-inview-showup="showup-translate-right">
          <a class="text-medium mr-3" href="dang-nhap"><i class="fas fa-edit"></i>&nbsp;&nbsp;Đăng nhập</a>
          <button class="btn text-upper" type="submit">
            ĐĂNG KÝ
          </button>
        </div>
      </div>
    </form>
  </div>
</section>

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