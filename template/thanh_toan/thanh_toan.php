<?php
// Xử lý khi form submit
if ($f->isPOST()) {
    $title = 'Kết quả thanh toán';
    $filterAll = $f->filter();
    $madonhang = $f->generateOrderCode();
    $data_insert = [
        'ma_don_hang' => $madonhang,
        'ten_khach_hang' => $filterAll['ten_khach_hang'],
        'email' => $filterAll['email'],
        'so_dien_thoai' => $filterAll['so_dien_thoai'],
        'dia_chi' => $filterAll['dia_chi'],
        'xa_phuong' => $filterAll['xa_phuong'],
        'quan_huyen' => $filterAll['quan_huyen'],
        'tinh_thanhpho' => $filterAll['tinh_thanhpho'],
        'ghi_chu' => $filterAll['ghi_chu'],
        'tong_tien' => $filterAll['tong_tien'],
        'hinh_thuc_thanh_toan' => $filterAll['phuong_thuc_thanh_toan'],
        'trang_thai' => 1,
        'ngay_tao' => date('Y-m-d H:i:s'),
    ];
    // Nếu khách có đăng nhập thì lưu id vào mảng
    if ($f->isLogin()) {
        $khach_hang_id = getSession('khach_hang_id');
        $chi_tieu = (int)$filterAll['chi_tieu'] + (int)$filterAll['tong_tien'];
        $data_update = ['chi_tieu' => $chi_tieu];
        $db->update('khach_hang', $data_update, "id=$khach_hang_id");
        $data_insert['khach_hang_id'] = $khach_hang_id;
    }
    // echo'<pre>';
    // print_r($data_insert);
    // echo'</pre>';
    // exit;
    // Nếu thanh toán vnpay thì để vnpay xử lý
    if ($filterAll['phuong_thuc_thanh_toan'] == 'vnpay') {
        setFlashData('data_vnpay', $data_insert);
        require_once 'vnpay/vnpay_create_payment.php';
        exit;
    }
    // Ngược lại không phải vnpay thì xử lý như bth
    require_once 'tao_don_hang.php';
    $f->redirect('./thanh-vien?page=don-hang');
}
// Xử lý khi vnpay trả kết quả về
if (isset($_GET['vnp_ResponseCode'])) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $data_insert = getFlashData('data_vnpay');
        require_once 'tao_don_hang.php';
        $f->redirect('./thanh-vien?page=don-hang');
    }
}
$title = "Thanh toán";
// Sử dụng id khách hàng truy vấn dữ liệu
if ($f->isLogin()) {
    $user_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id='" . getSession('khach_hang_id') . "'");
}
?>
<section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
                THANH TOÁN
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
                <li>Thanh toán</li>
            </ul>
        </div>
    </div>
</section>
<section class="content-section">
    <div class="container">
        <form id="form-thanh-toan" method="post">
            <div class="row cols-lg rows-lg">
                <div class="sm-col-6" data-inview-showup="showup-translate-right">
                    <h4 class="text-upper">Chi tiết thanh toán</h4>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="ten_khach_hang" placeholder="Họ và tên"
                                value="<?php echo isset($user_profile['ten_khach_hang']) ? $user_profile['ten_khach_hang'] : ''; ?>"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="email" type="email" placeholder="Email"
                                value="<?php echo isset($user_profile['email']) ? $user_profile['email'] : ''; ?>"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="so_dien_thoai" placeholder="Số điện thoại"
                                value="<?php echo isset($user_profile['so_dien_thoai']) ? $user_profile['so_dien_thoai'] : ''; ?>"
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
                                    <option <?php if (isset($user_profile['tinh_thanhpho']) && $user_profile['tinh_thanhpho'] == $tinh['matp'])
                                                echo 'selected'; ?>
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
                                        <option <?php if (isset($user_profile['quan_huyen']) && $user_profile['quan_huyen'] == $huyen['maqh'])
                                                    echo 'selected'; ?>
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
                                        <option <?php if (isset($user_profile['xa_phuong']) && $user_profile['xa_phuong'] == $xa['xaid'])
                                                    echo 'selected'; ?>
                                            value="<?= $xa['xaid'] ?>"><?= $xa['name'] ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="dia_chi" placeholder="Địa chỉ cụ thể"
                                value="<?php echo isset($user_profile['dia_chi']) ? $user_profile['dia_chi'] : ''; ?>"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group shift-md">
                        <div class="field-wrap">
                            <textarea class="field-control" name="ghi_chu"
                                placeholder="Ghi chú đơn hàng (nếu có)"></textarea>
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
                        <?php
                        $tong_tien = 0;
                        foreach ($_SESSION['gio_hang'] as $item):
                            $id = $item['id'];
                            $sanphamthanhtoan = $db->oneRaw("SELECT * FROM san_pham WHERE id = $id");
                            $tong_tien += $sanphamthanhtoan['gia_sau_khuyen_mai'] * $item['quantity'];
                        ?>

                            <div class="checkout-total-line">
                                <div class="title"><?= $sanphamthanhtoan['ten_san_pham'] ?> x <?= $item['quantity'] ?></div>
                                <div class="value">
                                    <?= $f->format_tiente($sanphamthanhtoan['gia_sau_khuyen_mai'] * $item['quantity']) ?>₫
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="muted-bg ins-sm offs-lg">
                        <div class="checkout-total-line text-sm text-semibold">
                            <div class="title text-upper">Tạm tính</div>
                            <div class="value"><?= $f->format_tiente($tong_tien) ?>₫</div>
                        </div>
                        <div class="checkout-total-line text-semibold">
                            <div class="title text-upper">Phí vận chuyển</div>
                            <div class="value">
                                <div class="value-line">0₫</div>
                                <!-- <div class="value-line">Miễn phí vận chuyển</div> -->
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
                            <div class="value text-colorful text-bold"><?= $f->format_tiente($tong_tien) ?>₫</div>
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
                                <label><input class="field-control" name="phuong_thuc_thanh_toan" value="vnpay"
                                        type="radio" />
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span>
                                        </span></span><span class="label">VNPay</span></label>
                            </div>
                        </div>
                        <div class="field-group alt-color text-semibold">
                            <div class="radio">
                                <label><input class="field-control" name="phuong_thuc_thanh_toan" value="transfer"
                                        type="radio" />
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span>
                                        </span></span><span class="label">Chuyển khoản</span></label>
                            </div>
                        </div>
                        <div class="field-group alt-color text-semibold">
                            <div class="radio">
                                <label><input class="field-control" name="phuong_thuc_thanh_toan" value="cod"
                                        type="radio" checked />
                                    <span class="check-icon"><span class="check-block"><span class="check-pin"></span>
                                        </span></span><span class="label">Tiền mặt (COD)</span></label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="tong_tien" value="<?= $tong_tien ?>">
                    <input type="hidden" name="chi_tieu" value="<?= $user_profile['chi_tieu'] ?>">
                    <button class="btn text-upper shift-md col-12 md-col-8 lg-col-6" type="submit">
                        Thanh toán
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Nơi hiển thị mã QR thanh toán chuyển khoản -->
<div id="qr-code"></div>

<!-- Xử lý ajax của xã phường -->
<script>
    $(document).ready(function() {
        $('#tinh_thanhpho').on('change', function() {
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
                success: function(data) {
                    $('#quan_huyen').html(data);
                },
                error: function() {
                    alert('Có lỗi khi tải danh sách quận/huyện');
                }
            });
        });
    });
    $('#quan_huyen').on('change', function() {
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
            success: function(data) {
                $('#xa_phuong').html(data);
            },
            error: function() {
                alert('Có lỗi khi tải danh sách xã/phường');
            }
        });
    });
</script>

<!-- Xử lý thanh toán chuyển khoản -->
<script>
    $(document).ready(function() {
        $('#form-thanh-toan').on('submit', function(e) {
            e.preventDefault();
            // Chặn submit
            const paymentMethod = $('input[name="phuong_thuc_thanh_toan"]:checked').val();
            const formData = $(this).serializeArray();
            const form = this;

            if (paymentMethod === 'transfer') {
                $.ajax({
                    url: 'api/tao_ma_don_hang.php',
                    type: 'POST',
                    data: formData,
                    success: function(orderCode) {
                        const tongTien = parseInt(formData.find(item => item.name === 'tong_tien')?.value || '0');

                        // Gọi API tạo mã QR
                        $.ajax({
                            url: 'template/thanh_toan/chuyen_khoan/qr_code.php',
                            type: 'POST',
                            data: {
                                ma_don_hang: orderCode,
                                tong_tien: tongTien,
                            },
                            success: function(qrHtml) {
                                $('#qr-code').html(qrHtml);

                                // Bắt đầu kiểm tra giao dịch
                                const intervalId = setInterval(function() {
                                    $.getJSON('<?= _API_THANH_TOAN ?>', function(response) {
                                        if (response.error || !response.data) return;

                                        const giaoDichHopLe = response.data.find(gd => {
                                            const moTa = (gd["Mô tả"] || '').toLowerCase();
                                            const giaTri = parseInt(gd["Giá trị"]);
                                            return giaTri === tongTien && moTa.includes(orderCode.toString().toLowerCase());
                                        });

                                        if (giaoDichHopLe) {
                                            clearInterval(intervalId);
                                            Swal.fire({
                                                title: "Thanh toán thành công!",
                                                icon: "success",
                                                draggable: true,
                                                timer: 950
                                            });
                                            form.submit();
                                        }
                                    });
                                }, 3000); // mỗi 3 giây
                            },
                            error: function() {
                                alert('Không thể tạo mã QR.');
                            }
                        });
                    },
                    error: function() {
                        alert('Không thể lấy mã đơn hàng.');
                    }
                });
            } else {
                form.submit();
            }
        });
        $(document).on('click', '.btn-close-qr', function() {
           $('.overlay').fadeOut();

        });

    });
</script>