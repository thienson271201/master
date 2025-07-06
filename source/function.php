<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class func
{
    public function isPOST()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    public function isGET()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    public function filter()
    {
        $filterArr = [];

        // Lọc các tham số từ phương thức GET
        if ($this->isGET()) {
            $filterArr += filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Lọc các tham số từ phương thức POST
        if ($this->isPOST()) {
            $filterArr += filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $filterArr;
    }

    public function redirect($path = 'index.php')
    {
        if (!headers_sent()) {
            header("location: $path");
            exit;
        } else {
            echo "<script>window.location.href='$path';</script>";
            exit;
        }
    }

    public function getSmg($smg, $type = 'success', $class = '')
    {
        echo '<div class="my-alert alert alert-' . $type . ' ' . $class . '" role="alert">';
        echo $smg;
        echo '</div>';
    }

    public function upload($filenameupload, $path = '')
    {
        $check = true;

        // Đảm bảo đường dẫn tùy chỉnh bắt đầu bằng dấu gạch chéo và kết thúc bằng dấu gạch chéo
        $target_dir = _PATH_UPLOAD . trim($path, '/') . '/';

        // Kiểm tra và thay đổi quyền nếu cần thiết
        if (!is_writable($target_dir)) {
            // Cố gắng thay đổi quyền thư mục thành writable (0775)
            if (!chmod($target_dir, 0775)) {
                // $this->getSmg('Không thể thay đổi quyền thư mục. Vui lòng kiểm tra lại.', 'danger');
                return "noimage.jpg";
            }
        }

        $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_filename = time() . '.' . $imageFileType;
        $allow_file_upload = ["jpg", "jpeg", "png", "gif", "jfif", "webp"];

        // Kiểm tra nếu không có file được chọn
        if (!isset($_FILES[$filenameupload]) || $_FILES[$filenameupload]['error'] == UPLOAD_ERR_NO_FILE) {
            // $this->getSmg('Không có file nào được chọn.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file có phải là hình ảnh thật hay không
        $checkImage = getimagesize($_FILES[$filenameupload]["tmp_name"]);
        if ($checkImage === false) {
            // $this->getSmg('File upload không phải là hình ảnh!', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra định dạng file
        if (!in_array($imageFileType, $allow_file_upload)) {
            // $this->getSmg('Định dạng file không hợp lệ! Chỉ chấp nhận JPG, JPEG, PNG, GIF, JFIF.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra kích thước file (ví dụ: giới hạn 5MB)
        if ($_FILES[$filenameupload]["size"] > 5000000) {
            // $this->getSmg('File upload quá lớn! Giới hạn 5MB.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file đã tồn tại (tránh ghi đè file)
        if (file_exists($target_dir . $new_filename)) {
            // $this->getSmg('File đã tồn tại.', 'danger');
            return "noimage.jpg";
        }

        // In ra đường dẫn và tên file để kiểm tra
        // echo "Đường dẫn file tạm: " . $_FILES[$filenameupload]["tmp_name"] . "<br>";
        // echo "Đường dẫn đích: " . $target_dir . $new_filename . "<br>";

        // Thực hiện upload file
        if (move_uploaded_file($_FILES[$filenameupload]["tmp_name"], $target_dir . $new_filename)) {
            return $new_filename;
        } else {
            // In ra lỗi cụ thể nếu có
            $error = error_get_last();
            echo "Error: " . $error['message'] . "<br>";
            $this->getSmg('Có lỗi xảy ra khi upload file của bạn.', 'danger');
            return "noimage.jpg";
        }
    }

    public function formatPhoneNumber($phoneNumber)
    {
        // Xóa bỏ tất cả ký tự không phải số
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Kiểm tra độ dài của số điện thoại
        if (strlen($cleaned) != 10) {
            return "Invalid phone number";
        }

        // Định dạng số điện thoại thành định dạng mong muốn
        $formatted = substr($cleaned, 0, 2) . ' ' . substr($cleaned, 2, 4) . ' ' . substr($cleaned, 6, 4);

        return $formatted;
    }
    public function format_tiente($number)
    {
        return number_format($number, 0, '', '.');
    }
    public function status_order($status = 1)
    {
        switch ($status) {
            case 1:
                $vietsub = 'Mới đặt';
                break;
            case 2:
                $vietsub = 'Đã duyệt';
                break;
            case 3:
                $vietsub = 'Đã vận chuyển';
                break;
            case 4:
                $vietsub = 'Thành công';
                break;
            case 5:
                $vietsub = 'Đã huỷ';
                break;
        }
        return $vietsub;
    }
    public function color_order($status = 1)
    {
        switch ($status) {
            case 1:
                $vietsub = 'table-warning';
                break;
            case 2:
                $vietsub = 'table-secondary';
                break;
            case 3:
                $vietsub = 'table-secondary';
                break;
            case 4:
                $vietsub = 'table-success';
                break;
            case 5:
                $vietsub = 'table-danger';
                break;
        }
        return $vietsub;
    }

    public function color_order_2($status = 1)
    {
        switch ($status) {
            case 1:
                $vietsub = '#29abe2';
                break;
            case 2:
                $vietsub = '#999';
                break;
            case 3:
                $vietsub = '#999';
                break;
            case 4:
                $vietsub = '#3fbf7b';
                break;
            case 5:
                $vietsub = '#d33232';
                break;
        }
        return $vietsub;
    }

    public function generateOrderCode($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function isLogin()
    {
        $checkLogin = false;
        if (getSession('userLoginToken')) {
            $userLoginToken = getSession('userLoginToken');
            $khach_hang_id = getSession('khach_hang_id');
            $db = new Database();
            //Kiểm tra token có giống trong database không
            $queryToken = $db->oneRaw("SELECT * FROM khach_hang_token WHERE token = '$userLoginToken' AND khach_hang_id = '$khach_hang_id'");
            if (!empty($queryToken)) {
                $checkLogin = true;
            } else {
                removeSession("userLoginToken");
            }
        }
        return $checkLogin;
    }
    public function tinhTongSanPhamTrongGioHang()
    {
        if (!isset($_SESSION['gio_hang']) || empty($_SESSION['gio_hang'])) {
            return 0;
        }

        $tongSoLuong = 0;
        foreach ($_SESSION['gio_hang'] as $sanPham) {
            if (isset($sanPham['quantity'])) {
                $tongSoLuong += 1;
            }
        }
        return $tongSoLuong;
    }
    public function laydiachi($diachi = 'hello', $xaphuong = 00001, $quanhuyen = 001, $tinhthanhpho = 01)
    {
        $db = new Database();
        $xa = $db->oneRaw("SELECT * FROM xaphuongthitran WHERE xaid = $xaphuong")['name'];
        $quan = $db->oneRaw("SELECT * FROM quanhuyen WHERE maqh = $quanhuyen")['name'];
        $tinh = $db->oneRaw("SELECT * FROM tinhthanhpho WHERE matp = $tinhthanhpho")['name'];
        return $diachi . ', ' . $xa . ', ' . $quan . ', ' . $tinh;
    }
    public function sendMail($to, $subject, $content)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = _username;                     //SMTP username
            // $mail->Username = 'thevyshop.contact@gmail.com';                     //SMTP username
            $mail->Password = _password;                               //SMTP password
            // $mail->Password = 'tlan nljd syxr nkrg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('contact@profix.com', 'Profix');
            $mail->addAddress($to);     //Add a recipient 


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->CharSet = 'UTF-8'; // Set charset to UTF-8
            $mail->send();
            return true;
        } catch (Exception $e) {
            // echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    public function gui_otp($email, $otp)
    {
        $subject = 'Xác thực tài khoản của bạn';
        $content = '
        <div
        style="
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            font-family: sans-serif;
        "
        >
        <div
            style="
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            "
        >
            <div style="padding: 20px; text-align: center">
            <img
                src="https://raw.githubusercontent.com/thienson271201/master/master/assets/images/service/logo-alt.png"
                alt="Logo"
                style="max-width: 150px; margin-bottom: 20px"
            />
            <h2 style="color: #333333">Xác thực tài khoản</h2>
            <p style="color: #555555">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p style="color: #555555">Mã OTP của bạn là:</p>
            <div
                style="
                font-size: 28px;
                font-weight: bold;
                color: #28a745;
                margin: 20px 0;
                "
            >
                ' . $otp . '
            </div>
            <p style="color: #777777">
                Mã OTP có hiệu lực trong vòng <strong>5 phút</strong>. Vui lòng không
                chia sẻ với bất kỳ ai.
            </p>
            <p style="margin-top: 30px; color: #999999; font-size: 12px">
                Nếu bạn không yêu cầu mã này, vui lòng bỏ qua email.
            </p>
            </div>
        </div>
        <div
            style="text-align: center; font-size: 12px; color: #aaa; margin-top: 15px"
        >
            &copy; ' . date("Y") . ' Công ty của bạn. All rights reserved.
        </div>
        </div>
        ';

        return $this->sendMail($email, $subject, $content);
    }
}
