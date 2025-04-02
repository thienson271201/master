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
        case '':
            require_once TEMPLATE . 'index/index_tpl.php';
            $title = $setting_info[0]['setting_value'];
            $active = 'trang-chu';
            $noidung = ob_get_clean();
            break;
        case 'gioi-thieu':
            $new = $db->oneRaw("SELECT * FROM news WHERE type = 'gioi-thieu'");
            $title = 'Giới thiệu - ' . $setting_info[0]['setting_value'];
            $active = 'gioi-thieu';
            require_once TEMPLATE . 'new/new_item_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'tin-tuc':
            require_once TEMPLATE . 'new/new_list_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'tuyen-dung':
            require_once TEMPLATE . 'new/new_list_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'catalogue':
            require_once TEMPLATE . 'file/list_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'du-an':
            require_once TEMPLATE . 'sanpham/chitietsanpham.php';
            $noidung = ob_get_clean();
            break;
        case 'khuyen-mai':
            require_once TEMPLATE . 'new/new_list_tpl.php';
            $noidung = ob_get_clean();
            break;
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
        case 'video':
            require_once TEMPLATE . 'video/list_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'gio-hang':
            $title = 'Giỏ hàng';
            require_once TEMPLATE . 'thanhtoan/cart_tpl.php';
            $noidung = ob_get_clean();
            break;
        case 'thanh-toan':
            require_once TEMPLATE . 'thanhtoan/thanhtoan_tpl.php';
            $noidung = ob_get_clean();
            break;
        default:
            $slug = ltrim($url, '/');

            $new = $db->oneRaw("SELECT * FROM news WHERE slug = '$slug'");
            if (!empty($new))
            {
                $title = $new['title'];
                require_once TEMPLATE . 'new/new_item_tpl.php';
                $noidung = ob_get_clean();
                break;
            }
            $product_type = $db->oneRaw("SELECT * FROM product_types WHERE slug = '$url'");
            if (!empty($product_type))
            {
                $title = $product_type['title'];
                $type_id = $product_type['id'];
                require_once TEMPLATE . 'product/product_list_tpl.php';
                $noidung = ob_get_clean();
                break;
            }

            $product = $db->oneRaw("SELECT * FROM products WHERE slug = '$url'");
            if (!empty($product))
            {
                $title = $product['title'];
                require_once TEMPLATE . 'product/product_item_tpl.php';
                $noidung = ob_get_clean();
                break;
            }

            // Nếu đường dẫn không có
            $f->redirect('./');
    }
}
