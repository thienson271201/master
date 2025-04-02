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