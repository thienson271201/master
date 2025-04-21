    <section class="with-bg solid-section">
      <div
        class="fix-image-wrap"
        data-image-src="./assets/images/service/tools.jpg"
        data-parallax="scroll"
      ></div>
      <div class="theme-back"></div>
      <div class="container page-info">
        <div class="section-alt-head container-md">
          <h1
            class="section-title text-upper text-lg"
            data-inview-showup="showup-translate-right"
          >
            Sản phẩm
          </h1>
        </div>
      </div>
      <div class="section-footer">
        <div class="container" data-inview-showup="showup-translate-down">
          <ul class="page-path">
            <li><a href="index.php?page=trangChu">Trang chủ</a></li>
            <li class="path-separator">
              <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </li>
            <li>Sản phẩm</li>
          </ul>
        </div>
      </div>
    </section>
    <div class="clearfix page-sidebar-right container">
      <div class="page-content">
        <section class="content-section">
          <form>
            <div class="row">
              <div class="sm-col-6 md-col-4">
                <div class="field-group shop-line-field chosen-field">
                  <label>Sắp xếp</label>
                  <div class="field-wrap">
                    <select class="field-control" name="sortby">
                      <option name="sortby">Giá</option>
                      <option name="sortby" value="1">Tăng dần</option>
                      <option name="sortby" value="2">Giảm dần</option>
                    </select>
                    <span class="select-arrow"
                      ><i class="fas fa-chevron-down"></i
                    ></span>
                    <span class="field-back"></span>
                  </div>
                </div>
              </div>
              <div class="sm-col-6 md-col-4">
                <div class="field-group shop-line-field chosen-field">
                  <label>Thương hiệu</label>
                  <div class="field-wrap">
                    <select
                      class="field-control"
                      name="show"
                      selected="selected"
                    >
                      <option name="show" selected="selected">Chọn</option>
                      <option name="show" value="1" >
                        Asus
                      </option>
                      <option name="show" value="2">Dell</option>
                      <option name="show" value="3">Msi</option>
                    </select>
                    <span class="select-arrow"
                      ><i class="fas fa-chevron-down"></i
                    ></span>
                    <span class="field-back"></span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="row cols-md rows-md">
            <div class="md-col-6">
              <?php include "sanPham.php" ?>
            </div>
            <div class="md-col-6">
            <?php include "sanPham.php" ?>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img
                    src="assets/images/shop/laptop-ac-power-adapter.jpg"
                    alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >Laptop Power Adapter</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >accessories</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$45.05</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <div class="item-lables">
                  <a class="item-label-sale item-label" href="#">sale</a>
                  <a class="item-label-trending item-label" href="#"
                    >trending</a
                  >
                </div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/wifi-router.jpg" alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >Wi-Fi Router repieter</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >network</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$32.15</div>
                    <div class="item-old-price">$72.5</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <div class="item-lables">
                  <a class="item-label-sale item-label" href="#">sale</a>
                  <a class="item-label-top item-label" href="#">top seller</a>
                </div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/126gb-ssd.jpg" alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >128GB SSD M.2</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >storage</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$45.05</div>
                    <div class="item-old-price">$78.5</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/hdd.jpg" alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >External HDD Drive</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >storage</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$102.05</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/tablet.jpg" alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >10" Octa Core Tablet</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >tablet</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$145.99</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
            <div class="md-col-6">
              <div
                class="item shop-item shop-item-simple"
                data-inview-showup="showup-scale"
              >
                <div class="item-back"></div>
                <div class="item-lables">
                  <a class="item-label-new item-label" href="#">new</a>
                </div>
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/cable-organizer.jpg" alt=""
                /></a>
                <div class="item-content shift-md">
                  <div class="item-textes">
                    <div class="item-title text-upper">
                      <a href="shop-item.html" class="content-link"
                        >Cable Organizer</a
                      >
                    </div>
                    <div class="item-categories">
                      <a href="shop-category.html" class="content-link"
                        >accessories</a
                      >
                    </div>
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$15.25</div>
                  </div>
                </div>
                <div class="item-links">
                  <a
                    href="shop-item.html"
                    class="btn text-upper btn-md btns-bordered"
                    >view</a
                  >
                  <a href="#" class="btn text-upper btn-md">add to cart</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="text-center shift-lg"
            data-inview-showup="showup-translate-up"
          >
            <div class="paginator">
              <a href="#" class="previous"
                ><i class="fas fa-angle-left" aria-hidden="true"></i
              ></a>
              <span class="active">2</span> <a href="#">3</a> <span>...</span>
              <a href="#">12</a>
              <a href="#" class="next"
                ><i class="fas fa-angle-right" aria-hidden="true"></i
              ></a>
            </div>
          </div>
        </section>
      </div>
      <aside class="page-sidebar content-section">
        <section
          class="side-content-section"
          data-inview-showup="showup-translate-up"
        >
          <form>
            <div class="field-group">
              <label>Khoảng giá</label>
              <div
                class="slider-wrap"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <input
                  type="hidden"
                  name="priceFrom"
                  value="40"
                  data-slider-from
                />
                <input
                  type="hidden"
                  name="priceTo"
                  value="160"
                  data-slider-to
                />
                <div class="slider-container theme-slider">
                  <div class="ui-slider-handle">
                    <div class="slider-handle-block"></div>
                  </div>
                  <div class="ui-slider-handle">
                    <div class="slider-handle-block"></div>
                  </div>
                  <div class="slider-back"></div>
                </div>
                <div class="slider-text text-right">
                Khoảng giá: <span data-slider-from></span>đ - <span
                    data-slider-to
                  ></span>đ
                </div>
              </div>
            </div>       
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Series model</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >ASUS ExpertBook</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >Acer Aspire</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Dell Inspiron</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Series CPU</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >Apple M</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >Core 5</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Core 7</span
                    ></label
                  >
                </div>
              </div>
            </div>
          <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Thế hệ CPU</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                      AMD Ryzen AI 300</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >Intel Core thế hệ thứ 11</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Snapdragon X</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Nhu cầu</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                     Gaming</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >Học sinh - Sinh viên</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Văn phòng</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Chuẩn laptop</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                    AMD</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >AMD AI</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Intel AI</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Chip đồ họa rời</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                      GeForce GTX 1650</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >RTX A500</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >RTX A1000</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Kích thước màn hình</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                      Trên 17"</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >Từ 11" - 13.9"</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >Từ 14" - 14.9"</span
                    ></label
                  >
                </div>
              </div>
            </div>
            <div class="line-sides main-bg out-lg"
          data-inview-showup="showup-translate-up"
            ></div>
            <div class="field-group">
              <label>Dung lượng RAM</label>
              <div
                class="multi-choice"
                data-ui-range-slider
                data-min="10"
                data-max="1000"
              >
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Acer"
                    /><span class="choice-text text-upper"
                      >
                      32GB</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="Asus"
                    /><span class="choice-text text-upper"
                      >64GB</span
                    ></label
                  >
                </div>
                <div class="choice">
                  <label
                    ><input
                      type="checkbox"
                      name="manufacturer"
                      value="HP"
                    /><span class="choice-text text-upper"
                      >128GB</span
                    ></label
                  >
                </div>
              </div>
            </div>
          </form>
        </section>
      </aside>
    </div>
