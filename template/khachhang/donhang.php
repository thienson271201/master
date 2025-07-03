<section class="offs-xxl">
    <div class="container">
        <div class="user-orders">
            <?php if (empty($danh_sach_don_hang)): ?>
                <div class="alert alert-warning mt-3">Bạn chưa có đơn hàng nào</div>
            <?php else: ?>
                <?php foreach ($danh_sach_don_hang as $don_hang):
                    $chi_tiet_don_hang = $db->getRaw("SELECT * FROM chi_tiet_don_hang WHERE don_hang_id = '$don_hang[id]'");
                    ?>
                    <div class="user-order" data-inview-showup="showup-translate-up">
                        <div class="item-header text-upper">
                            <div class="user-order-show-more">
                                <div class="user-order-show-more-icon">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </div>
                            <div class="user-order-number"><?= $don_hang['ma_don_hang'] ?></div>
                            <div class="user-order-title">Laptop Gaming ASUS ROG</div>
                            <div class="user-order-date"><?= date("d-m-Y", strtotime($don_hang['ngay_tao'])) ?></div>
                            <div class="user-order-price">
                                <?= $f->format_tiente($don_hang['tong_tien']) ?>₫
                            </div>
                            <div class="pending user-order-status"><?= $f->status_order($don_hang['trang_thai']) ?></div>
                        </div>
                        <div class="item-content">
                            <div class="user-order-items">
                                <div class="user-order-items-head text-upper">
                                    <div class="user-order-items-head-title">Sản phẩm</div>
                                    <div class="user-order-items-head-price">Giá</div>
                                    <div class="user-order-items-head-quantity">Số lượng</div>
                                    <div class="user-order-items-head-total">Tổng tiền</div>
                                </div>
                                <?php foreach ($chi_tiet_don_hang as $ctdh):
                                    $san_pham = $db->oneRaw("SELECT * FROM san_pham WHERE id = " . $ctdh['san_pham_id']);
                                    ?>
                                    <div class="user-order-item">
                                        <div class="user-order-item-image">
                                            <div class="responsive-1by1">
                                                <img src="upload/images/<?= $san_pham['hinh_anh'] ?>" alt="" />
                                            </div>
                                        </div>
                                        <div class="user-order-item-title text-upper">
                                            <?= $san_pham['ten_san_pham'] ?>
                                        </div>
                                        <div class="user-order-item-price">
                                            <?= $f->format_tiente($ctdh['don_gia']) ?>₫
                                        </div>
                                        <div class="user-order-item-quantity"><?= $ctdh['so_luong'] ?></div>
                                        <div class="user-order-item-total">
                                            <?= $f->format_tiente($ctdh['tong_tien']) ?>₫
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="user-order-summary">
                                <div class="row">
                                    <div class="sm-col-8">
                                        <h5 class="offs-sm text-upper">Thông tin đơn hàng</h5>
                                        <div class="cols-md">
                                            <div class="rows-sm table">
                                                <div class="sm-col-6">
                                                    <div class="user-order-info-line">
                                                        <div class="user-order-info-title text-upper">
                                                            Người nhận:&nbsp;
                                                        </div>
                                                        <div class="user-order-info-value">
                                                            <?= $user_profile['ten_khach_hang'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="user-order-info-line">
                                                        <div class="user-order-info-title text-upper">
                                                            Địa chỉ:&nbsp;
                                                        </div>
                                                        <div class="user-order-info-value">
                                                            <?= (!empty($user_profile['tinh_thanhpho']) && !empty($user_profile['quan_huyen']) && !empty($user_profile['xa_phuong']) && !empty($user_profile['dia_chi'])) ? $user_profile['dia_chi'] . ', ' . $tenxa . ', ' . $tenhuyen . ', ' . $tentinh : 'Chưa cập nhật địa chỉ' ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sm-col-6">
                                                    <div class="user-order-info-line">
                                                        <div class="user-order-info-title text-upper">
                                                            Mã vận đơn:&nbsp;
                                                        </div>
                                                        <div class="user-order-info-value">

                                                        </div>
                                                    </div>
                                                    <div class="user-order-info-line">
                                                        <div class="user-order-info-title text-upper">
                                                            Đơn vị vận chuyển:&nbsp;
                                                        </div>
                                                        <div class="user-order-info-value">ProFix</div>
                                                    </div>
                                                    <div class="user-order-info-line">
                                                        <div class="user-order-info-title text-upper">
                                                            Ngày gửi hàng:&nbsp;
                                                        </div>
                                                        <div class="user-order-info-value"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm-col-4">
                                        <div class="user-order-totals">
                                            <div class="user-order-cost-line">
                                                <div class="user-order-cost-title text-upper">
                                                    Tạm tính
                                                </div>
                                                <div class="user-order-cost-value">
                                                    <?= $f->format_tiente($don_hang['tong_tien']) ?>₫
                                                </div>
                                            </div>
                                            <div class="user-order-cost-line">
                                                <div class="user-order-cost-title text-upper">
                                                    Phí giao hàng
                                                </div>
                                                <div class="user-order-cost-value">
                                                    0₫
                                                </div>
                                            </div>
                                            <div class="user-order-cost-line user-order-total">
                                                <div class="user-order-cost-title text-upper">
                                                    Tổng cộng
                                                </div>
                                                <div class="user-order-cost-value">
                                                    <?= $f->format_tiente($don_hang['tong_tien']) ?>₫
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif; ?>
        </div>
        <!-- <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
            <div class="paginator">
                <a href="#" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                <span class="active">2</span> <a href="#">3</a> <span>...</span>
                <a href="#">12</a>
                <a href="#" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div> -->
    </div>
</section>
<div class="block-cart collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
    data-hide-block-class="animation-unscale-top-right">
    <div class="cart-inner">
        <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
        <h4 class="text-upper text-center">Your cart</h4>
        <div class="items">
            <div class="items collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
                data-hide-block-class="animation-unscale-top-right">
                <div class="shop-side-item cart-item">
                    <a href="#" class="remove"><i class="fas fa-times"></i></a>
                    <div class="item-side-image">
                        <a href="shop-item.html" class="item-image responsive-1by1"><img
                                src="assets/images/shop/usb-hub.jpg" alt="" /></a>
                    </div>
                    <div class="item-side">
                        <div class="item-title">
                            <a class="item-label-sm item-label-sale item-label" href="#">sale</a>
                            <a href="shop-item.html" class="content-link text-upper">USB 3.0 HUB</a>
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
                        <a href="shop-item.html" class="item-image responsive-1by1"><img
                                src="assets/images/shop/cable-organizer.jpg" alt="" /></a>
                    </div>
                    <div class="item-side">
                        <div class="item-title">
                            <a class="item-label-sm item-label-new item-label" href="#">new</a>
                            <a href="shop-item.html" class="content-link text-upper">Cable Organizer</a>
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
                        <a href="shop-item.html" class="item-image responsive-1by1"><img
                                src="assets/images/shop/tablet.jpg" alt="" /></a>
                    </div>
                    <div class="item-side">
                        <div class="item-title">
                            <a href="shop-item.html" class="content-link text-upper">10" Octa Core Tablet</a>
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
            <a href="cart.html" class="btn text-upper btn-md btns-bordered pull-left">view cart</a>
            <a href="checkout.html" class="btn text-upper btn-md pull-right">checkout</a>
        </div>
    </div>
</div>
<a href="#" class="scroll-top disabled"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<div class="singlepage-block collapse alt-bg" data-block="search" data-show-block-class="animation-scale-top-right"
    data-hide-block-class="animation-unscale-top-right">
    <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
    <div class="pos-v-center col-12">
        <div class="container">
            <form action="#">
                <div class="row cols-md rows-md">
                    <div class="lg-col-9 md-col-8 sm-col-12">
                        <div class="field-group">
                            <div class="field-wrap">
                                <input class="field-control" name="search" placeholder="Search Tags"
                                    required="required" />
                                <span class="field-back"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-col-3 md-col-4 sm-col-6">
                        <button class="btn btns-white-bordered text-upper" type="submit">
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