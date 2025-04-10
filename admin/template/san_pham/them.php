<?php

if ($func->isPOST())
{
    $filterAll = $func->filter();
    $data_insert = [
        'ma_san_pham'=>$filterAll['maSP'],
        'duong_dan' => $filterAll['slug'],
        'ten_san_pham' => $filterAll['title'],
        'gia_goc' => $filterAll['price'],
        'gia_sau_khuyen_mai' => $filterAll['discount'],
        'mo_ta' => $_POST['description'],
        'mo_ta_dai'=>$_POST['mo_ta_dai'],
        'thong_so_kich_thuoc' => $_POST['content'],
        'ngay_tao' => date('Y-m-d H:i:s')
    ];
    if (!empty($_POST['product_type_id']))
    {
        $data_insert['thuong_hieu_id'] = $_POST['product_type_id'];
    }
    if (!empty($_POST['danh_muc_san_pham_id']))
    {
        $data_insert['danh_muc_san_pham_id'] = $_POST['danh_muc_san_pham_id'];
    }
    $image = $func->upload('imageUpload', 'images');
    if ($image != 'noimage.jpg')
    {
        $data_insert['hinh_anh'] = $image;
    }
    // echo '<pre>';
    // print_r($data_insert);
    // echo '</pre>';
    // exit;
    
    $db->insert('san_pham', $data_insert);
    setFlashData('smg', 'Thêm mục thành công');
    $func->redirect('?com=san_pham&act=danh_sach');
}

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
                    <h3 class="mb-0">Thêm mới sản phẩm</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Thêm mới sản phẩm
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
            <form method="post" enctype="multipart/form-data">
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
                                        <label for="maSP" class="form-label fw-bold">Mã sản phẩm:</label>
                                        <input id="maSP" type="text" name="maSP" class="form-control"
                                           required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Đường dẫn
                                            mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?></label>
                                        <input id="slugInput" type="text" name="slug" class="form-control" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                                        <input id="title" type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="price" class="form-label fw-bold">Giá bán</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="discount" class="form-label fw-bold">Giá giảm</label>
                                        <input type="text" name="discount" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Thông số sản phẩm</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Giới thiệu sản phẩm:</label>
                                        <textarea name="description" style="min-height: 120px;"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Mô tả dài:</label>
                                        <textarea name="mo_ta_dai" id="editor" style="min-height: 120px;"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Thông số kích thước (trang chủ):</label>
                                        <textarea name="content" id="editor2" style="min-height: 120px;"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Danh mục sản phẩm
                                </div>
                            </div>
                            <div class="card-body">
                                <label for="cap1" class="form-label fw-bold">Thương Hiệu và Danh Mục</label>
                                <select name="product_type_id" class="form-select mb-3">
                                    <option value>Chọn thương hiệu</option>
                                    <?php
                                    $brand_list = $db->getRaw('SELECT * FROM thuong_hieu');
                                    foreach ($brand_list as $brand):
                                        ?>
                                        <option value="<?= $brand['id'] ?>"><?= $brand['ten_thuong_hieu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for=""class="form-label fw-bold"> Danh Mục</label>
                                <select name="danh_muc_san_pham_id" class="form-select">
                                    <option value>Chọn Danh Mục</option>
                                    <?php 
                                    $product_type_list=$db->getRaw("SELECT * FROM danh_muc_san_pham");
                                    foreach($product_type_list as $product_type): 
                                    ?>
                                    <option value="<?=$product_type['id'] ?>"><?=$product_type['ten_danh_muc'] ?></option>
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
                                <img id="previewImage" src="" onerror="this.src='assets/img/noimage.jpg'"
                                    alt="Ảnh xem trước"
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
                                        <input type="text" name="seo_title" class="form-control">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_keywords" class="form-label fw-bold">SEO Keywords:</label>
                                        <input type="text" name="seo_keywords" class="form-control">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="seo_description" class="form-label fw-bold">SEO Description:</label>
                                        <textarea type="text" name="seo_description" class="form-control"
                                            style="height: 120px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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