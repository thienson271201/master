<?php
$list_san_pham= $db->getRaw('select * from san_pham ');

// echo '<pre>';
// print_r ($list_san_pham);
// echo '</pre>';
?>
<!-- content-section -->
<section class="content-section">
      <div class="container">
        <div class="section-head text-center container-md">
          <h2
            class="section-title text-upper text-lg"
            data-inview-showup="showup-translate-right"
          >
            Laptop mới nhất
          </h2>
          <p data-inview-showup="showup-translate-left">
            Những mẫu laptop mới nhất với giá tốt nhất
          </p>
        </div>
        <div class="row rows-stuck-2 cols-stuck-2">
          <?php
            foreach ($list_san_pham as $san_pham): 
          ?>
          <div class="col-12 sm-col-3 lg-col-3">
            <div
              class="item shop-item shop-item-short item-dash-border"
              data-inview-showup="showup-scale"
            >
              <div class="item-back"></div>
              <div class="item-lables">
                <a class="item-label-sale item-label" href="#">Giảm giá</a>
              </div>
              <a href="<?= $san_pham['duong_dan']?>" class="item-image responsive-1by1">
                <img
                  src="upload/images/<?=$san_pham['hinh_anh'] ?>"
                />
              </a>
              <div class="item-content text-center">
                <div class="item-title text-upper mb-0">
                  <a href="<?= $san_pham['duong_dan']?>" class="content-link"
                    ><?= $san_pham['ten_san_pham']?></a
                  >
                </div>
                <div class="item-specs">
                <?= $san_pham['thong_so_kich_thuoc']?>
                </div>
                <div class="item-prices">
                  <div class="item-price"><?= number_format($san_pham["gia_sau_khuyen_mai"], 0, ',', '.') ?> VNĐ</div>
                  <div class="item-old-price"><?= number_format($san_pham["gia_goc"], 0, ',', '.') ?> VNĐ</div>
                </div>
                <div class="item-links">
                  <a href="#" class="btn btn-sm px-2 mx-2 btns-bordered">
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
      
       
    </section>

    <!-- content-section -->
    <div class="content-section">
      <div class="container">
        <div class="row cols-stuck-2 rows-lg">
          <!-- Bán chạy nhất -->
          <div class="col-12 sm-col-4">
            <section
              class="side-content-section"
              data-inview-showup="showup-translate-up"
            >
              <h5 class="text-md text-center shift-sm offs-md">
                Bán chạy nhất
              </h5>
              <div class="row cols-stuck-2 rows-stuck-2">
                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop Acer Aspire 5"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop Acer Aspire 5</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">12.500.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop Dell Inspiron 15"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop Dell Inspiron 15</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">15.200.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <!-- Nổi bật -->
          <div class="col-12 sm-col-4">
            <section
              class="side-content-section"
              data-inview-showup="showup-translate-up"
            >
              <h5 class="text-md text-center shift-sm offs-md">Nổi bật</h5>
              <div class="row cols-stuck-2 rows-stuck-2">
                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop HP Pavilion x360"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop HP Pavilion x360</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">17.800.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop Lenovo ThinkPad E14"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop Lenovo ThinkPad E14</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">14.900.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <!-- Đánh giá cao -->
          <div class="col-12 sm-col-4">
            <section
              class="side-content-section"
              data-inview-showup="showup-translate-up"
            >
              <h5 class="text-md text-center shift-sm offs-md">Đánh giá cao</h5>
              <div class="row cols-stuck-2 rows-stuck-2">
                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop ASUS ROG Zephyrus G14"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop ASUS ROG Zephyrus G14</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">32.500.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 item-dash-border">
                  <div class="item-back"></div>
                  <div class="shop-side-item">
                    <div class="item-side-image">
                      <a
                        href="shop-item.html"
                        class="item-image responsive-1by1"
                      >
                        <img
                          src="https://lh3.googleusercontent.com/FmwdqeH5jZljx0HLQ30G2FLA2emY-SxLgSmOPg-i8pRow7ahxrPe3cZtCiguFp0kWMzb7QEy1zdDV6GnNUWGg374NYhG-xID=w1000-rw"
                          alt="Laptop MacBook Air M2"
                        />
                      </a>
                    </div>
                    <div class="item-side">
                      <div class="item-title">
                        <a href="shop-item.html" class="content-link text-upper"
                          >Laptop MacBook Air M2</a
                        >
                      </div>
                      <div class="item-prices">
                        <div class="item-price">29.900.000 VNĐ</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>