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
      <?php if (empty($danh_sach_don_hang)): ?>
        <div class="alert alert-warning mt-3">Bạn chưa có đơn hàng nào</div>
      <?php else: ?>
        <?php foreach ($danh_sach_don_hang as $don_hang):
          $chi_tiet_don_hang = $db->getRaw("SELECT * FROM chi_tiet_don_hang WHERE don_hang_id = " . $don_hang['id']);
          // echo '<pre>';
          // print_r($chi_tiet_don_hang);
          // echo '</pre>';
          foreach ($chi_tiet_don_hang as $ctdh) {

            $san_pham = $db->oneRaw("SELECT * FROM san_pham WHERE id = " . $ctdh['san_pham_id']);
            $ten_san_pham = '';
            foreach ($chi_tiet_don_hang as $ctdh) {
              $san_pham = $db->oneRaw("SELECT * FROM san_pham WHERE id = " . $ctdh['san_pham_id']);
              if ($ten_san_pham == '') {
                $ten_san_pham = $san_pham['ten_san_pham'];
              } else {
                $ten_san_pham .= ', ' . $san_pham['ten_san_pham'];
              }
            }
          }
        ?>
          <div class="user-dashboard-item text-upper">
            <div class="user-dashboard-item-number"><?= $don_hang['ma_don_hang'] ?></div>
            <div class="user-dashboard-item-title"><?= $ten_san_pham ?></div>
            <div class="user-dashboard-item-date"><?= date("d-m-Y", strtotime($don_hang['ngay_tao'])) ?></div>
            <div class="user-dashboard-item-price">
              <!-- <span class="currency">$</span>55.4 -->
              <?= $f->format_tiente($ctdh['tong_tien']) ?>₫
            </div>
            <div class="user-dashboard-item-status pending" style="color: <?= $f->color_order_2($don_hang['trang_thai']) ?>;"><?= $f->status_order($don_hang['trang_thai']) ?></div>
          </div>
      <?php

        endforeach;
      endif;
      ?>
      <div class="user-dashboard-list-btns">
        <a class="btns-bordered btn text-upper" href="?page=don-hang">Xem chi tiết</a>
      </div>
    </div>
  </div>
</section>