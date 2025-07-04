<?php
if ($func->isPOST()) {
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'trang_thai' => $filterAll['status']
    ];
    $db->update('don_hang', $data_update, "id = '$id'");
    setFlashData('smg', 'Đã cập nhật đơn hàng');
}
$id = $func->filter()['id'];
$order = $db->getRaw("SELECT * FROM don_hang WHERE khach_hang_id = '$id'");

$khach_hang = $db->oneRaw("select * from khach_hang where id=$id");
$diachidaydu = $func->laydiachi($khach_hang['dia_chi'], $khach_hang['xa_phuong'], $khach_hang['quan_huyen'], $khach_hang['tinh_thanhpho'],);
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
                    <h3 class="mb-0">Chi tiết khách hàng</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chi tiết khách hàng
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
                    <div class="card-title">Thông tin khách hàng</div>
                </div>
                <!--end::Header-->
                <div class="card-body">

                    <p>Họ tên: <span class="fw-bold"><?= $khach_hang['ten_khach_hang'] ?></span>
                    </p>
                    <p>Email: <span class="fw-bold"><?= $khach_hang['email'] ?></span>
                    </p>
                    <p>Số điện thoại: <span
                            class="fw-bold"><?= $func->formatPhoneNumber($khach_hang['so_dien_thoai']) ?></span>
                    </p>
                    <p>Địa chỉ: <span class="fw-bold"><?= $diachidaydu ?></span>
                    </p>
                    <p>Chi tiêu: <span
                            class="fw-bold"><?= $func->format_tiente($khach_hang['chi_tieu']) ?> đ</span>
                    </p>

                </div>
            </div>
            <?php
            foreach ($order as $order_item):
            ?>
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title"><?=$order_item['ngay_tao'] ?></div>
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
                                $order_detail = $db->getRaw("select * from chi_tiet_don_hang where don_hang_id=" . $order_item['id']);
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
                                        <?= $func->format_tiente($order_item['tong_tien']) ?>đ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->