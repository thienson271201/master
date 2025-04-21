<?php
switch ($duongdan) {
    case 'bang-dieu-khien':
        $tieude = 'Bảng điểu khiển';
        break;

    case 'ho-so':
        $tieude = 'Hồ sơ';
        break;
    case 'don-hang':
        $tieude = 'Đơn hàng';
        break;
}


?>
<section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
            <?= $tieude ?>
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
                <li><?= $tieude ?></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <nav class="user-dashboard-menu">
            <ul>
                <li class="menu-item">
                    <a href="?page=bang-dieu-khien">Bảng điều khiển</a>
                </li>
                <li class="menu-item"><a href="?page=ho-so">Hồ sơ</a></li>
                <li class="menu-item"><a href="?page=don-hang">Đơn hàng</a></li>
                <li class="menu-btn menu-stick-right">
                    <a class="btn btns-bordered-alt text-upper" href="?page=dang_xuat">Đăng xuất</a>
                </li>
            </ul>
        </nav>
    </div>
</section>