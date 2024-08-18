<?php

if ($func->isPOST())
{
    $filterAll = $func->filter();
    $data_insert = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title'],
        'price' => $filterAll['price'],
        'description' => $filterAll['description'],
        'content' => $_POST['content'],
        'seo_title' => $filterAll['seo_title'],
        'seo_keywords' => $filterAll['seo_keywords'],
        'seo_desc' => $filterAll['seo_description'],
        'create_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($_POST['product_type_id']))
    {
        $data_insert['product_type_id'] = $_POST['product_type_id'];
    }
    $image = $func->upload('imageUpload', 'upload');
    if ($image != 'noimage.jpg')
    {
        $data_insert['image'] = $image;
    }
    $db->insert('products', $data_insert);
    setFlashData('smg', 'Thêm mục thành công');
    $func->redirect('?com=product&act=list');
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
                                        <label id="slugLabel" for="company_name" class="form-label fw-bold">Đường dẫn
                                            mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?></label>
                                        <input id="slugInput" type="text" name="slug" class="form-control" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Tiêu đề:</label>
                                        <input id="title" type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Giá bán</label>
                                        <input type="text" name="price" class="form-control">
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
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="company_name" class="form-label fw-bold">Nội dung:</label>
                                        <textarea name="content" id="editor" style="min-height: 120px;"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Danh mục sản phẩm
                                </div>
                            </div>
                            <div class="card-body">
                                <label for="cap1" class="form-label fw-bold">Danh mục cấp 1:</label>
                                <select name="product_type_id" class="form-select">
                                    <option value>Chọn danh mục</option>
                                    <?php
                                    $product_type_list = $db->getRaw('SELECT * FROM product_types');
                                    foreach ($product_type_list as $produc_type):
                                        ?>
                                        <option value="<?= $produc_type['id'] ?>"><?= $produc_type['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Hình ảnh sản phẩm
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="" onerror="this.src='../assets/images/noimage/noimage.png'"
                                    alt="Ảnh xem trước"
                                    style="width: 100%; height: 200px; margin-top: 20px; object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-primary card-outline mb-4">
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
                        </div>
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