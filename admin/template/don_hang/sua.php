<?php
if ($func->isPOST()) {
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'trang_thai' => $filterAll['status']
    ];
    $db->update('don_hang', $data_update, "id = '$id'");
    if ($filterAll['status'] == 5) {
        if (isset($filterAll['khach_hang_id'])) {
            $khach_hang_id = $filterAll['khach_hang_id'];
            $chi_tieu = $db->oneRaw("select * from khach_hang where id=$khach_hang_id")['chi_tieu'];
            // echo $chi_tieu;
            // echo '<br>';
            // echo $filterAll['tong_tien'];
            $khach_hang_update = [
                'chi_tieu' => $chi_tieu - $filterAll['tong_tien']
            ];
            // echo '<pre>';
            // print_r($khach_hang_update);
            // echo '</pre>';
            $db->update('khach_hang', $khach_hang_update, "id = '$khach_hang_id'");
        }
    }
    setFlashData('smg', 'Đã cập nhật đơn hàng');
}
$id = $func->filter()['id'];
$order = $db->oneRaw("SELECT * FROM don_hang WHERE id = '$id'");
$code = $order['id'];
$order_detail = $db->getRaw("SELECT * FROM chi_tiet_don_hang WHERE don_hang_id = '$code'");
$diachidaydu = $func->laydiachi($order['dia_chi'], $order['xa_phuong'], $order['quan_huyen'], $order['tinh_thanhpho'],);
$smg = getFlashData('smg');
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
            if (!empty($smg)) {
                $func->getSmg($smg);
            }
            ?>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thông tin đơn hàng</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <p>Mã đơn hàng: <span class="fw-bold text-danger"><?= $order['ma_don_hang'] ?></span></p>
                    <p>Họ tên: <span class="fw-bold"><?= $order['ten_khach_hang'] ?></span>
                    </p>
                    <p>Số điện thoại: <span
                            class="fw-bold"><?= $func->formatPhoneNumber($order['so_dien_thoai']) ?></span>
                    </p>
                    <p>Địa chỉ: <span class="fw-bold"><?= $diachidaydu ?></span>
                    </p>
                    <p>Trạng thái: <span class="fw-bold"><?= $func->status_order($order['trang_thai']) ?></span></p>
                    <form class="row" method="post">
                        <div class="col-md-6">
                            <label for="status" class="fw-bold form-label">Cập nhật trạng thái: </label>
                            <select name="status" class="form-select mb-3">
                                <?php
                                $temp = $order['trang_thai'] == 4 ? 4 : 5;
                                for ((int) $i = $order['trang_thai']; $i <= $temp; $i++): ?>
                                    <option value="<?= $i ?>" <?= $order['trang_thai'] == $i ? 'selected' : '' ?>>
                                        <?= $func->status_order($i) ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <?php
                            if ($order['khach_hang_id'] != ''):
                                
                            ?>
                               <input type="hidden" value="<?= $order['tong_tien'] ?>" name="tong_tien">
                                <input type="hidden" name="khach_hang_id" value="<?= $order['khach_hang_id'] ?>">
                            <?php endif;
                            ?>
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
                                        <td><?= $item_db['ten_san_pham'].($item['RAM']!=""?' | '.$item['RAM']:"").($item['SSD']!=""?' | '.$item['SSD']:"") ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['don_gia']) ?> đ</td>
                                        <td class="text-center"><?= $item['so_luong'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['so_luong'] * $item['don_gia']) ?> đ
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