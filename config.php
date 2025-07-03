<?php
// Tên thư mục khi chạy dưới localhost
define('URL', 'master');

// Ngôn ngữ
define('LANG', 'vi');

// Đặt múi giờ cho PHP
date_default_timezone_set('Asia/Ho_Chi_Minh');


/* Cấu hình http */
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
{
    $http = 'https://';
} else
{
    $http = 'http://';
}

// Thiết lập host
define('HOST', $http . $_SERVER['HTTP_HOST'] . '/' . URL);


// Thiết lập path
define('_PATH', __DIR__);
define('_PATH_TEMPLATE', _PATH . '/template');
define('_PATH_ASSETS', _PATH . '/assets');
define('_PATH_UPLOAD', _PATH . '/upload/');

// Thiết lập mailer
define('_username', '');
define('_password', '');


// Thông tin kết nối
class DatabaseConfig
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "master";

    public function getConnection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $conn->set_charset("utf8");
        return $conn;
    }
}

$vnp_TmnCode = "1V2PX8I5"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "OBZFKP3IPO5DEO555RIEPCDBDEJDUB3R"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/master/thanh-toan";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

// thông tin chuyển khoản
// Chủ tài khoản Nguyễn Hoàng Minh
define('_SO_TAI_KHOAN', 'CASS101010');
define('_NGAN_HANG', 'OCB');
define('_API_THANH_TOAN', 'https://script.google.com/macros/s/AKfycbySQc880OdC46ZTGSe8-HwWbv7-6_cT-jK3GVF4do-ccraA_mB_snjgR-q7AeXAxrIa/exec');


// Chủ tài khoản Huỳnh Minh Tâm
// define('_SO_TAI_KHOAN', 'CASS101010');
// define('_NGAN_HANG', 'OCB');
// define('_API_THANH_TOAN', 'https://script.google.com/macros/s/AKfycbySQc880OdC46ZTGSe8-HwWbv7-6_cT-jK3GVF4do-ccraA_mB_snjgR-q7AeXAxrIa/exec');