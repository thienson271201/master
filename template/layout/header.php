<?php
// $logo = $db->oneRaw("SELECT * FROM images WHERE type = 'logo'")['image'];
// $phone_number = $f->formatPhoneNumber($setting_info[2]['setting_value']);
if ($f->isLogin())
{
  $id = $_SESSION['khach_hang_id'];
  $taikhoan = $db->oneRaw("SELECT ten_khach_hang FROM khach_hang WHERE id = '$id'")['ten_khach_hang'];
} else
  $taikhoan = 'Đăng nhập';

$number_cart = $f->tinhTongSanPhamTrongGioHang();
?>

<header class="header">
  <input id="header-default" type="radio" class="collapse" checked="checked" name="siteheader" />
  <input id="header-shown" type="radio" class="collapse" name="siteheader" />
  <input id="header-hidden" type="radio" class="collapse" name="siteheader" />
  <nav class="stick-menu menu-wrap shop-menu line">
    <div class="menu-container">
      <div class="menu-row">
        <!-- Logo -->
        <div class="logo">
          <a href="./"><img src="assets/images/service/logo-alt.png" alt="ProFix" /></a>
        </div>

        <!-- Search -->
        <form action="./san-pham" class="menu-search">
          <div class="menu-search-field">
            <div class="field-group">
              <div class="field-wrap">
                <input class="field-control" name="tim-kiem" placeholder="Tìm sản phẩm" required="required" />
                <span class="field-back"></span>
              </div>
            </div>
          </div>
          <div class="menu-search-btn">
            <button class="btn sides-lg" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>

        <!-- menu-extra – Thanh menu chứa các tính năng bổ sung -->
        <div class="menu-extra">
          <!-- menu-extra-items – Danh sách các mục trong thanh menu -->
          <ul class="menu-extra-items">
            <li class="xs-shown">
              <a href="#" data-show-block="search"><i class="fas fa-search" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="<?= $f->isLogin() ? 'thanh-vien' : 'dang-nhap' ?>"><i class="fas fa-user"></i>
                <span class="xs-hidden menu-extra-text"><?= $taikhoan ?></span></a>
            </li>
            <!-- <li class="xs-hidden">
              <a href="#"><i class="fas fa-heart"></i></a>
            </li> -->
            <li>
              <a href="#" data-show-block="cart"><i class="fas fa-shopping-cart" aria-hidden="true"></i><span
                  class="item-label-sale item-label" id="number-cart"><?= $number_cart ?></span></a>
            </li>
          </ul>
        </div>

        <!-- header-toggler – Bộ điều khiển menu trên thiết bị nhỏ -->
        <div class="header-toggler xs-shown pull-right">
          <label class="header-shown-sign" for="header-hidden"><i class="fas fa-times" aria-hidden="true"></i></label>
          <label class="header-hidden-sign" for="header-shown"><i class="fas fa-bars" aria-hidden="true"></i></label>
        </div>

        <!-- menu -->
        <div class="menu">
          <ul class="menu-items menu-no-sides">
            <li>
              <a href="./">Trang chủ</a>
            </li>
            <li>
              <a href="san-pham">Sản phẩm</a>
            </li>
            <li>
              <a href="tin-tuc">Tin tức</a>
            </li>
            <li>
              <a href="lien-he">Liên hệ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>