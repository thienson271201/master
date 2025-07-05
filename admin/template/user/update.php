<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    // echo "<pre>";
    // print_r ($filterAll);
    // echo "</pre>";
    $data_update = [
        'fullname' => $filterAll['fullname'],
        'email' => $filterAll['email']
    ];
    if (!empty($filterAll['password']))
    {
        if (strlen($filterAll['password']) < 6)
        {
            $error = 'Mật khẩu phải có từ 6 ký tự';
        } else
        {
            $data_update['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
            if ($db->update('admin', $data_update))
            {
                setFlashData('msg', 'Cập nhật thành công');
                setFlashData('msg_type', 'success');
            }
        }
    } else
    {
        if ($db->update('admin', $data_update, "id = " . (int)$filterAll['id']))
        {
            setFlashData('msg', 'Cập nhật thành công');
            setFlashData('msg_type', 'success');
        }
    }
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');

$admin_info = $db->oneRaw('SELECT * FROM admin where id = ' . getSession('admin_id'));
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
                    <h3 class="mb-0">Cài đặt tài khoản</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Cài đặt tài khoản
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
            if (!empty($msg))
            {
                $func->getSmg($msg, $msg_type);
            }
            ?>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Cập nhật thông tin</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <label for="fullname" class="fw-bold form-label">Họ và tên:</label>
                                <input type="text" name="fullname" id="fullname" value="<?= $admin_info['fullname'] ?>"
                                    class="form-control">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="email" class="fw-bold form-label">Email:</label>
                                <input type="email" value="<?= $admin_info['email'] ?>" id="email" name="email"
                                    class="form-control">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="password" class="fw-bold form-label">Mật khẩu:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i
                                            class="bi bi-key-fill"></i></span>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Mật khẩu mới *">
                                    <button type="button" class="input-group-text" id="toggle-password"><i
                                            class="bi bi-eye-fill"></i></button>
                                </div>
                                <span class="fst-italic text-danger">
                                    <?= !empty($error) ? $error : '' ?>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $admin_info['id'] ?>">
                </div>

                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Cập nhật
                    </button>
                </div>
                <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->


<script>
    $(document).ready(function () {
        $('#toggle-password').click(function () {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            var icon = $(this).find('i');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
            }
        });
    });
</script>