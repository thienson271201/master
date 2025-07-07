<?php
$error_email = '';
$error_password = '';
if ($f->isPOST())
{
  // Lấy email và mật khẩu người dùng nhập
  $filterAll = $f->filter();
  $email = trim($filterAll['email'] ?? '');

  // Kiểm tra email có hợp lệ không
  // 2 khách hàng khác nhau không được trùng email
  if ($db->oneRaw("SELECT * FROM khach_hang WHERE email = '$email'") == null)
  {
    $error_email = 'Email không tồn tại trong hệ thống';
  } else
  {
    $otp = random_int(100000, 999999);
    setSession('otp', $otp);
    $f->gui_otp($email, $otp);
    $f->redirect('./nhap-opt');
  }
}
?>

<section class="with-bg solid-section">
  <div class="fix-image-wrap" data-image-src="./assets/images/service/harddrive.jpg" data-parallax="scroll"></div>
  <div class="theme-back"></div>
  <div class="container page-info">
    <div class="section-alt-head container-md">
      <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        Quên mật khẩu
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
        <li>Quên mật khẩu</li>
      </ul>
    </div>
  </div>
</section>
<section class="content-section">
  <div class="container">
    <div class="section-head text-center container-md">
      <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        Quên mật khẩu
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
                    <input class="field-control" name="email" type="email"
                      placeholder="Nhập email để khôi phục mật khẩu" required>
                    <span class="field-icon">
                      <i class="far fa-envelope"></i>
                    </span>
                    <span class="field-back"></span>
                  </div>
                  <span class="field-sub-text <?= $error_email ? 'text-danger' : 'd-none' ?>"><i
                      class="fas fa-times error-text"></i> <?= $error_email ?></span>
                </div>
              </div>
              <div class="text-right">

                <button class="btn text-upper">
                  TIẾP THEO
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>