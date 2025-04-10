<?php

if ($func->isPOST())
{
    $filterAll = $func->filter();
    $data_insert = [
        'duong_dan' => $filterAll['slug'],
        'ten_danh_muc' => $filterAll['title'],
    ];
    
    //  echo '<pre>';
    // print_r($data_insert);
    // echo '</pre>';
    // exit;
    $db->insert('danh_muc_san_pham', $data_insert);
    setFlashData('smg', 'Thêm mục thành công');
    $func->redirect('?com=danh_muc&act=danh_sach');
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
                    <h3 class="mb-0">Thêm mới Danh mục</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý Danh Mục
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
                
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Nội dung Danh mục <span class="text-danger text-sm">(vui
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