<?php

if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'duong_dan' => $filterAll['slug'],
        'ten_thuong_hieu' => $filterAll['title'],
        // 'seo_title' => $filterAll['seo_title'],
        // 'seo_keywords' => $filterAll['seo_keywords'],
        // 'seo_desc' => $filterAll['seo_description']
    ];
    // $image = $func->upload('imageUpload', 'upload');
    // if ($image != 'noimage.jpg')
    // {
    //     $data_update['image'] = $image;
    // }
     $db->update('thuong_hieu', $data_update, "id='$id'");
    setFlashData('smg', 'Chỉnh sửa thành công');
}

$id = $func->filter()['id'];
$cap1 = $db->oneRaw("SELECT * FROM thuong_hieu WHERE id = '$id'");
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
                    <h3 class="mb-0">Chỉnh sửa Thương Hiệu</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chỉnh sửa Thương Hiệu
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
                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Hình ảnh danh mục
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*">
                                <img id="previewImage" src="../assets/images/upload/<?= $cap1['image'] ?>"
                                    onerror="this.src='../assets/images/noimage/noimage.png'" alt="Ảnh xem trước"
                                    style="width: 100%; height: 200px; margin-top: 20px; object-fit: contain">
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Nội dung Thương Hiệu <span class="text-danger text-sm">(vui lòng
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
                                    value="<?= $cap1['duong_dan'] ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="company_name" class="form-label fw-bold">Tên thương hiệu:</label>
                                <input id="title" type="text" name="title" class="form-control"
                                    value="<?= $cap1['ten_thuong_hieu'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Thiết lập SEO</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="seo_title" class="form-label fw-bold">SEO Title:</label>
                                <input type="text" name="seo_title" class="form-control"
                                    value="<?= $cap1['seo_title'] ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="seo_keywords" class="form-label fw-bold">SEO Keywords:</label>
                                <input type="text" name="seo_keywords" class="form-control"
                                    value="<?= $cap1['seo_keywords'] ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="seo_description" class="form-label fw-bold">SEO Description:</label>
                                <textarea type="text" name="seo_description" class="form-control"
                                    style="height: 120px;"><?= $cap1['seo_desc'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> -->
                <input type="hidden" name="id" value="<?= $cap1['id'] ?>">
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