<?php
if ($f->isPOST()) {
    $filterAll = $f->filter();
    echo '<pre>';
    print_r($filterAll);
    echo '</pre>';
}
?>
<section class="with-bg solid-section">
    <div
        class="fix-image-wrap"
        data-image-src="./assets/images/service/tools.jpg"
        data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1
                class="section-title text-upper text-lg"
                data-inview-showup="showup-translate-right">
                Checkout
            </h1>
        </div>
    </div>
    <div class="section-footer">
        <div class="container" data-inview-showup="showup-translate-down">
            <ul class="page-path">
                <li><a href="index-2.html">Home</a></li>
                <li class="path-separator">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </li>
                <li><a href="shop-category.html">Shop</a></li>
                <li class="path-separator">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</section>
<section class="content-section">
    <div class="container">
        <form method="post">
            <div class="row cols-lg rows-lg">
                <div class="sm-col-6" data-inview-showup="showup-translate-right">
                    <h4 class="text-upper">Chi tiết thanh toán</h4>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input
                                class="field-control"
                                name="ten_khach_hang"
                                placeholder="Họ và tên"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input
                                class="field-control"
                                name="email"
                                type="email"
                                placeholder="Email"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input
                                class="field-control"
                                name="so_dien_thoai"
                                placeholder="Số điện thoại"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="tinh_thanhpho" id="tinh_thanhpho" required>
                                <option value="">Chọn Tỉnh / Thành phố</option>
                                <?php
                                $dstinh = $db->getRaw('SELECT * FROM tinhthanhpho');
                                foreach ($dstinh as $tinh):
                                    ?>
                                    <option 
                                        value="<?= $tinh['matp'] ?>"><?= $tinh['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="quan_huyen" id="quan_huyen" required>
                                <option value="">Chọn Quận / Huyện</option>
                                <?php
                                if (!empty($user_profile['tinh_thanhpho'])):
                                    $tinh = $user_profile['tinh_thanhpho'];
                                    $dshuyen = $db->getRaw("SELECT * FROM quanhuyen where matp=$tinh");
                                    foreach ($dshuyen as $huyen):
                                        ?>
                                        <option 
                                            value="<?= $huyen['maqh'] ?>"><?= $huyen['name'] ?></option>
                                    <?php endforeach;
                                endif; ?>
                                <!-- thêm option khác tùy bạn -->
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <select class="field-control" name="xa_phuong" id="xa_phuong" required>
                                <option value="">Chọn Phường / Xã</option>
                                <?php
                                if (!empty($user_profile['quan_huyen'])):
                                    $huyen = $user_profile['quan_huyen'];
                                    $dsxa = $db->getRaw("SELECT * FROM xaphuongthitran where maqh=$huyen");
                                    foreach ($dsxa as $xa):
                                        ?>
                                        <option 
                                            value="<?= $xa['xaid'] ?>"><?= $xa['name'] ?></option>
                                    <?php endforeach;
                                endif; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input
                                class="field-control"
                                name="dia_chi"
                                placeholder="Địa chỉ cụ thể"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group shift-md">
                        <div class="field-wrap">
                            <textarea
                                class="field-control"
                                name="ghi_chu"
                                placeholder="Ghi chú đơn hàng (nếu có)"
                            ></textarea>
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
                <div class="sm-col-6" data-inview-showup="showup-translate-left">
                    <h4 class="text-upper">Đơn hàng của bạn</h4>
                    <div class="checkout-total-line main-bg">
                        <div class="title text-upper">Sản phẩm</div>
                        <div class="value text-upper">Tổng tiền</div>
                    </div>
                    <div class="ins-sm">
                        <?php foreach($_SESSION['gio_hang'] as $item): 
                        $id = $item['id'];
                            $sanphamthanhtoan = $db->oneRaw("SELECT * FROM san_pham WHERE id = $id");
                        ?>

                        <div class="checkout-total-line">
                            <div class="title"><?= $sanphamthanhtoan['ten_san_pham'] ?> x <?= $item['quantity'] ?></div>
                            <div class="value"><?= $f->format_tiente($sanphamthanhtoan['gia_sau_khuyen_mai']* $item['quantity']) ?>₫</div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="muted-bg ins-sm offs-lg">
                        <div class="checkout-total-line text-sm text-semibold">
                            <div class="title text-upper">Tạm tính</div>
                            <div class="value">35.990.000₫</div>
                        </div>
                        <div class="checkout-total-line text-semibold">
                            <div class="title text-upper">Phí vận chuyển</div>
                            <div class="value">
                                <div class="value-line">Phí cố định: 0₫</div>
                                <div class="value-line">Miễn phí vận chuyển</div>
                            </div>
                        </div>
                        <div class="checkout-total-line text-semibold">
                            <div class="title text-upper">Giảm giá</div>
                            <div class="value">
                                <div class="value-line">0₫</div>
                            </div>
                        </div>
                        <div class="checkout-total-separator"></div>
                        <div class="checkout-total-line text-sm">
                            <div class="title text-upper text-semibold">Tổng cộng</div>
                            <div class="value text-colorful text-bold">35.990.000₫</div>
                        </div>
                    </div>
                    <h4 class="text-upper">Chi tiết thanh toán</h4>
                    <p>
                        Vui lòng sử dụng Mã đơn hàng của bạn làm nội dung chuyển khoản.
                        Đơn hàng của bạn sẽ không được giao cho đến khi chúng tôi nhận
                        được tiền.
                    </p>
                    <div class="field-groups offs-lg">
                        <div class="field-group alt-color text-semibold">
                            <div class="radio">
                                <label><input
                                        class="field-control"
                                        name="phuong_thuc_thanh_toan"
                                        value="check"
                                        type="radio" />
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span> </span></span><span class="label">VNPay</span></label>
                            </div>
                        </div>
                        <div class="field-group alt-color text-semibold">
                            <div class="radio">
                                <label><input
                                        class="field-control"
                                        name="phuong_thuc_thanh_toan"
                                        value="cash"
                                        type="radio" />
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span> </span></span><span class="label">Chuyển khoản</span></label>
                            </div>
                        </div>
                        <div class="field-group alt-color text-semibold">
                            <div class="radio">
                                <label><input
                                        class="field-control"
                                        name="phuong_thuc_thanh_toan"
                                        value="cod"
                                        type="radio" 
                                        checked/>
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span> </span></span><span class="label">Tiền mặt (COD)</span></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn text-upper shift-md col-12 md-col-8 lg-col-6" type="submit">
                        Thanh toán
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#tinh_thanhpho').on('change', function () {
            var matp = $(this).val();
            // Reset quận và xã trước khi load lại
            $('#quan_huyen').html('<option value="">Chọn Quận / Huyện</option>');
            $('#xa_phuong').html('<option value="">Chọn Phường / Xã</option>');
            $.ajax({
                url: 'api/loaddiachi.php',
                method: 'POST',
                data: {
                    key: 'quanhuyen',
                    matp: matp
                },
                success: function (data) {
                    $('#quan_huyen').html(data);
                },
                error: function () {
                    alert('Có lỗi khi tải danh sách quận/huyện');
                }
            });
        });
    });
    $('#quan_huyen').on('change', function () {
        var maqh = $(this).val();
        // Reset xã trước khi load lại
        $('#xa_phuong').html('<option value="">Chọn Phường / Xã</option>');
        $.ajax({
            url: 'api/loaddiachi.php',
            method: 'POST',
            data: {
                key: 'xaphuong',
                maqh: maqh
            },
            success: function (data) {
                $('#xa_phuong').html(data);
            },
            error: function () {
                alert('Có lỗi khi tải danh sách xã/phường');
            }
        });
    });
</script>