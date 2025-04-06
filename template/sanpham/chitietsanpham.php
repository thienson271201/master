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
            Chi Tiết Sản Phẩm
          </h1>
        </div>
      </div>
      <div class="section-footer">
        <div class="container" data-inview-showup="showup-translate-down">
          <ul class="page-path">
            <li><a href="index-2.html">Trang chủ</a></li>
            <li class="path-separator">
              <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </li>
            <li><a href="shop-category.html">Cửa hàng</a></li>
            <li class="path-separator">
              <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </li>
            <li>Laptop</li>
          </ul>
        </div>
      </div>
    </section>
    <div class="clearfix page-sidebar-right container">
      <div class="page-content">
        <section class="content-section">
          <div class="product">
            <div
              class="row offs-lg cols-md rows-lg offs-lg"
              data-inview-showup="showup-translate-up"
            >
              <div class="md-col-5">
                <div
                  class="responsive-1by1 offs-md"
                  data-preview-image="product-preview"
                ></div>
                <div
                  class="owl-carousel"
                  data-autoplay="false"
                  data-owl-loop="false"
                  data-owl-responsive="3;3;3;3"
                >
                  <div class="item">
                    <a
                      class="responsive-1by1"
                      target="_blank"
                      href="assets/images/shop/usb-hub.jpg"
                      data-preview-image-source="product-preview"
                      ><img src="upload/images/<?= $product['hinh_anh'] ?>" alt=""
                    /></a>
                  </div>
               
                </div>
              </div>
              <div class="md-col-7">
                <h4 class="text-upper offs-sm"><?= $product['ten_san_pham'] ?></h4>
                <div class="user-feedback">
                  <div class="user-rating">
                    <span class="rating-star"
                      ><i class="fas fa-star" aria-hidden="true"></i
                    ></span>
                    <span class="rating-star"
                      ><i class="fas fa-star" aria-hidden="true"></i
                    ></span>
                    <span class="rating-star"
                      ><i class="fas fa-star" aria-hidden="true"></i
                    ></span>
                    <span class="rating-star"
                      ><i class="fas fa-star" aria-hidden="true"></i
                    ></span>
                    <span class="rating-star fa-stack"
                      ><i class="far fa-star fa-stack-1x"></i
                      ><i class="fas fa-star-half fa-stack-1x"></i
                    ></span>
                  </div>
                  <div class="user-reviews">
                    <a
                      href="#"
                      class="content-link"
                      data-action-role="show-tab"
                      data-tab-name="reviews"
                      >2 Đánh giá</a
                    >&nbsp;&nbsp;|&nbsp;&nbsp;<a
                      href="#"
                      class="content-link"
                      data-action-role="show-tab"
                      data-tab-name="reviews"
                      >Viết đánh giá</a
                    >
                  </div>
                </div>
                <div class="product-price"><?= number_format($product["gia_sau_khuyen_mai"], 0, ',', '.') ?> ₫</div>
                <div class="product-available">
                  Tình trạng: <span class="text-colorful">Còn hàng</span>
                </div>
                <div class="product-short">
                <?= $product['mo_ta'] ?>
                </div>
                <form class="out-lg">
                  <div class="row cols-md rows-md">
                    <div class="sm-col-5">
                      <div class="field-group field-spin-sides">
                        <div class="field-wrap">
                          <input
                            class="field-control montserrat-bold alt-color text-sm text-center"
                            type="text"
                            name="quantity"
                            value="1"
                            min="1"
                            max="100"
                            data-action-role="field-wheel-spin field-arrows-spin"
                            autocomplete="off"
                          />
                          <span class="field-back"></span>
                          <span class="field-actions"
                            ><span
                              class="field-increment"
                              data-action-role="field-increment"
                              ><i
                                class="fas fa-plus"
                                aria-hidden="true"
                              ></i></span
                            ><span
                              class="field-decrement"
                              data-action-role="field-decrement"
                              ><i
                                class="fas fa-minus"
                                aria-hidden="true"
                              ></i></span
                          ></span>
                        </div>
                      </div>
                    </div>
                    <div class="sm-col-7">
                      <button class="btn text-upper col-12">
                        <i class="fas fa-plus" aria-hidden="true"></i
                        >&nbsp;&nbsp; Thêm vào giỏ hàng
                      </button>
                    </div>
                  </div>
                </form>
                <div class="description-lines">
                  <div class="description-line">
                    <span class="text-upper description-title"
                      >Mã sản phẩm:</span
                    >
                    <span class="description-value alt-color"><?= $product['ten_san_pham'] ?></span>
                  </div>
                  <div class="description-line">
                    <span class="text-upper description-title">Chia sẻ:</span>
                    <span class="description-value text-muted"
                      ><span class="cols-list cols-sm"
                        ><a href="#" class="list-item content-link"
                          ><i class="fab fa-facebook-f" aria-hidden="true"></i
                        ></a>
                        <a href="#" class="list-item content-link"
                          ><i class="fab fa-twitter" aria-hidden="true"></i
                        ></a>
                        <a href="#" class="list-item content-link"
                          ><i
                            class="fab fa-google-plus-g"
                            aria-hidden="true"
                          ></i></a></span
                    ></span>
                  </div>
                  <div class="description-line">
                    <span class="text-upper description-title">Danh mục:</span>
                    <span class="description-value colorful-text"
                      ><a href="shop-category.html">Laptop Gaming</a></span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tabs-lined"
              data-action-role="tabs"
              data-inview-showup="showup-translate-up"
            >
              <ul class="tabs-head">
                <li><a href="#" data-tab="description">Thông Số Sản Phẩm</a></li>
                <li><a href="#" data-tab="reviews">Đánh Giá</a></li>
                <!-- <li>
                  <a href="#" data-tab="additionalInformation"
                    >Additional Information</a
                  >
                </li> -->
              </ul>
              <div class="tabs-line">
                <div
                  class="tab-active-line"
                  data-action-role="active-tab-line"
                ></div>
              </div>
              <div class="tabs-content">
                <div class="tab-content" data-tab-content="description">
                  <div class="content-text">
                    
                    <h6><?= $product['thong_so_kich_thuoc'] ?></h6>
                  
                  </div>
                </div>
                <div class="tab-content" data-tab-content="reviews">
                  <div class="comments">
                    <div
                      class="comment"
                      data-inview-showup="showup-translate-up"
                    >
                      <div class="icon">
                        <i class="fas fa-user" aria-hidden="true"></i>
                      </div>
                      <div class="content">
                        <div class="title">
                          <b class="alt-color">Lie Stone</b> -
                          <i>Web Developer</i>
                        </div>
                        <div class="user-rating">
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="far fa-star"></i
                          ></span>
                        </div>
                        <div class="text-content">
                          <p>
                            Comment example here. Nulla risus lacus, vehicula id
                            mi vitae, auctor accumsan nulla. Sed a mi quam. In
                            euismod urna ac massa adipiscing interdum.
                          </p>
                        </div>
                        <div class="text-right text-xs">Jul 15, 2017</div>
                      </div>
                    </div>
                    <div
                      class="comment"
                      data-inview-showup="showup-translate-up"
                    >
                      <div class="icon">
                        <img
                          class="image"
                          src="assets/images/outsource/user-image.jpg"
                          alt=""
                        />
                      </div>
                      <div class="content">
                        <div class="title">
                          <b class="alt-color">John Bond</b>
                        </div>
                        <div class="user-rating">
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                          <span class="rating-star"
                            ><i class="fas fa-star"></i
                          ></span>
                        </div>
                        <div class="text-content">
                          <p>
                            Comment example here. Nulla risus lacus, vehicula id
                            mi vitae, auctor accumsan nulla. Sed a mi quam. In
                            euismod urna ac massa adipiscing interdum.
                          </p>
                        </div>
                        <div class="text-right text-xs">
                          Jul 17, 2017 - 15 hours ago
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="top-separator out-lg"
                    data-inview-showup="showup-translate-up"
                  ></div>
                  <form data-inview-showup="showup-translate-up">
                    <h4 class="text-upper">Add a review</h4>
                    <p>
                      Your email address will not be published. Required fields
                      are marked *
                    </p>
                    <div class="field-group field-line">
                      <label class="default-color">Your Rating</label>
                      <div class="rating-field">
                        <div class="pull-left">
                          <input
                            type="radio"
                            id="user-rating-5"
                            name="rating"
                            value="5"
                            checked="checked"
                          />
                          <label for="user-rating-5"
                            ><span class="rating-active-icon"
                              ><i class="fas fa-star"></i></span
                            ><span class="rating-icon"
                              ><i class="far fa-star"></i></span
                          ></label>
                          <input
                            type="radio"
                            id="user-rating-4"
                            name="rating"
                            value="4"
                          />
                          <label for="user-rating-4"
                            ><span class="rating-active-icon"
                              ><i class="fas fa-star"></i></span
                            ><span class="rating-icon"
                              ><i class="far fa-star"></i></span
                          ></label>
                          <input
                            type="radio"
                            id="user-rating-3"
                            name="rating"
                            value="3"
                          />
                          <label for="user-rating-3"
                            ><span class="rating-active-icon"
                              ><i class="fas fa-star"></i></span
                            ><span class="rating-icon"
                              ><i class="far fa-star"></i></span
                          ></label>
                          <input
                            type="radio"
                            id="user-rating-2"
                            name="rating"
                            value="2"
                          />
                          <label for="user-rating-2"
                            ><span class="rating-active-icon"
                              ><i class="fas fa-star"></i></span
                            ><span class="rating-icon"
                              ><i class="far fa-star"></i></span
                          ></label>
                          <input
                            type="radio"
                            id="user-rating-1"
                            name="rating"
                            value="1"
                          />
                          <label for="user-rating-1"
                            ><span class="rating-active-icon"
                              ><i class="fas fa-star"></i></span
                            ><span class="rating-icon"
                              ><i class="far fa-star"></i></span
                          ></label>
                        </div>
                      </div>
                    </div>
                    <div class="row cols-md rows-md offs-md">
                      <div class="sm-col-6">
                        <div class="field-group">
                          <div class="field-wrap">
                            <input
                              class="field-control"
                              name="name"
                              placeholder="Name"
                              required="required"
                            />
                            <span class="field-back"></span>
                          </div>
                        </div>
                      </div>
                      <div class="sm-col-6">
                        <div class="field-group">
                          <div class="field-wrap">
                            <input
                              class="field-control"
                              name="email"
                              type="email"
                              placeholder="Email"
                              required="required"
                            />
                            <span class="field-back"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field-group">
                      <div class="field-wrap">
                        <textarea
                          class="field-control"
                          name="message"
                          placeholder="Message"
                          required="required"
                        ></textarea>
                        <span class="field-back"></span>
                      </div>
                    </div>
                    <div class="btn-block">
                      <button class="btn text-upper" type="submit">
                        add review
                      </button>
                    </div>
                  </form>
                </div>
                <div
                  class="tab-content"
                  data-tab-content="additionalInformation"
                >
                  <!-- <div class="description-table">
                    <div class="table-line">
                      <div class="col-title">Brand Name</div>
                      <div class="col-value alt-color text-bold">
                        SHENGMEIYU
                      </div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Ports</div>
                      <div class="col-value text-colorful text-semibold">3</div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Model</div>
                      <div class="col-value">USB Hub</div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Funtion</div>
                      <div class="col-value">Reader</div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">System</div>
                      <div class="col-value solid-color">
                        Windows 7,Vista,XP,98,2000,ME and Mac OS 10.2 and Linux
                        systems
                      </div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Size</div>
                      <div class="col-value">77*45*25mm</div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Interface Type</div>
                      <div class="col-value">USB 2.0</div>
                    </div>
                    <div class="table-line">
                      <div class="col-title">Support Ports</div>
                      <div class="col-value text-colorful">
                        SD/MMC/M2/MS/MS Pro Duo
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div
            class="top-separator out-lg"
            data-inview-showup="showup-translate-up"
          ></div>
          <!-- <div data-inview-showup="showup-translate-up">
            <h4 class="text-upper">Related Products</h4>
            <div class="row cols-md rows-xl">
              <div class="lg-col-4 md-col-6">
                <div class="item shop-item shop-item-lined text-center">
                  <div class="item-image-wrap">
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
                  </div>
                  <div class="item-title text-upper">
                    <a href="shop-item.html" class="content-link"
                      >Wi-Fi Router repieter</a
                    >
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$32.15</div>
                    <div class="item-old-price">$72.5</div>
                  </div>
                  <div class="item-links">
                    <a
                      href="shop-item.html"
                      class="btn text-upper btn-sm btns-bordered"
                      >view</a
                    >
                    <a href="#" class="btn text-upper btn-sm">add to cart</a>
                  </div>
                </div>
              </div>
              <div class="lg-col-4 md-col-6">
                <div class="item shop-item shop-item-lined text-center">
                  <div class="item-image-wrap">
                    <div class="item-back"></div>
                    <a href="shop-item.html" class="item-image responsive-1by1"
                      ><img src="assets/images/shop/hdd.jpg" alt=""
                    /></a>
                  </div>
                  <div class="item-title text-upper">
                    <a href="shop-item.html" class="content-link"
                      >External HDD Drive</a
                    >
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$102.05</div>
                  </div>
                  <div class="item-links">
                    <a
                      href="shop-item.html"
                      class="btn text-upper btn-sm btns-bordered"
                      >view</a
                    >
                    <a href="#" class="btn text-upper btn-sm">add to cart</a>
                  </div>
                </div>
              </div>
              <div class="lg-col-4 md-col-6">
                <div class="item shop-item shop-item-lined text-center">
                  <div class="item-image-wrap">
                    <div class="item-back"></div>
                    <div class="item-lables">
                      <a class="item-label-new item-label" href="#">new</a>
                    </div>
                    <a href="shop-item.html" class="item-image responsive-1by1"
                      ><img src="assets/images/shop/cable-organizer.jpg" alt=""
                    /></a>
                  </div>
                  <div class="item-title text-upper">
                    <a href="shop-item.html" class="content-link"
                      >Cable Organizer</a
                    >
                  </div>
                  <div class="item-prices">
                    <div class="item-price">$15.25</div>
                  </div>
                  <div class="item-links">
                    <a
                      href="shop-item.html"
                      class="btn text-upper btn-sm btns-bordered"
                      >view</a
                    >
                    <a href="#" class="btn text-upper btn-sm">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center shift-xl"></div>
          </div> -->
        </section>
      </div>
    </div>
    <div
      class="block-cart collapse"
      data-block="cart"
      data-show-block-class="animation-scale-top-right"
      data-hide-block-class="animation-unscale-top-right"
    >
      <div class="cart-inner">
        <a href="#" class="close-link" data-close-block
          ><i class="fas fa-times" aria-hidden="true"></i
        ></a>
        <h4 class="text-upper text-center">Your cart</h4>
        <div class="items">
          <div
            class="items collapse"
            data-block="cart"
            data-show-block-class="animation-scale-top-right"
            data-hide-block-class="animation-unscale-top-right"
          >
            <div class="shop-side-item cart-item">
              <a href="#" class="remove"><i class="fas fa-times"></i></a>
              <div class="item-side-image">
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/usb-hub.jpg" alt=""
                /></a>
              </div>
              <div class="item-side">
                <div class="item-title">
                  <a class="item-label-sm item-label-sale item-label" href="#"
                    >sale</a
                  >
                  <a href="shop-item.html" class="content-link text-upper"
                    >USB 3.0 HUB</a
                  >
                </div>
                <div class="item-quantity">Quantity - 1</div>
                <div class="item-prices">
                  <div class="item-price">$67.05</div>
                  <div class="item-old-price">$102.5</div>
                </div>
              </div>
            </div>
            <div class="shop-side-item cart-item">
              <a href="#" class="remove"><i class="fas fa-times"></i></a>
              <div class="item-side-image">
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/cable-organizer.jpg" alt=""
                /></a>
              </div>
              <div class="item-side">
                <div class="item-title">
                  <a class="item-label-sm item-label-new item-label" href="#"
                    >new</a
                  >
                  <a href="shop-item.html" class="content-link text-upper"
                    >Cable Organizer</a
                  >
                </div>
                <div class="item-quantity">Quantity - 1</div>
                <div class="item-prices">
                  <div class="item-price">$15.25</div>
                </div>
              </div>
            </div>
            <div class="shop-side-item cart-item">
              <a href="#" class="remove"><i class="fas fa-times"></i></a>
              <div class="item-side-image">
                <a href="shop-item.html" class="item-image responsive-1by1"
                  ><img src="assets/images/shop/tablet.jpg" alt=""
                /></a>
              </div>
              <div class="item-side">
                <div class="item-title">
                  <a href="shop-item.html" class="content-link text-upper"
                    >10" Octa Core Tablet</a
                  >
                </div>
                <div class="item-quantity">Quantity - 1</div>
                <div class="item-prices">
                  <div class="item-price">$145.99</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="line-sides main-bg shift-lg"></div>
        <div class="row out-md">
          <div class="col-6 cart-price-title">Subtotal:</div>
          <div class="col-6 text-right cart-price">$105.20</div>
        </div>
        <div class="line-sides main-bg offs-lg"></div>
        <div class="clearfix">
          <a
            href="cart.html"
            class="btn text-upper btn-md btns-bordered pull-left"
            >view cart</a
          >
          <a href="checkout.html" class="btn text-upper btn-md pull-right"
            >checkout</a
          >
        </div>
      </div>
    </div>
    <a href="#" class="scroll-top disabled"
      ><i class="fas fa-angle-up" aria-hidden="true"></i
    ></a>
    <div
      class="singlepage-block collapse alt-bg"
      data-block="search"
      data-show-block-class="animation-scale-top-right"
      data-hide-block-class="animation-unscale-top-right"
    >
      <a href="#" class="close-link" data-close-block
        ><i class="fas fa-times" aria-hidden="true"></i
      ></a>
      <div class="pos-v-center col-12">
        <div class="container">
          <form action="#">
            <div class="row cols-md rows-md">
              <div class="lg-col-9 md-col-8 sm-col-12">
                <div class="field-group">
                  <div class="field-wrap">
                    <input
                      class="field-control"
                      name="search"
                      placeholder="Search Tags"
                      required="required"
                    />
                    <span class="field-back"></span>
                  </div>
                </div>
              </div>
              <div class="lg-col-3 md-col-4 sm-col-6">
                <button
                  class="btn btns-white-bordered text-upper"
                  type="submit"
                >
                  search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="loader-block">
      <div class="loader-back alt-bg"></div>
      <div class="loader-image">
        <img class="image" src="assets/images/parts/loader.gif" alt="" />
      </div>
    </div>