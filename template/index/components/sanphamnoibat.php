<?php
$list_noi_bat= $db->getRaw('select * from san_pham where noi_bat = 1');

// echo '<pre>';
// print_r ($list_noi_bat);
// echo '</pre>';

?>


<!-- Phần sản phẩm nổi bật -->
<section class="content-section">
      <div class="container">
        <div class="section-head text-center container-md">
          <h2
            class="section-title text-upper text-lg"
            data-inview-showup="showup-translate-right"
          >
            Sản phẩm nổi bật
          </h2>
          <p data-inview-showup="showup-translate-left">
            Một số sản phẩm tốt nhất của chúng tôi
          </p>
        </div>
        <div class="pos-relative">
          <div
            class="owl-carousel owl-list-product-stick"
            data-autoplay="false"
            data-owl-section-arrows="true"
            data-owl-responsive="1;3;5"
          >
          <?php
            foreach ($list_noi_bat as $noi_bat): 
          ?>
            <div
              class="item shop-item shop-item-short item-dash-border"
              data-inview-showup="showup-scale"
            >
              <div class="item-back"></div>
              <a href="<?= $noi_bat['duong_dan']?>" class="item-image responsive-1by1">
                <img
                  src="upload/images/<?=$noi_bat['hinh_anh'] ?>"
                  alt=""
                />
              </a>
              <div class="item-content text-center">
                <div class="item-title text-upper mb-0">
                  <a href="<?= $noi_bat['duong_dan']?>" class="content-link"
                    ><?= $noi_bat['ten_san_pham']?></a
                  >
                </div>
                <div class="item-prices">
                  <div class="item-price"><?= number_format($noi_bat["gia_sau_khuyen_mai"], 0, ',', '.') ?> ₫</div>
                </div>
                <div class="item-links">
                  <a href="#" class="btn btn-sm px-2 mx-2 btns-bordered"
                    ><i class="fas fa-shopping-cart"></i
                  ></a>
                  <a href="#" class="btn btn-sm px-2 mx-2 btns-bordered"
                    ><i class="fas fa-heart"></i
                  ></a>
                </div>
              </div>
            </div>
           <?php endforeach; ?>
  
          </div>
          <div class="section-footer-nav-over text-center">
            <div
              class="owl-custom-navigation owl-nav-bordered"
              data-inview-showup="showup-translate-left"
            ></div>
          </div>
        </div>
      </div>
    
    
    </section>