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


switch ($url)
{
    // Trang chủ
    case '':
        require_once TEMPLATE . 'index/index_tpl.php';
        $title = $setting_info[0]['setting_value'];
        $active = 'trang-chu';
        $noidung = ob_get_clean();
        break;
    // Tin tức
    case 'tin-tuc':
        $title = 'Tin tức';
        require_once TEMPLATE . 'tin_tuc/tin_tuc.php';
        $noidung = ob_get_clean();
        break;
    // Chi tiết tin tức gán cứng
    case 'laptop-la-gi-nhung-dieu-can-biet-truoc-khi-mua':
        $title = 'Laptop là gì? Những điều cần biết trước khi mua';
        require_once TEMPLATE . 'tin_tuc/chi_tiet_tin_tuc.php';
        $noidung = ob_get_clean();
        break;
    // Liên hệ
    case 'lien-he':
        $title = 'Liên hệ';
        require_once TEMPLATE . 'lien_he/lien_he.php';
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
        // Gán mặc định
        if (!empty($_GET['page']))
        {
            $duongdan = $_GET['page'];
        } else
        {
            $duongdan = 'bang-dieu-khien';
        }
        // Xử lý đăng xuất
        if ($duongdan == 'dang_xuat')
        {
            removeSession('userLoginToken');
        }
        if ($f->isLogin())
        {
            require_once TEMPLATE . 'khachhang/layout/top.php';

            if ($duongdan == 'bang-dieu-khien')
            {
                $title = 'Bảng điều khiển';
                require_once TEMPLATE . 'khachhang/bangdieukhien.php';
                $noidung = ob_get_clean();
                break;
            }
            if ($duongdan == 'ho-so')
            {
                $title = 'Hồ sơ';
                require_once TEMPLATE . 'khachhang/hoso.php';
                $noidung = ob_get_clean();
                break;
            }
            if ($duongdan == 'don-hang')
            {
                $title = 'Đơn hàng';
                require_once TEMPLATE . 'khachhang/donhang.php';
                $noidung = ob_get_clean();
                break;
            }
        } else
        {
            $f->redirect('dang-nhap');
        }
    // Danh sách sản phẩm
    case 'san-pham':
        $title = 'Sản phẩm';
        require_once TEMPLATE . 'sanpham/danhsachsanpham.php';
        $noidung = ob_get_clean();
        break;
    // Giỏ hàng
    case 'gio-hang':
        $title = 'Giỏ hàng';
        require_once TEMPLATE . 'thanh_toan/gio_hang.php';
        $noidung = ob_get_clean();
        break;
    // Thanh toán
    case 'thanh-toan':
        if (!isset($_SESSION['gio_hang']))
            $f->redirect('./');
        else
        {
            if (isset($_GET['vnp_ResponseCode']))
            {
                if ($_GET['vnp_ResponseCode'] == '00')
                {
                    $data_insert = getFlashData('data_vnpay');
                    require_once TEMPLATE . 'thanh_toan/tao_don_hang.php';
                    $title = "Kết quả thanh toán đơn hàng";
                    require_once TEMPLATE . 'thanh_toan/vnpay/vnpay_return.php';
                    $noidung = ob_get_clean();
                }
            } else
            {
                require_once TEMPLATE . 'thanh_toan/thanh_toan.php';
                $noidung = ob_get_clean();
            }
        }
        break;
    // Quên mật khẩu
    case 'quen-mat-khau':
        if ($f->isLogin())
        {
            $f->redirect('thanh-vien?page=thong_tin_khach_hang');
        } else
        {
            // nếu có opt thì vô không thì trở ra trang cũ
            $title = 'Quên mật khẩu';
            require_once TEMPLATE . 'khachhang/quen_mat_khau/quen_mat_khau.php';
            $noidung = ob_get_clean();
            break;
        }
    case 'tao_mat_khau':
        if ($f->isLogin())
        {
            $f->redirect('thanh-vien?page=thong_tin_khach_hang');
        } else
        {
            // nếu có opt thì vô không thì trở ra trang cũ
            $title = 'Nhập mật khẩu mới';
            require_once TEMPLATE . 'khachhang/quen_mat_khau/tao_mat_khau.php';
            $noidung = ob_get_clean();
            break;
        }
    case 'nhap-opt':
        if ($f->isLogin())
        {
            $f->redirect('thanh-vien?page=thong_tin_khach_hang');
        } else
        {
            $otp = getSession('otp');
            if ($otp)
            {
                $title = 'Nhập OPT';
                require_once TEMPLATE . 'khachhang/quen_mat_khau/nhap_opt.php';
                $noidung = ob_get_clean();
                break;
            } else
                $f->redirect('./quen-mat-khau');

        }
    case 404:
        $title = 'Trang không tồn tại';
        require_once '404.php';
        $noidung = ob_get_clean();
        break;
    default:
        $slug = ltrim($url, '/');

        // // Tra cứu sản phẩm
        $product = $db->oneRaw("SELECT * FROM san_pham WHERE duong_dan = '$url'");
        if (!empty($product))
        {
            $title = $product['ten_san_pham'];
            require_once TEMPLATE . 'sanpham/chitietsanpham.php';
            $noidung = ob_get_clean();
            break;
        }
        // Nếu đường dẫn không có quay về lại trang chủ
        $f->redirect('./404');
}
