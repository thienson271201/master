<?php
$limit = 16; // Số lượng sản phẩm hiển thị trên mỗi trang
$trang = isset($_GET['trang']) ? (int)$_GET['trang'] : 1; // Trang hiện tại
if ($trang < 1) {
  $trang = 1; // Đảm bảo trang không nhỏ hơn 1
}
$offset = ($trang - 1) * $limit; // Tính toán vị trí bắt đầu
// Lấy tổng số sản phẩm
$total_san_pham = $db->oneRaw('SELECT COUNT(*) as count FROM san_pham')['count'];
// Tính toán tổng số trang  
$total_trang = ceil($total_san_pham / $limit);
// Lấy danh sách sản phẩm với phân trang
$list_san_pham = $db->getRaw('select * from san_pham limit ' . $offset . ', ' . $limit);



$danh_sach_thuong_hieu = $db->getRaw('SELECT * FROM thuong_hieu');

// echo '<pre>';
// print_r ($list_san_pham);
// echo '</pre>';

if (isset($_GET['sap-xep'])) {
  $sortby = $_GET['sap-xep'];

  if ($sortby == 'tang-dan') {
    // Sắp xếp tăng dần theo giá sau khuyến mãi
    usort($list_san_pham, function ($a, $b) {
      return $a['gia_sau_khuyen_mai'] <=> $b['gia_sau_khuyen_mai'];
    });
  } elseif ($sortby == 'giam-dan') {
    // Sắp xếp giảm dần theo giá sau khuyến mãi
    usort($list_san_pham, function ($a, $b) {
      return $b['gia_sau_khuyen_mai'] <=> $a['gia_sau_khuyen_mai'];
    });
  }
}

if (isset($_GET['thuong-hieu']) && $_GET['thuong-hieu'] !== 'tat-ca') {
  $thuong_hieu = $_GET['thuong-hieu'];
  $id_thuong_hieu = $db->oneRaw("SELECT id FROM thuong_hieu WHERE duong_dan = '$thuong_hieu'")['id'];
  $list_san_pham = array_filter($list_san_pham, function ($san_pham) use ($id_thuong_hieu) {
    return $san_pham['thuong_hieu_id'] == $id_thuong_hieu;
  });
  if (empty($list_san_pham)) {
    echo 'Không có sản phẩm nào của thương hiệu này';
  } else {
    echo 'Sản phẩm của thương hiệu: ' . htmlspecialchars($thuong_hieu);
  }
}

if (isset($_GET['tim-kiem']) && $_GET['tim-kiem'] !== '') {
  $tim_kiem = $_GET['tim-kiem'];
  $list_san_pham = array_filter($list_san_pham, function ($san_pham) use ($tim_kiem) {
    return stripos($san_pham['ten_san_pham'], $tim_kiem) !== false;
  });
  if (empty($list_san_pham)) {
    setFlashData('tim_kiem', '<div class="alert alert-error">
        Không tìm thấy kết quả cho: <strong>'. $tim_kiem .'</strong>
        <br>Vui lòng thử lại với từ khóa khác.
      </div>');
  } else {
    // Hiển thị thông báo tìm thấy kết quả
    setFlashData('tim_kiem', '<div class="alert alert-valid">
        Tìm thấy <strong>' . count($list_san_pham) . '</strong> kết quả cho: <strong>' . htmlspecialchars($tim_kiem) . '</strong>
      </div>');
  }
}



?>
<section class="with-bg solid-section">
  <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
  <div class="theme-back"></div>
  <div class="container page-info">
    <div class="section-alt-head container-md">
      <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right"><?= $title ?>
      </h1>
    </div>
  </div>
  <div class="section-footer">
    <div class="container" data-inview-showup="showup-translate-down">
      <ul class="page-path">
        <li><a href="index-2.html">Trang chủ</a></li>
        <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
        <li><?= $title ?></li>
      </ul>
    </div>
  </div>
</section>

<section class="content-section">
  <div class="container">
      
    
    <section class="content-section">
      <?php
      $ket_qua_tim_kiem = getFlashData('tim_kiem');
      if ($ket_qua_tim_kiem) {
        echo $ket_qua_tim_kiem;
      }
      ?>
      <form method="get">
        <div class="row">
          <!-- <div class="sm-col-6 md-col-4">
            <div class="field-group shop-line-field chosen-field">
              <label>Sắp xếp</label>
              <div class="field-wrap">
                <form method="get">
                  <select class="field-control" name="sap-xep" onchange="this.form.submit()">
                    <option name="sap-xep">Giá</option>
                    <option name="sap-xep" value="tang-dan" <?= isset($_GET['sap-xep']) && $_GET['sap-xep'] == 'tang-dan' ? 'selected' : '' ?>>Tăng dần</option>
                    <option name="sap-xep" value="giam-dan" <?= isset($_GET['sap-xep']) && $_GET['sap-xep'] == 'giam-dan' ? 'selected' : '' ?>>Giảm dần</option>
                  </select>
                </form>
                <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                <span class="field-back"></span>
              </div>
            </div>
          </div>
          <div class="sm-col-6 md-col-4">
            <div class="field-group shop-line-field chosen-field">
              <label>Thương hiệu</label>
              <div class="field-wrap">
                <form method="get">
                  <select class="field-control" name="thuong-hieu" selected="selected" onchange="this.form.submit()">
                    <option selected="selected">Chọn</option>
                    <?php

                    // echo '<pre>';
                    // print_r ($danh_sach_thuong_hieu);
                    // echo '</pre>';
                    foreach ($danh_sach_thuong_hieu as $thuong_hieu):
                    ?>
                      <option value="<?= $thuong_hieu['duong_dan'] ?>" <?= isset($_GET['thuong-hieu']) && $_GET['thuong-hieu'] == $thuong_hieu['duong_dan'] ? 'selected' : '' ?>>
                        <?= $thuong_hieu['ten_thuong_hieu'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </form>
                <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                <span class="field-back"></span>
              </div>
            </div>
          </div> -->
          <div class="sm-col-12">
            <div class="row cols-md rows-md">
              <div class="sm-col-6 md-col-3 lg-col-3">
                <div class="field-group chosen-field" style="margin-bottom: 20px;">
                  <div class="field-wrap">
                    <select class="field-control" name="sap-xep">
                      <option name="sap-xep" value="mac-dinh">Sắp xếp</option>
                      <option name="sap-xep" value="tang-dan" <?= isset($_GET['sap-xep']) && $_GET['sap-xep'] == 'tang-dan' ? 'selected' : '' ?>>Giá tăng dần</option>
                      <option name="sap-xep" value="giam-dan" <?= isset($_GET['sap-xep']) && $_GET['sap-xep'] == 'giam-dan' ? 'selected' : '' ?>>Giá giảm dần</option>
                    </select> <span class="select-arrow"><i
                        class="fas fa-chevron-down"></i></span> <span
                      class="field-back"></span>
                  </div>
                </div>
              </div>
              <div class="sm-col-6 md-col-3 lg-col-3">
                <div class="field-group chosen-field" style="margin-bottom: 20px;">
                  <div class="field-wrap">
                    <select class="field-control" name="thuong-hieu" >
                      <option value="tat-ca">Thương hiệu</option>
                      <?php

                      // echo '<pre>';
                      // print_r ($danh_sach_thuong_hieu);
                      // echo '</pre>';
                      foreach ($danh_sach_thuong_hieu as $thuong_hieu):
                      ?>
                        <option value="<?= $thuong_hieu['duong_dan'] ?>" <?= isset($_GET['thuong-hieu']) && $_GET['thuong-hieu'] == $thuong_hieu['duong_dan'] ? 'selected' : '' ?>>
                          <?= $thuong_hieu['ten_thuong_hieu'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select> <span class="select-arrow"><i
                        class="fas fa-chevron-down"></i></span> <span
                      class="field-back"></span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="sm-col-12"><button class="btn text-upper" style="margin-bottom: 20px;" type="submit">Áp dụng</button></div>
        </div>

      </form>
      <div class="row rows-stuck-2 cols-stuck-2">
        <?php
        foreach ($list_san_pham as $san_pham):
        ?>
          <div class="col-12 sm-col-3 lg-col-3">
            <div
              class="item shop-item shop-item-short item-dash-border"
              data-inview-showup="showup-scale">
              <div class="item-back"></div>
              <?php
              $phan_tram = round((($san_pham['gia_goc'] - $san_pham['gia_sau_khuyen_mai']) / $san_pham['gia_goc']) * 100);
              if ($phan_tram > 1): ?>
                <div class="item-lables">
                  <a class="item-label-sale item-label" href="#">-<?= $phan_tram ?>%</a>
                </div>
              <?php endif; ?>
              <a href="<?= $san_pham['duong_dan'] ?>" class="item-image responsive-1by1">
                <img
                  src="upload/images/<?= $san_pham['hinh_anh'] ?>" />
              </a>
              <div class="item-content text-center">
                <div class="item-title text-upper mb-0">
                  <a href="<?= $san_pham['duong_dan'] ?>" class="content-link"><?= $san_pham['ten_san_pham'] ?></a>
                </div>
                <div class="item-specs">
                  <?= $san_pham['thong_so_kich_thuoc'] ?>
                </div>
                <div class="item-prices">
                  <div class="item-price"><?= number_format($san_pham["gia_sau_khuyen_mai"], 0, ',', '.') ?> ₫</div>
                  <?php if ($phan_tram > 1) : ?>
                    <div class="item-old-price"><?= number_format($san_pham["gia_goc"], 0, ',', '.') ?> ₫</div>
                  <?php endif; ?>
                </div>
                <div class="item-links">
                  <a href="#" data-id="<?= $san_pham['id'] ?>"
                    class="btn-add-to-cart btn btn-sm px-2 mx-2 btns-bordered">
                    <i class="fas fa-shopping-cart"></i>
                  </a>
                  <a href="#" class="btn btn-sm px-2 mx-2 btns-bordered">
                    <i class="fas fa-heart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
        <div class="paginator">
          <a <?= $trang == 1 ? 'onclick="return false"' : '' ?> href="?trang=<?= $trang - 1 ?>" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
          <?php
          // Hiển thị các trang
          for ($i = 1; $i <= $total_trang; $i++):
            if ($i == 1 || $i == $total_trang || ($i >= $trang - 1 && $i <= $trang + 1)):
          ?>
              <a href="?trang=<?= $i ?>" class="<?= $i == $trang ? 'active' : '' ?>"><?= $i ?></a>
            <?php else: ?>
              <?php if ($i == 2 || $i == $total_trang - 1): ?>
                <span>...</span>
              <?php endif; ?>
          <?php endif;
          endfor; ?>
          <a <?= $trang == $total_trang ? 'onclick="return false"' : '' ?> href="?trang=<?= $trang + 1 ?>" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
          <!-- <span class="active">2</span> 
          <a href="#">3</a> <span>...</span>
          <a href="#">12</a>
          <a href="?trang=<?= $trang + 1 ?>" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a> -->
        </div>
      </div>
    </section>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('.btn-add-to-cart').off('click').on('click', function(e) {
      e.preventDefault(); // Ngăn không cho nhảy trang vì thẻ <a href="#">
      let productId = $(this).data('id');

      $.ajax({
        url: 'api/themspvaogiohang.php', // file PHP xử lý thêm vào giỏ hàng
        method: 'POST',
        dataType: 'json',
        data: {
          id: productId
        },
        success: function(response) {
          // Xử lý sau khi thêm thành công
          alert('Đã thêm sản phẩm vào giỏ hàng!');
          console.log(response.html);
          const htmlString = response.html;

          // Tạo DOM tạm
          const $temp = $('<div>').html(htmlString);

          // Lấy phần nội dung bên trong .items
          const newItemsContent = $temp.find('.cart-inner-inner').html();

          // Cập nhật vào DOM thật
          $('#gio_hang_component .cart-inner-inner').html(newItemsContent);

        },
        error: function() {
          alert('Đã xảy ra lỗi, vui lòng thử lại.');
        }
      });
    });
  });
</script>