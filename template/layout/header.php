<?php
$logo = $db->oneRaw("SELECT * FROM images WHERE type = 'logo'")['image'];
$phone_number = $f->formatPhoneNumber($setting_info[2]['setting_value']);

?>

<header class="header">
      <input
        id="header-default"
        type="radio"
        class="collapse"
        checked="checked"
        name="siteheader"
      />
      <input
        id="header-shown"
        type="radio"
        class="collapse"
        name="siteheader"
      />
      <input
        id="header-hidden"
        type="radio"
        class="collapse"
        name="siteheader"
      />
      <nav class="stick-menu menu-wrap shop-menu line">
        <div class="menu-container">
          <div class="menu-row">
            <!-- Logo -->
            <div class="logo">
              <a href="index-2.html"
                ><img src="assets/images/service/logo-alt.png" alt="ProFix"
              /></a>
            </div>

            <!-- Search -->
            <form action="#" class="menu-search">
              <div class="menu-search-field">
                <div class="field-group">
                  <div class="field-wrap">
                    <input
                      class="field-control"
                      name="search"
                      placeholder="Tìm sản phẩm"
                      required="required"
                    />
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
                  <a href="#" data-show-block="search"
                    ><i class="fas fa-search" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="dang-nhap"
                    ><i class="fas fa-user"></i>
                    <span class="xs-hidden menu-extra-text">Tài khoản</span></a
                  >
                </li>
                <li class="xs-hidden">
                  <a href="#"><i class="fas fa-heart"></i></a>
                </li>
                <li>
                  <a href="#" data-show-block="cart"
                    ><i class="fas fa-shopping-cart" aria-hidden="true"></i
                    ><span class="item-label-sale item-label">3</span></a
                  >
                </li>
              </ul>
            </div>

            <!-- header-toggler – Bộ điều khiển menu trên thiết bị nhỏ -->
            <div class="header-toggler xs-shown pull-right">
              <label class="header-shown-sign" for="header-hidden"
                ><i class="fas fa-times" aria-hidden="true"></i
              ></label>
              <label class="header-hidden-sign" for="header-shown"
                ><i class="fas fa-bars" aria-hidden="true"></i
              ></label>
            </div>

            <!-- menu -->
            <div class="menu">
              <ul class="menu-items menu-no-sides">
                <li>
                  <a href="index-2.html">Trang chủ</a>
                </li>
                <li>
                  <a href="shop-category.html">Sản phẩm</a>
                </li>
                <li>
                  <a href="shop-category.html">Tin tức</a>
                </li>
                <li>
                  <a href="contact-us.html">Liên hệ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
