<?php
$setting_info = $db->getRaw('SELECT * FROM setting');

// Lấy đường dẫn URL hiện tại và loại bỏ phần query string
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Xác định base path dựa trên tên project
$base_path = '/' . URL;

// Loại bỏ base path khỏi URL
if (strpos($url, $base_path) === 0)
{
    $url = substr($url, strlen($base_path));
}

// Loại bỏ dấu gạch chéo cuối cùng nếu có
$url = rtrim($url, '/');
// Loại bỏ dấu gạch chéo đầu tiên nếu có
$url = ltrim($url, '/');

ob_start();

$get_status = false;
if (isset($_GET['timkiem']))
{
    $get_status = true;
    $search_keyword = $_GET['timkiem'];
    $list_result = $db->getRaw("SELECT * FROM products WHERE title LIKE '%$search_keyword%'");
    $title = "Tìm kiếm: $search_keyword";
    $search_status = true;
    require_once TEMPLATE . 'product/product_list_tpl.php';
    $noidung = ob_get_clean();
}
if (isset($_GET['order_status']))
{
    $get_status = true;
    $title = "Đặt hàng thành công";
    require_once TEMPLATE . 'thanhtoan/status.php';
    $noidung = ob_get_clean();
}
if (!$get_status)
{

    switch ($url)
    {
        // Trang chủ
        case '':
            require_once TEMPLATE . 'index/index_tpl.php';
            $title = $setting_info[0]['setting_value'];
            $active = 'trang-chu';
            $noidung = ob_get_clean();
            break;
        case 'tin-tuc':
            require_once TEMPLATE . 'new/new_list_tpl.php';
            $noidung = ob_get_clean();
            break;
        // Đăng ký
        case 'dang-ky':
            $title = 'Đăng Ký';
            require_once TEMPLATE . 'khachhang/dangky.php';
            $noidung = ob_get_clean();
            break;
        // Đăng nhập
        case 'dang-nhap':
            if ($f->isLogin())
            {
                $f->redirect('thanh-vien?page=thong_tin_khach_hang');
            } else
            {
                $title = 'Đăng Nhập';
                require_once TEMPLATE . 'khachhang/dangnhap.php';
                $noidung = ob_get_clean();
                break;
            }
        // Thông tin khách hàng
        case 'thanh-vien':
            // Xử lý đăng xuất
            if ($_GET['page'] == 'dang_xuat')
            {
                removeSession('userLoginToken');
            }
            if ($f->isLogin())
            {
                if ($_GET['page'] == 'thong_tin_ca_nhan')
                {
                    $title = 'Thông tin cá nhân';
                }
                if ($_GET['page'] == 'lich_su_don_hang')
                {
                    $title = 'Lịch sử đơn hàng';
                }
                if ($_GET['page'] == 'thong_tin_tai_khoan')
                {
                    $title = 'Thông tin tài khoản';
                }
                require_once TEMPLATE . 'khachhang/thongtinkhachhang.php';
                $noidung = ob_get_clean();
                break;
            } else
            {
                $f->redirect('dang-nhap');
            }
        // Danh sách sản phẩm
        case 'san-pham':
            $title = 'Sản phẩm';
            require_once TEMPLATE . 'product/product_list_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'lien-he':
            require_once TEMPLATE . 'contact/contact_tpl.php';
            $title = 'Liên hệ';
            $active = 'lien-he';
            $noidung = ob_get_clean();
            break;
        // Giỏ hàng
        case 'gio-hang':
            $title = 'Giỏ hàng';
            require_once TEMPLATE . 'thanhtoan/cart_tpl.php';
            $noidung = ob_get_clean();
            break;
        // Thanh toán
        case 'thanh-toan':
            require_once TEMPLATE . 'thanhtoan/thanhtoan_tpl.php';
            $noidung = ob_get_clean();
            break;
        default:
            $slug = ltrim($url, '/');

            // Tra cứu tin tức
            $new = $db->oneRaw("SELECT * FROM news WHERE slug = '$slug'");
            if (!empty($new))
            {
                $title = $new['title'];
                require_once TEMPLATE . 'new/new_item_tpl.php';
                $noidung = ob_get_clean();
                break;
            }
            // Tìm kiếm loại sản phẩm
            $product_type = $db->oneRaw("SELECT * FROM product_types WHERE slug = '$url'");
            if (!empty($product_type))
            {
                $title = $product_type['title'];
                $type_id = $product_type['id'];
                require_once TEMPLATE . 'product/product_list_tpl.php';
                $noidung = ob_get_clean();
                break;
            }
            // Tra cứu sản phẩm
            $product = $db->oneRaw("SELECT * FROM san_pham WHERE duong_dan = '$url'");
            if (!empty($product))
            {
                $title = $product['ten_san_pham'];
                require_once TEMPLATE . 'sanpham/chitietsanpham.php';
                $noidung = ob_get_clean();
                break;
            }

            // Nếu đường dẫn không có quay về lại trang chủ
            $f->redirect('./');
    }
}
