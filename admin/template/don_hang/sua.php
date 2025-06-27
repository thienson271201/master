<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'trang_thai' => $filterAll['status']
    ];
    $db->update('don_hang', $data_update, "id = '$id'");
    setFlashData('smg', 'Đã cập nhật đơn hàng');
}
$trangthaidonhang = [
    1 => [
        'id' => 1,
        'status' => 'Mới đặt'
    ],
    2 => [
        'id' => 2,
        'status' => 'Đã duyệt'
    ],
    3 => [
        'id' => 3,
        'status' => 'Đã vận chuyển'
    ],
    4 => [
        'id' => 4,
        'status' => 'Thành công'
    ],
    5 => [
        'id' => 5,
        'status' => 'Đã huỷ'
    ]
];
$id = $func->filter()['id'];
$order = $db->oneRaw("SELECT * FROM don_hang WHERE id = '$id'");
$code = $order['id'];
$order_detail = $db->getRaw("SELECT * FROM chi_tiet_don_hang WHERE don_hang_id = '$code'");
$smg = getFlashData('smg');
if ($order['khach_hang_id'] != "")
{
    $id = $order['khach_hang_id'];
    $thong_tin_khach_hang = $db->oneRaw("SELECT * FROM khach_hang WHERE id = $id");
    $diachi = $thong_tin_khach_hang['dia_chi'];
    $xaid = $thong_tin_khach_hang['xa_phuong'];
    $xa_phuong = $db->oneRaw("SELECT * FROM xaphuongthitran WHERE xaid = $xaid")['name'];
    $maqh = $thong_tin_khach_hang['quan_huyen'];
    $quan_huyen = $db->oneRaw("SELECT * FROM quanhuyen WHERE maqh = $maqh")['name'];
    $matp = $thong_tin_khach_hang['tinh_thanhpho'];
    $tinh = $db->oneRaw("SELECT * FROM tinhthanhpho WHERE matp = $matp")['name'];
    $thong_tin_khach_hang['dia_chi_day_du'] = $diachi . ', ' . $xa_phuong . ', ' . $quan_huyen . ', ' . $tinh;
}
?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Quản lý đơn hàng</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chi tiết đơn hàng
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <?php
            if (!empty($smg))
            {
                $func->getSmg($smg);
            }
            // echo '<pre>';
            // print_r($thong_tin_khach_hang);
            // echo '</pre>';
            ?>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thông tin đơn hàng</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <p>Mã đơn hàng: <span class="fw-bold text-danger"><?= $order['ma_don_hang'] ?></span></p>
                    <p>Họ tên: <span
                            class="fw-bold"><?= $order['khach_hang_id'] == '' ? $order['ten_khach_hang'] : $thong_tin_khach_hang['ten_khach_hang'] ?></span>
                    </p>
                    <p>Số điện thoại: <span
                            class="fw-bold"><?= $func->formatPhoneNumber($order['khach_hang_id'] == '' ? $order['so_dien_thoai'] : $thong_tin_khach_hang['so_dien_thoai']) ?></span>
                    </p>
                    <p>Địa chỉ: <span
                            class="fw-bold"><?= $order['khach_hang_id'] == '' ? $order['dia_chi'] : $thong_tin_khach_hang['dia_chi_day_du'] ?></span>
                    </p>
                    <p>Trạng thái: <span class="fw-bold"><?= $func->status_order($order['trang_thai']) ?></span></p>
                    <form class="row" method="post">
                        <div class="col-md-6">
                            <label for="status" class="fw-bold form-label">Cập nhật trạng thái: </label>
                            <select name="status" class="form-select mb-3">
                                <?php foreach ($trangthaidonhang as $trangthai): ?>
                                    <option value="<?= $trangthai['id'] ?>" <?= $order['trang_thai'] == $trangthai['id'] ? 'selected' : '' ?>><?= $trangthai['status'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Chi tiết đơn hàng</div>
                </div>
                <div class="card-body">
                    <?php
                    // echo '<pre>';
                    // print_r($order_detail);
                    // echo '</pre>';
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="10%">Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th class="text-end">Giá sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem = 0;

                            foreach ($order_detail as $item):
                                $item_id = $item['san_pham_id'];
                                $item_db = $db->oneRaw("SELECT * FROM san_pham WHERE id = '$item_id'");
                                ?>
                                <?php if ($item_db): ?>
                                    <tr>
                                        <td><?= ++$dem ?></td>
                                        <td>
                                            <img class="w-100" src="../upload/images/<?= $item_db['hinh_anh'] ?>"
                                                onerror="this.src='../assets/images/noimage/noimage.jpg'">
                                        </td>
                                        <td><?= $item_db['ten_san_pham'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['don_gia']) ?>đ</td>
                                        <td class="text-center"><?= $item['so_luong'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['so_luong'] * $item['don_gia']) ?>đ
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td><?= ++$dem ?></td>
                                        <td>
                                            <img class="w-100" src="" onerror="this.src='../assets/images/noimage/noimage.png'">
                                        </td>
                                        <td>Sản phẩm đã bị xoá</td>
                                        <td class="text-end"><?= $func->format_tiente($item['don_gia']) ?>đ</td>
                                        <td class="text-center"><?= $item['so_luong'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['so_luong'] * $item['don_gia']) ?>đ
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5" class="fw-bold">Tổng cộng:</td>
                                <td class="text-end fw-bold text-danger">
                                    <?= $func->format_tiente($order['tong_tien']) ?>đ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->