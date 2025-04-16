<?php
$product_list = $db->getRaw("SELECT 
    san_pham.*, 
    thuong_hieu.ten_thuong_hieu,
    danh_muc_san_pham.ten_danh_muc
FROM 
    san_pham
JOIN 
    thuong_hieu ON san_pham.thuong_hieu_id = thuong_hieu.id
JOIN 
    danh_muc_san_pham ON san_pham.danh_muc_san_pham_id = danh_muc_san_pham.id;

");
$smg = getFlashData('smg');

// echo '<pre>';
// print_r($product_list);
// echo '</pre>';
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
                    <h3 class="mb-0">Quản lý sản phẩm</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý sản phẩm
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
                    <a href="?com=san_pham&act=them" class="btn btn-success">Thêm mới</a>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">STT</th>
                                <th width="15%" class="text-center">Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th>Danh mục</th>
                                <th width="8%" class="text-center">Nổi bật</thư>
                                <th width="8%" class="text-center">Hiển thị</th>
                                <th width=" 10%" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem = 1;
                            foreach ($product_list as $item):
                                ?>
                                <tr>
                                    <td>
                                        <input data-id="1" class="form-control text-center stt-input"
                                            type="text" value="<?= $dem++?>">
                                    </td>
                                    <td class="text-center">
                                        <img  src="../upload/images/<?= $item['hinh_anh'] ?>" style="width: 100px; height: 80px; object-fit: cover;" 
                                        onerror="this.src='assets/img/noimage.jpg'" 
                                           >
                                    </td>
                                    <td>
                                        <a href="?com=san_pham&act=sua&id=<?= $item['id'] ?>"
                                            class="text-decoration-none text-black">
                                            <?= $item['ten_san_pham'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $item['ten_thuong_hieu'] ?>
                                    </td>
                                    <td>
                                        <?= $item['ten_danh_muc'] ?>
                                    </td>
                                    <td class="text-center">
                                        <input data-id="<?=$item['id']?>" type="checkbox" class="form-check-input highlight-checkbox" 
                                        <?= $item['noi_bat'] == 1?"checked":"" ?>
                                        >
                                    </td>
                                    <td class="text-center">
                                        <input data-id="<?=$item['id']?>" type="checkbox" class="form-check-input hienthi-checkbox" 
                                        <?= $item['trang_thai'] == 1?"checked":"" ?>
                                        >
                                    </td>
                                    <td class="text-center">
                                        <a href="?com=san_pham&act=sua&id=<?= $item['id'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?com=san_pham&act=xoa&id=<?= $item['id'] ?>"
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
                url: 'api/san_pham/noi_bat.php',
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
        $('.hienthi-checkbox').on('change', function () {
            var productId = $(this).data('id');
            var isChecked = $(this).is(':checked');

            $.ajax({
                url: 'api/san_pham/hien_thi.php',
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
                url: 'api/san_pham/sap_xep.php',
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