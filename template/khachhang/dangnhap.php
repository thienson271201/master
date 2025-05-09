<?php
if ($f->isPOST())
{
  // Lấy email và mật khẩu người dùng nhập
  $filterAll = $f->filter();
  $email = $filterAll['email'];
  $mat_khau = $filterAll['mat_khau'];
  // Truy vấn để tìm email
  $khach_hang_query = $db->oneRaw("SELECT * FROM khach_hang WHERE email='$email'");
  if ($khach_hang_query)
  {
    // Trường hợp có email
    $passwordHash = $khach_hang_query['mat_khau'];
    $khach_hang_id = $khach_hang_query['id'];
    if (password_verify($mat_khau, $passwordHash))
    {
      //tạo token login
      $tokenLogin = sha1(uniqid() . time());
      //insert vào bảng loginToken
      $dataInsert = [
        'khach_hang_id' => $khach_hang_id,
        'token' => $tokenLogin,
        'ngay_tao' => date('Y-m-d H:i:s')
      ];
      $insertStatus = $db->insert('khach_hang_token', $dataInsert);
      if ($insertStatus)
      {
        setSession('userLoginToken', $tokenLogin);
        setSession('khach_hang_id', $khach_hang_id);
        $f->redirect('thanh-vien');
      }
    }
  } else
  {
    // Trường hợp không có email
    echo 'Email không tồn tại';
  }

}
?>


<section class="with-bg solid-section">
  <div class="fix-image-wrap" data-image-src="./assets/images/service/harddrive.jpg" data-parallax="scroll"></div>
  <div class="theme-back"></div>
  <div class="container page-info">
    <div class="section-alt-head container-md">
      <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        Đăng nhập
      </h1>
      <!-- <p data-inview-showup="showup-translate-left">
            A little something about our company
          </p> -->
    </div>
  </div>
  <div class="section-footer">
    <div class="container" data-inview-showup="showup-translate-down">
      <ul class="page-path">
        <li><a href="index-2.html">Trang chủ</a></li>
        <li class="path-separator">
          <i class="fas fa-chevron-right" aria-hidden="true"></i>
        </li>
        <!-- <li>Pages</li>
            <li class="path-separator">
              <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </li> -->
        <li>Đăng nhập</li>
      </ul>
    </div>
  </div>
</section>
<section class="content-section">
  <div class="container">
    <div class="section-head text-center container-md">
      <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        Đăng nhập
      </h2>

    </div>
    <form class="sign-in-form" method="post">
      <div class="medium-container">
        <div style="justify-content: center;" class="row rows-lg cols-lg rows-lg d-flex">
          <div class="sm-col-8">
            <div class="item-form" data-inview-showup="showup-translate-right">
              <div class="offs-lg">
                <div class="field-group">
                  <div class="field-wrap">

                    <input class="field-control" name="email" placeholder="Email" type="email" required="required" />
                    <span class="field-back"></span>
                  </div>
                </div>
                <div class="field-group">
                  <div class="field-wrap">
                    <input id="password" class="field-control" name="mat_khau" type="password" placeholder="Mật khẩu"
                      required="required" />
                    <span class="field-back"></span>
                  </div>
                  <!-- Icon mắt -->
                  <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword"></i>
                </div>
              </div>
              <div class="row cols-md offs-md">
                <div class="col-12 text-right shift-xs">
                  <a href="forgot-password.html">Quên mật khẩu?</a>
                </div>
              </div>
              <div class="text-right">
                <a class="text-medium mr-3" href="dang-ky"><i class="fas fa-edit"></i>&nbsp;&nbsp;Đăng ký tài khoản</a>
                <button class="btn text-upper">
                  ĐĂNG NHẬP
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
  document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword');

    toggleIcon.addEventListener('click', function () {
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';

      // Đổi icon
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  });
</script>