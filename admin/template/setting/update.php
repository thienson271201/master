<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();

    $company_name = $filterAll['company_name'];
    $email = $filterAll['email'];
    $phone_number = $filterAll['phone_number'];
    $zalo = $filterAll['zalo'];
    $link_fanpage = $filterAll['link_fanpage'];
    $link_messenger = $filterAll['link_messenger'];
    $address = $filterAll['address'];
    $link_google_map = $filterAll['link_google_map'];
    $iframe_google_map = $_POST['iframe_google_map'];
    $google_analytic = htmlspecialchars($_POST['google_analytic'], ENT_QUOTES, 'UTF-8');
    $google_webmaster_tool = htmlspecialchars($_POST['google_webmaster_tool'], ENT_QUOTES, 'UTF-8');
    $head_js = htmlspecialchars($_POST['head_js'], ENT_QUOTES, 'UTF-8');
    $body_js = htmlspecialchars($_POST['body_js'], ENT_QUOTES, 'UTF-8');


    $updateStatus = $db->query("
        UPDATE setting
        SET setting_value = CASE 
            WHEN setting_name = 'company_name' THEN '$company_name'
            WHEN setting_name = 'email' THEN '$email'
            WHEN setting_name = 'phone_number' THEN '$phone_number'
            WHEN setting_name = 'zalo' THEN '$zalo'
            WHEN setting_name = 'link_fanpage' THEN '$link_fanpage'
            WHEN setting_name = 'link_messenger' THEN '$link_messenger'
            WHEN setting_name = 'address' THEN '$address'
            WHEN setting_name = 'link_google_map' THEN '$link_google_map'
            WHEN setting_name = 'iframe_google_map' THEN '$iframe_google_map'
            WHEN setting_name = 'google_analytic' THEN '$google_analytic'
            WHEN setting_name = 'google_webmaster_tool' THEN '$google_webmaster_tool'
            WHEN setting_name = 'head_js' THEN '$head_js'
            WHEN setting_name = 'body_js' THEN '$body_js'
            ELSE setting_value
        END
        WHERE setting_name IN (
            'company_name', 'email', 'phone_number', 'zalo', 'link_fanpage', 
            'link_messenger', 'address', 'link_google_map', 'iframe_google_map', 
            'google_analytic', 'google_webmaster_tool', 'head_js', 'body_js'
        );
    ");

    $seo_title = $_POST['seo_title'];
    $seo_keywords = $_POST['seo_keywords'];
    $seo_description = $_POST['seo_description'];
    $seo_update = [
        'seo_title' => $seo_title,
        'seo_keywords' => $seo_keywords,
        'seo_description' => $seo_description
    ];
    $db->update('seo', $seo_update, "id = '1'");

    setFlashData('smg', 'Lưu thành công');
}

$setting = $db->getRaw('SELECT * FROM setting');

$company_name = $setting[0]['setting_value'];
$email = $setting[1]['setting_value'];
$phone_number = $setting[2]['setting_value'];
$zalo = $setting[3]['setting_value'];
$link_fanpage = $setting[4]['setting_value'];
$link_messenger = $setting[5]['setting_value'];
$address = $setting[6]['setting_value'];
$link_google_map = $setting[7]['setting_value'];
$iframe_google_map = $setting[8]['setting_value'];
$google_analytic = htmlspecialchars_decode($setting[9]['setting_value'], ENT_QUOTES);
$google_webmaster_tool = htmlspecialchars_decode($setting[10]['setting_value'], ENT_QUOTES);
$head_js = htmlspecialchars_decode($setting[11]['setting_value'], ENT_QUOTES);
$body_js = htmlspecialchars_decode($setting[12]['setting_value'], ENT_QUOTES);


$seo = $db->oneRaw("SELECT * FROM seo WHERE id = '1'");
$seo_title = $seo['seo_title'];
$seo_keywords = $seo['seo_keywords'];
$seo_description = $seo['seo_description'];

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
                    <h3 class="mb-0">Cấu hình website</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Cấu hình website
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
            <form method="post">

                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Thông tin chung</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="company_name" class="form-label fw-bold">Tên công ty:</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="<?= $company_name ?>">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="address" class="form-label fw-bold">Địa chỉ:</label>
                                <input type="text" name="address" class="form-control" value="<?= $address ?>">
                            </div>
                            <div class="mb-3 col-12 col-lg-4">
                                <label for="email" class="form-label fw-bold">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?= $email ?>">
                            </div>
                            <div class="mb-3 col-6 col-lg-4">
                                <label for="phone_number" class="form-label fw-bold">Điện thoại:</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="<?= $phone_number ?>">
                            </div>
                            <div class="mb-3 col-6 col-lg-4">
                                <label for="zalo" class="form-label fw-bold">Zalo:</label>
                                <input type="text" name="zalo" class="form-control" value="<?= $zalo ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Footer-->
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->