<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'status' => $filterAll['status']
    ];
    $db->update('orders', $data_update, "id = '$id'");
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
$order = $db->oneRaw("SELECT * FROM orders WHERE id = '$id'");
$code = $order['code'];
$order_detail = $db->getRaw("SELECT * FROM order_details WHERE order_id = '$code'");
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
            if (!empty($smg))
            {
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
                    <p>Mã đơn hàng: <span class="fw-bold"><?= $order['code'] ?></span></p>
                    <p>Họ tên: <span class="fw-bold"><?= $order['fullname'] ?></span></p>
                    <p>Số điện thoại: <span
                            class="fw-bold"><?= $func->formatPhoneNumber($order['phone_number']) ?></span></p>
                    <p>Địa chỉ: <span class="fw-bold"><?= $order['address'] ?></span></p>
                    <p>Trạng thái: <span class="fw-bold"><?= $func->status_order($order['status']) ?></span></p>
                    <form class="row" method="post">
                        <div class="col-md-6">
                            <label for="status" class="fw-bold form-label">Cập nhật trạng thái: </label>
                            <select name="status" class="form-select mb-3">
                                <?php foreach ($trangthaidonhang as $trangthai): ?>
                                    <option value="<?= $trangthai['id'] ?>" <?= $order['status'] == $trangthai['id'] ? 'selected' : '' ?>><?= $trangthai['status'] ?>
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
                                $item_id = $item['product_id'];
                                $item_db = $db->oneRaw("SELECT * FROM products WHERE id = '$item_id'");
                                ?>
                                <?php if ($item_db): ?>
                                    <tr>
                                        <td><?= ++$dem ?></td>
                                        <td>
                                            <img class="w-100" src="../assets/images/upload/<?= $item_db['image'] ?>"
                                                onerror="this.src='../assets/images/noimage/noimage.png'">
                                        </td>
                                        <td><?= $item_db['title'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['price']) ?>đ</td>
                                        <td class="text-center"><?= $item['quantity'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['quantity'] * $item['price']) ?>đ
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td><?= ++$dem ?></td>
                                        <td>
                                            <img class="w-100" src="" onerror="this.src='../assets/images/noimage/noimage.png'">
                                        </td>
                                        <td>Sản phẩm đã bị xoá</td>
                                        <td class="text-end"><?= $func->format_tiente($item['price']) ?>đ</td>
                                        <td class="text-center"><?= $item['quantity'] ?></td>
                                        <td class="text-end"><?= $func->format_tiente($item['quantity'] * $item['price']) ?>đ
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5" class="fw-bold">Tổng cộng:</td>
                                <td class="text-end fw-bold text-danger">
                                    <?= $func->format_tiente($order['total_price']) ?>đ
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