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
            <form method="post">

                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Thông tin chung</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="company_name" class="form-label fw-bold">Tiêu đề website:</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="<?= $company_name ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="address" class="form-label fw-bold">Địa chỉ:</label>
                                <input type="text" name="address" class="form-control" value="<?= $address ?>">
                            </div>
                            <div class="mb-3 col-12 col-lg-4">
                                <label for="email" class="form-label fw-bold">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?= $email ?>">
                            </div>
                            <div class="mb-3 col-6 col-lg-4">
                                <label for="phone_number" class="form-label fw-bold">Điện thoại:</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="<?= $phone_number ?>">
                            </div>
                            <div class="mb-3 col-6 col-lg-4">
                                <label for="zalo" class="form-label fw-bold">Zalo:</label>
                                <input type="text" name="zalo" class="form-control" value="<?= $zalo ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Footer-->
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->