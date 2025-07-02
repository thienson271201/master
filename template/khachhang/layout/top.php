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

$khach_hang_id = getSession('khach_hang_id');
$user_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id = '$khach_hang_id'");
$danh_sach_don_hang = $db->getRaw("SELECT * FROM don_hang WHERE khach_hang_id = '$khach_hang_id' ORDER BY id DESC");
if (!empty($user_profile['tinh_thanhpho']) && !empty($user_profile['quan_huyen']) && !empty($user_profile['xa_phuong']) && !empty($user_profile['dia_chi'])) {
  $matp = $user_profile['tinh_thanhpho'];
  $tentinh = $db->oneRaw("SELECT * FROM tinhthanhpho WHERE matp = $matp")['name'];
  $maqh = $user_profile['quan_huyen'];
  $tenhuyen = $db->oneRaw("SELECT * FROM quanhuyen WHERE maqh = $maqh")['name'];
  $xaid = $user_profile['xa_phuong'];
  $tenxa = $db->oneRaw("SELECT * FROM xaphuongthitran WHERE xaid = $xaid")['name'];
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