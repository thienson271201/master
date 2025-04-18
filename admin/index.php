<?php
session_start();
define('TEMPLATE', 'template/');
define('LAYOUT', 'layout/');
define('SOURCE', 'source/');


// Config
require_once "../config.php";

// Session
require_once "../source/session.php";

// Database
require_once "../source/database.php";

// Function
require_once "../source/function.php";

// Admin
require_once "source/admin.php";


$db = new Database();
$ad = new admin();
$func = new func();

$com = '';
$act = '';

// Điều hướng
if (!empty($_GET['com']))
{
    if (is_string($_GET['com']))
    {
        $com = trim($_GET['com']);
    }
}
if (!empty($_GET['act']))
{
    if (is_string($_GET['act']))
    {
        $act = trim($_GET['act']);
    }
}
$path = 'template/' . $com . '/' . $act . '.php';
if ($ad->isLogin())
{
    if ($com == "user" && $act == "login")
    {
        $func->redirect('index.php');
    }
} else
{
    if ($com != "user" && $act != "login")
    {
        $func->redirect('index.php?com=user&act=login');
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administrator</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php require_once 'template/layout/css.php' ?>
    <style>
        .ck-editor__editable_inline {
            min-height: 500px;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="<?= $com != 'user' || $act != 'login' ? 'layout-fixed sidebar-expand-lg bg-body-tertiary' : '' ?>">

    <?php
    if ($com != 'user' || $act != 'login')
    {

        ?>
        <!--begin::App Wrapper-->
        <div class="app-wrapper">
            <!--begin::Header-->
            <?php require_once 'template/layout/header_tpl.php' ?>
            <!--end::Header-->
            <!--begin::Sidebar-->
            <?php require_once 'template/layout/sidebar_tpl.php' ?>
            <!--end::Sidebar-->

            <?php
            if ($com == '' && $act == '')
            {
                require_once 'template/index/index_tpl.php';
            } else
            {
                require_once $path;
            }
            ?>

            <!--begin::Footer-->
            <?php require_once 'template/layout/footer_tpl.php' ?>
            <!--end::Footer-->
        </div>
        <!--end::App Wrapper-->
        <?php
    } else
    {
        require_once $path;
    }
    ?>
    <!-- editor -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="assets/js/adminlte.js?v=<?= rand(10, 99) ?>"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script>
    <!-- sortablejs -->
    <script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header"
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script>
    <!-- slug tự động -->
    <script>
        $(document).ready(function () {
            function createSlug(text) {
                const from =
                    "ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđĐ";
                const to =
                    "AAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYaaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydD";

                const convertVietnamese = (str) => {
                    let newStr = "";
                    for (let i = 0; i < str.length; i++) {
                        const index = from.indexOf(str[i]);
                        if (index !== -1) {
                            newStr += to[index];
                        } else {
                            newStr += str[i];
                        }
                    }
                    return newStr;
                };

                let slug = convertVietnamese(text);
                slug = slug.toLowerCase();
                slug = slug
                    .replace(/[^a-z0-9\s-]/g,
                        "") // Loại bỏ ký tự không phải là chữ cái, số, khoảng trắng và dấu gạch ngang
                    .replace(/\s+/g, "-") // Thay thế khoảng trắng bằng dấu gạch ngang
                    .replace(/-+/g, "-") // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
                    .replace(/^-+|-+$/g, ""); // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi

                return slug;
            }

            const labelElement2 = $("#slugLabel");

            $("#title").on("input", function () {
                const title = $(this).val();
                const slug = createSlug(title);
                $("#slugInput").val(slug);
                labelElement2.text("Đường dẫn mẫu: <?= $http . $_SERVER['HTTP_HOST'] ?>/" + slug);
            });

            // Lấy thẻ input và thẻ label bằng ID
            const inputElement = $("#slugInput");
            const labelElement = $("#slugLabel");

            // Thêm sự kiện lắng nghe khi có sự thay đổi trong thẻ input
            inputElement.on("input", function () {
                // Lấy giá trị hiện tại của thẻ input
                const inputValue = inputElement.val();

                // Cập nhật nội dung của thẻ label
                labelElement.text("Đường dẫn mẫu: <?= $_SERVER['HTTP_HOST'] ?> /" + inputValue);
            });
        });
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

</body>
<!--end::Body-->

</html>