<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'duong_dan' => $filterAll['slug'],
        'ten_san_pham' => $filterAll['title'],
        'gia_goc' => $filterAll['original_price'],
        'gia_sau_khuyen_mai' => $filterAll['price'],
        'mo_ta' => $filterAll['description'],
        'thong_so_kich_thuoc' => $_POST['content'],
       
    ];
    if (!empty($_POST['product_type_id']))
    {
        $data_update['thuong_hieu_id'] = $_POST['product_type_id'];
    }
    $image = $func->upload('imageUpload', 'images');
    if ($image != 'noimage.jpg')
    {
        $data_update['hinh_anh'] = $image;
    }
    $db->update('san_pham', $data_update, "id='$id'");
    setFlashData('smg', 'Chỉnh sửa thành công');
    // $func->redirect("?com=product&act=edit&id=$id");
}
$id = $func->filter()['id'];
$product = $db->oneRaw("SELECT * FROM san_pham WHERE id = '$id'");

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
                    <h3 class="mb-0">Chỉnh sửa sản phẩm</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chỉnh sửa sản phẩm
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
            <form id="edit-product" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Tiêu đề sản phẩm <span class="text-danger text-sm">(vui lòng
                                        không nhập trùng tiêu đề)</span></div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Đường dẫn
                                            mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?></label>
                                        <input id="slugInput" type="text" name="slug" class="form-control"
                                            value="<?= $product['duong_dan'] ?>" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Tiêu đề:</label>
                                        <input id="title" type="text" name="title" class="form-control"
                                            value="<?= $product['ten_san_pham'] ?>" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Giá bán</label>
                                        <input id="original_price" type="text" name="original_price"
                                            class="form-control tien" value="<?= $product['gia_goc'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="discount" class="form-label fw-bold">Giá giảm</label>
                                        <input id="discounted_price" type="text" name="price" class="form-control"
                                            value="<?= $product['gia_sau_khuyen_mai'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Nội dung sản phẩm</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Mô
                                            tả:</label>
                                        <textarea name="description" style="min-height: 120px;"
                                            class="form-control"><?= $product['mo_ta'] ?></textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Nội dung:</label>
                                        <textarea name="content" id="editor" style="min-height: 120px;"
                                            class="form-control"><?= $product['thong_so_kich_thuoc'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Thương Hiệu
                                </div>
                            </div>
                            <div class="card-body">
                                <label for="cap1" class="form-label fw-bold">Thương Hiệu:</label>
                                <select name="product_type_id" class="form-select">
                                    <option value>Chọn danh mục</option>
                                    <?php
                                    $product_type_list = $db->getRaw('SELECT * FROM thuong_hieu');
                                    foreach ($product_type_list as $produc_type):
                                        ?>
                                        <option value="<?= $produc_type['id'] ?>"
                                            <?= $product['thuong_hieu_id'] == $produc_type['id'] ? 'selected' : '' ?>>
                                            <?= $produc_type['ten_thuong_hieu'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Hình ảnh sản phẩm
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="../upload/images/<?= $product['hinh_anh'] ?>"
                                    onerror="this.src='assets/img/noimage.jpg'" alt="Ảnh xem trước"
                                    style="width: 100%; height: 200px; margin-top: 20px; object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Thiết lập SEO</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label for="seo_title" class="form-label fw-bold">SEO Title:</label>
                                        <input type="text" name="seo_title" class="form-control"
                                            value="<?= $product['seo_title'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_keywords" class="form-label fw-bold">SEO Keywords:</label>
                                        <input type="text" name="seo_keywords" class="form-control"
                                            value="<?= $product['seo_keywords'] ?>">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_description" class="form-label fw-bold">SEO Description:</label>
                                        <textarea type="text" name="seo_description" class="form-control"
                                            style="height: 120px;"><?= $product['seo_desc'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <button type="submit" class="btn btn-primary">
                            Lưu
                        </button>
                    </div>
                    <!--begin::Footer-->
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<script>
    $(document).ready(function () {
        function formatCurrency(input) {
            let value = $(input).val();

            // Loại bỏ các ký tự không phải số
            value = value.replace(/[^0-9]/g, '');

            if (value) {
                // Định dạng tiền tệ
                const formattedValue = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0
                }).format(value);

                // Cập nhật giá trị đã định dạng vào thẻ input
                $(input).val(formattedValue);
            }
        }

        // Định dạng các giá trị hiện có khi load trang
        $('#original_price, #discounted_price').each(function () {
            formatCurrency(this);
        });

        // Lắng nghe sự kiện input cho cả hai thẻ input
        $('#original_price, #discounted_price').on('input', function () {
            formatCurrency(this);
        });

        // Trước khi submit form, loại bỏ định dạng tiền tệ
        $('#edit-product').on('submit', function () {
            $('#original_price, #discounted_price').each(function () {
                let value = $(this).val();

                // Loại bỏ tất cả ký tự không phải số
                value = value.replace(/[^0-9]/g, '');

                // Cập nhật giá trị gốc vào thẻ input
                $(this).val(value);
            });
        });
    });
</script>