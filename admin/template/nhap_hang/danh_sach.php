<?php
$list_order = $db->getRaw("SELECT * FROM don_hang");
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
                    <h3 class="mb-0">Quản lý nhập hàng</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý nhập hàng
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
                    <div class="card-title">Danh Sách Hoá Đơn Nhập</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Mã hoá đơn</th>
                                <th class="text-center">Nhân viên nhập</th>
                                <th class="text-center">Ngày nhập</th>
                                <th class="text-center">Hình thức</th>
                                <th class="text-center">Tổng giá</th>
                                <th class="text-center">Tình trạng</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_order as $item):
                                if ($item['khach_hang_id'] != "")
                                {
                                    $id = $item['khach_hang_id'];
                                    $khach_hang_profile = $db->oneRaw("SELECT * FROM khach_hang WHERE id=$id");
                                    $ten_khach_hang = $khach_hang_profile['ten_khach_hang'];
                                } else
                                {
                                    $ten_khach_hang = $item['ten_khach_hang'];
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $item['ma_don_hang'] ?></td>
                                    <td>
                                        <a class="text-decoration-none fw-bold text-black"
                                            href="?com=don_hang&act=sua&id=<?= $item['id'] ?>">
                                            <?= $ten_khach_hang ?>
                                        </a>
                                    </td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($item['ngay_tao'])) ?></td>
                                    <td class="fw-bold text-center"><?= $func->format_tiente($item['tong_tien']) ?>đ</td>
                                    <td style="text-transform: uppercase;" class="text-center fw-bold text-end">
                                        <?= $item['hinh_thuc_thanh_toan'] ?>
                                    </td>
                                    <td class="fw-bold text-center"><?= $func->status_order($item['trang_thai']) ?></td>
                                    <td class="text-center">
                                        <a href="?com=don_hang&act=sua&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?com=don_hang&act=xoa&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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