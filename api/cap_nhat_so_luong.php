<?php
session_start();
header('Content-Type: application/json');
$id = $_POST['id'] ?? null;
$quantity = (int) ($_POST['quantity'] ?? 1);

if ($id && isset($_SESSION['gio_hang'][$id])) {
    $_SESSION['gio_hang'][$id]['quantity'] = $quantity;

    // Tính lại giá sản phẩm
    $item = $_SESSION['gio_hang'][$id];
    $gia_sau_km = $item['gia_sau_khuyen_mai'];
    $item_total = $gia_sau_km * $quantity;

    // Tính lại tổng giỏ hàng
    $tong = 0;
    foreach ($_SESSION['gio_hang'] as $sp) {
        $tong += $sp['gia_sau_khuyen_mai'] * $sp['quantity'];
    }

    // Format tiền tệ nếu cần
    function format_tiente($number) {
        return number_format($number, 0, ',', '.');
    }

    echo json_encode([
        'success' => true,
        'item_total' => format_tiente($item_total),
        'cart_total' => format_tiente($tong)
    ]);
} else {
    echo json_encode(['success' => false]);
}
