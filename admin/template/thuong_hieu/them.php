<?php

if ($func->isPOST())
{
    $filterAll = $func->filter();
    $data_insert = [
        'duong_dan' => $filterAll['slug'],
        'ten_thuong_hieu' => $filterAll['title'],
    ];
    $image = $func->upload('imageUpload', 'images');
    if ($image != 'noimage.jpg')
    {
        $data_insert['hinh_anh'] = $image;
    }
    //  echo '<pre>';
    // print_r($data_insert);
    // echo '</pre>';
    // exit;
    $db->insert('thuong_hieu', $data_insert);
    setFlashData('smg', 'Thêm mục thành công');
    $func->redirect('?com=brand&act=list');
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
                    <h3 class="mb-0">Thêm mới Thương Hiệu</h3>
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
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Hình ảnh thương hiệu
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="" onerror="this.src='assets/img/noimage.jpg'"
                                    alt="Ảnh xem trước"
                                    style="width: 100%; height: 200px; margin-top: 20px; object-fit: contain">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Nội dung Thương Hiệu <span class="text-danger text-sm">(vui
                                lòng
                                không nhập trùng tiêu đề)</span></div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label id="slugLabel" for="company_name" class="form-label fw-bold">Đường dẫn
                                    mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?></label>
                                <input id="slugInput" type="text" name="slug" class="form-control">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="company_name" class="form-label fw-bold">Tiêu đề:</label>
                                <input id="title" type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--begin::Footer-->
                <button type="submit" class="btn btn-primary">
                    Lưu
                </button>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->