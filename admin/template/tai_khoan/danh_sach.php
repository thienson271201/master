<?php
$list_order = $db->getRaw("SELECT * FROM admin ");
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');

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
                    <h3 class="mb-0">Quản lý admin</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý admin
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
                $func->getSmg($smg, $smg_type);
            }
            ?>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <a href="?com=tai_khoan&act=them" class="btn btn-success">Thêm mới tài khoản</a>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">STT</th>
                                <th >Username</th>
                                <th>Tên admin</th>
                                <th class="text-center">Số điện thoại</th>
                                <th>Email</th>


                                <th class="text-center" style="width: 10%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem = 1;
                            foreach ($list_order as $item):

                            ?>
                                <tr>
                                    <td class="text-center"><?= $dem++ ?></td>
                                    <td ><?= $item['username'] ?></td>
                                    <td>
                                        <a class="text-decoration-none fw-bold text-black"
                                            href="?com=tai_khoan&act=xem&id=<?= $item['id'] ?>">
                                            <?= $item['fullname'] ?>
                                        </a>
                                    </td>



                                    <td class="text-center"><?= $item['phone'] ?></td>
                                    <td><?= $item['email'] ?></td>

                                    <td class="text-center">
                                        <a href="?com=tai_khoan&act=xem&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="?com=tai_khoan&act=xoa&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">
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