<?php
$product_type_list = $db->getRaw("SELECT * FROM danh_muc_san_pham ");
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
                    <h3 class="mb-0">Quản Lý Danh Mục Sản Phẩm</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        Quản Lý Danh Mục Sản Phẩm
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
                    <a href="?com=danh_muc&act=them" class="btn btn-success">Thêm mục</a>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">STT</th>
                                <th>Tên Danh Mục</th>
                                <th width="10%" class="text-center">Hiển thị</th>
                                <th width="10%" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem=1;
                            foreach ($product_type_list as $item):
                                ?>
                                <tr>
                                    <td>
                                        <input data-id="1" class="form-control text-center stt-input"
                                            type="text" value="<?= $dem++?>">
                                    </td>
                                    
                                    <td>
                                        <a href="?com=danh_muc&act=sua&id=<?= $item['id'] ?>"
                                            class="text-decoration-none text-black">
                                            <?= $item['ten_danh_muc'] ?>
                                        </a>
                                    </td>
                                   
                                    <td class="text-center">
                                        <input data-id="<?= $item['id'] ?>" type="checkbox" name="noibat" id="noibat"
                                            class="form-check-input highlight-checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <a href="?com=danh_muc&act=sua&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?com=danh_muc&act=xoa&id=<?= $item['id'] ?>"
                                            class="btn btn-danger btn-sm">
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

<script>
    $(document).ready(function () {
        $('.highlight-checkbox').on('change', function () {
            var productId = $(this).data('id');
            var isChecked = $(this).is(':checked');

            $.ajax({
                url: 'api/danh_muc/noi_bat.php',
                type: 'POST',
                data: {
                    id: productId,
                    highlight: isChecked ? 1 : 0
                },
                success: function (response) {
                    // Xử lý phản hồi từ server nếu cần
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $('.danhmuc-checkbox').on('change', function () {
            var productId = $(this).data('id');
            var isChecked = $(this).is(':checked');

            $.ajax({
                url: 'api/danh_muc/danh_muc.php',
                type: 'POST',
                data: {
                    id: productId,
                    highlight: isChecked ? 1 : 0
                },
                success: function (response) {
                    // Xử lý phản hồi từ server nếu cần
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $('.stt-input').on('change', function () {
            var productId = $(this).data('id');
            var newStt = $(this).val();

            $.ajax({
                url: 'api/danh_muc/sap_xep.php',
                type: 'POST',
                data: {
                    id: productId,
                    stt: newStt
                },
                success: function (response) {
                    // Xử lý phản hồi từ server nếu cần
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>