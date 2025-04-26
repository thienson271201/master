<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $type = $filterAll['type'];
    //xử lý insert
    $dataInsert = [
        'image' => $func->upload('imageUpload', 'images'),
    ];
    $insertStatus = $db->update('images', $dataInsert, "type = '$type'");
    if ($insertStatus)
    {
        setFlashData('smg', 'Cập nhật thành công');
        setFlashData('smg_type', 'success');
    } else
    {
        setFlashData('smg', 'Lỗi cơ sở dữ liệu');
        setFlashData('smg_type', 'danger');
    }
}

$type = $filterAll = $func->filter()['type'];
$image = $db->oneRaw("SELECT * FROM images WHERE type = '$type'")['image'];
switch ($type)
{
    case 'logo':
        $vietsub = 'hình Logo';
        break;
    case 'favicon':
        $vietsub = 'hình Favicon';
        break;
    case 'banner':
        $vietsub = 'hình Banner';
        break;
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
                    <h3 class="mb-0">Chi tiết <?= $vietsub ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chi tiết <?= $vietsub ?>
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
                <div class="card card-primary card-outline">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Chi tiết <?= $vietsub ?></div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label fw-bold">Hình ảnh:</label>
                                <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                    accept="image/*" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <img onerror="this.src='../assets/images/noimage/noimage.jpg'" id="previewImage"
                                    src="../upload/images/<?= $image ?>" alt="Ảnh xem trước"
                                    style="height: 250px; object-fit: cover; max-width: 100%;">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <!--begin::Footer-->
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>
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
        // Lắng nghe sự kiện change trên input file
        $("#imageUpload").on("change", function (event) {
            // Kiểm tra xem có file được chọn hay không
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Cập nhật nguồn ảnh cho thẻ img
                    $("#previewImage").attr("src", e.target.result);
                    // Hiển thị thẻ img
                    // $('#previewImage').css('display', 'block');
                };
                // Đọc dữ liệu của file được chọn
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>