<?php
$product_type_list = $db->getRaw("SELECT * FROM thuong_hieu ");
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
                    <h3 class="mb-0">Quản lý Thương Hiệu</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý Thương Hiệu
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
                    <a href="?com=product_type&act=add" class="btn btn-success">Thêm mục</a>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">STT</th>
                                <th width="10%">Hình ảnh</th>
                                <th>Tên Thương Hiệu</th>
                                <th width="10%" class="text-center">Danh mục</th>
                                <th width="10%" class="text-center">Nổi bật</th>
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
                                        <img style="height: 50px;" 
                                            src="../upload/images/<?= $item['hinh_anh'] ?>"   
                                            onerror="this.src='assets/img/noimage.jpg'" >

                                    </td>
                                    <td>
                                        <a href="?com=product_type&act=edit&id=<?= $item['id'] ?>"
                                            class="text-decoration-none text-black">
                                            <?= $item['ten_thuong_hieu'] ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <input data-id="<?= $item['id'] ?>" type="checkbox" name="noibat" id="noibat"
                                            class="form-check-input danhmuc-checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input data-id="<?= $item['id'] ?>" type="checkbox" name="noibat" id="noibat"
                                            class="form-check-input highlight-checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <a href="?com=product_type&act=edit&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?com=product_type&act=delete&id=<?= $item['id'] ?>"
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
                url: 'api/product_type/noibat.php',
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
                url: 'api/product_type/danhmuc.php',
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
                url: 'api/product_type/stt.php',
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