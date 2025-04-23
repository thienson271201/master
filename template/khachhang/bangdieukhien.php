<?php
$khach_hang_id = getSession('khach_hang_id');
$user_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id = '$khach_hang_id'");
if (!empty($user_profile['tinh_thanhpho']) && !empty($user_profile['quan_huyen']) && !empty($user_profile['xa_phuong']) && !empty($user_profile['dia_chi']))
{
  $matp = $user_profile['tinh_thanhpho'];
  $tentinh = $db->oneRaw("SELECT * FROM tinhthanhpho WHERE matp = $matp")['name'];
  $maqh = $user_profile['quan_huyen'];
  $tenhuyen = $db->oneRaw("SELECT * FROM quanhuyen WHERE maqh = $maqh")['name'];
  $xaid = $user_profile['xa_phuong'];
  $tenxa = $db->oneRaw("SELECT * FROM xaphuongthitran WHERE xaid = $xaid")['name'];
}
?>
<section class="shift-lg offs-lg">
  <div class="container">
    <div class="user-dashboard-personal-info">
      <div class="rows-md cols-md row">
        <div class="md-col-5">
          <div class="user-dashboard-user">
            <div class="user-dashboard-user-image">
              <div class="responsive-1by1">
                <img src="upload/images/<?= $user_profile['anh_dai_dien'] ?>" alt=""
                  onerror="this.src='assets/images/noimage/user.png'" />
              </div>
            </div>
            <div class="user-dashboard-user-content">
              <h6 class="user-dashboard-user-title text-upper">
                <?= $user_profile['ten_khach_hang'] ?>
              </h6>
              <div class="user-dashboard-user-subtitle">Thành viên</div>
            </div>
          </div>
        </div>
        <div class="md-col-7">
          <div class="cols-md row">
            <div class="sm-col-6">
              <div class="user-dashboard-info-line">
                <div class="user-dashboard-info-icon">
                  <i class="fas fa-envelope fa-fw"></i>
                </div>
                <div class="user-order-info-value">
                  <a href="https://amigos-themes.com/cdn-cgi/l/email-protection" class="__cf_email__"
                    data-cfemail="4928272d303a240924282025672a2624"><?= $user_profile['email'] ?></a>
                </div>
              </div>
              <div class="user-dashboard-info-line">
                <div class="user-dashboard-info-icon">
                  <i class="fas fa-mobile-alt fa-fw"></i>
                </div>
                <div class="user-order-info-value"><?= $user_profile['so_dien_thoai'] ?></div>
              </div>
            </div>
            <div class="sm-col-6">
              <div class="user-dashboard-info-line">
                <div class="user-dashboard-info-icon">
                  <i class="fas fa-map-marker-alt fa-fw"></i>
                </div>
                <div class="user-order-info-value">
                  <?= (!empty($user_profile['tinh_thanhpho']) && !empty($user_profile['quan_huyen']) && !empty($user_profile['xa_phuong']) && !empty($user_profile['dia_chi'])) ? $user_profile['dia_chi'] . ', ' . $tenxa . ', ' . $tenhuyen . ', ' . $tentinh : 'Chưa cập nhật địa chỉ' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="shift-lg offs-lg">
  <div class="container">
    <div class="user-dashboard-list user-dashboard-orders-list">
      <h4 class="reset-offs text-upper">Đơn hàng của tôi</h4>
      <div class="user-dashboard-item text-upper">
        <div class="user-dashboard-item-number">#972523776a</div>
        <div class="user-dashboard-item-title">Laptop Gaming ASUS ROG</div>
        <div class="user-dashboard-item-date">17.04.2025</div>
        <div class="user-dashboard-item-price">
          <!-- <span class="currency">$</span>55.4 -->
          35.990.000₫
        </div>
        <div class="user-dashboard-item-status pending">Hoàn thành</div>
      </div>
      <div class="user-dashboard-item text-upper">
        <div class="user-dashboard-item-number">#972523776a</div>
        <div class="user-dashboard-item-title">Laptop Gaming ASUS ROG</div>
        <div class="user-dashboard-item-date">17.04.2025</div>
        <div class="user-dashboard-item-price">
          <!-- <span class="currency">$</span>55.4 -->
          35.990.000₫
        </div>
        <div class="user-dashboard-item-status failed">Thất bại</div>
      </div>
      <div class="user-dashboard-item text-upper">
        <div class="user-dashboard-item-number">#972523776a</div>
        <div class="user-dashboard-item-title">Laptop Gaming ASUS ROG</div>
        <div class="user-dashboard-item-date">17.04.2025</div>
        <div class="user-dashboard-item-price">
          <!-- <span class="currency">$</span>55.4 -->
          35.990.000₫
        </div>
        <div class="user-dashboard-item-status processing">Đang xử lý</div>
      </div>
      <div class="user-dashboard-list-btns">
        <a class="btns-bordered btn text-upper" href="?page=don-hang">Xem chi tiết</a>
      </div>
    </div>
  </div>
</section>