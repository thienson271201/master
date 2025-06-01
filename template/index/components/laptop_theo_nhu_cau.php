<?php
$list_san_pham = $db->getRaw('select * from san_pham ');

// echo '<pre>';
// print_r ($list_san_pham);
// echo '</pre>';
?>
<section class="content-section">
    <div class="container">
        <div class="section-head text-left container-md">
      <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
        Laptop theo phong cách của bạn
      </h2>
      <!-- <p data-inview-showup="showup-translate-left">
        Một số sản phẩm tốt nhất của chúng tôi
      </p> -->
    </div>
        <ul class="tabs-danh-muc nav nav-tabs mb-4" id="category-tabs">
            <li class="nav-item"><a class="nav-link active" href="#" data-category="all">Tất cả</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-category="2">Laptop Văn Phòng</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-category="3">Laptop Gaming</a></li>
        </ul>

        <div class="row" id="product-list">
            <?php
            foreach ($list_san_pham as $san_pham):
            ?>
                <div class="col-3 product-box" data-category="<?= $san_pham['danh_muc_san_pham_id'] ?>">
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
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        function filterProducts(category) {
            $('.product-box').hide();

            if (category === 'all') {
                $('.product-box').slice(0, 4).show();
            } else {
                const matched = $('.product-box[data-category="' + category + '"]');
                matched.slice(0, 4).show();
            }
        }

        $('#category-tabs .nav-link').on('click', function(e) {
            e.preventDefault();
            $('#category-tabs .nav-link').removeClass('active');
            $(this).addClass('active');

            const category = $(this).data('category');
            filterProducts(category);
        });

        // Mặc định hiển thị 4 sản phẩm đầu tiên
        filterProducts('all');
    });
</script>

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