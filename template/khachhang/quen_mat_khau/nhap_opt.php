<?php
if ($f->isPOST())
{
    // Lấy email và mật khẩu người dùng nhập
    $filterAll = $f->filter();
    $otp_input = trim($filterAll['otp'] ?? '');

    if ($otp == $otp_input)
    {
        $f->redirect('./tao_mat_khau');
    } else
    {
        $error_email = 'OTP không đúng';
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
                <li><a href="./">Trang chủ</a></li>
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
                                        <input class="field-control" name="otp" type="text"
                                            placeholder="Nhập otp đã được gửi trong email" required>
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