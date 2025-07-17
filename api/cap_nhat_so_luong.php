<?php
session_start();
header('Content-Type: application/json');
require_once "../config.php";
require_once "../source/database.php";
$db = new Database();
$id = $_POST['id'] ?? null;
$quantity = (int) ($_POST['quantity'] ?? 1);

if (isset($_POST['key']) && isset($_POST['quantity'])) {
    $key = $_POST['key']; // key như '3_16GB_512GB'
    $quantity = (int)$_POST['quantity'];

    if ($quantity <= 0) $quantity = 1;

    if (isset($_SESSION['gio_hang'][$key])) {
        // Cập nhật số lượng
        $_SESSION['gio_hang'][$key]['quantity'] = $quantity;

        // Lấy thông tin sản phẩm
        $item = $_SESSION['gio_hang'][$key];
        $item_id = $item['id'];
        $option_price = isset($item['option_price']) ? $item['option_price'] : 0;

        // Lấy giá gốc từ DB
        $gia_sau_km = $db->oneRaw("SELECT gia_sau_khuyen_mai FROM san_pham WHERE id = $item_id")['gia_sau_khuyen_mai'];
        $tong_item = ($gia_sau_km + $option_price) * $quantity;

        // Tính lại tổng giỏ hàng
        $tong = 0;
        foreach ($_SESSION['gio_hang'] as $sp) {
            $sp_id = $sp['id'];
            $so_luong = $sp['quantity'];
            $op_price = isset($sp['option_price']) ? $sp['option_price'] : 0;

            $gia_sp = $db->oneRaw("SELECT gia_sau_khuyen_mai FROM san_pham WHERE id = $sp_id")['gia_sau_khuyen_mai'];
            $tong += ($gia_sp + $op_price) * $so_luong;
        }

        // Hàm định dạng tiền
        function format_tiente($number) {
            return number_format($number, 0, ',', '.');
        }

        echo json_encode([
            'success' => true,
            'item_total' => format_tiente($tong_item),
            'cart_total' => format_tiente($tong)
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Thiếu dữ liệu đầu vào.']);
}

