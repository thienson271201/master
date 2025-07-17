<?php
session_start();
require_once '../config.php';
require_once '../source/database.php';
require_once '../source/function.php';
$db = new Database();
$f = new func();
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $ram = $_POST['ram'] ?? '';
    $ssd = $_POST['ssd'] ?? '';

    if (!isset($_SESSION['gio_hang'])) {
        $_SESSION['gio_hang'] = [];
    }

    // Tạo key riêng biệt theo ID + tùy chọn để phân biệt
    $key = $id . '_' . $ram . '_' . $ssd;

    if (isset($_SESSION['gio_hang'][$key])) {
        $_SESSION['gio_hang'][$key]['quantity']++;
    } else {
        // Tính giá cộng thêm từ tùy chọn
        $tongTienOption = 0;

        if ($ram !== '') {
            $ramData = $db->oneRaw("SELECT thanh_tien FROM tuy_chon_cau_hinh WHERE RAM = '$ram' AND san_pham_id = $id");
            $tongTienOption += $ramData ? (int)$ramData['thanh_tien'] : 0;
        }

        if ($ssd !== '') {
            $ssdData = $db->oneRaw("SELECT thanh_tien FROM tuy_chon_cau_hinh WHERE SSD = '$ssd' AND san_pham_id = $id");
            $tongTienOption += $ssdData ? (int)$ssdData['thanh_tien'] : 0;
        }

        $_SESSION['gio_hang'][$key] = [
            'id' => $id,
            'quantity' => 1,
            'ram' => $ram,
            'ssd' => $ssd,
            'option_price' => $tongTienOption
        ];
    }

    ob_start();
    include '../template/layout/giohanghover.php';
    $html = ob_get_clean();
    $number_cart = $f->tinhTongSanPhamTrongGioHang();
    echo json_encode(['success' => true, 'html' => $html, 'number_cart' => $number_cart]);
} else {
    echo json_encode(['success' => false]);
}

