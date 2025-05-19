<?php
session_start();
header('Content-Type: application/json');
require_once "../config.php";
require_once "../source/database.php";
$db = new Database();
$id = $_POST['id'] ?? null;
$quantity = (int) ($_POST['quantity'] ?? 1);

if ($id && isset($_SESSION['gio_hang'][$id]))
{
    $_SESSION['gio_hang'][$id]['quantity'] = $quantity;

    // Tính lại giá sản phẩm
    $item = $_SESSION['gio_hang'][$id];
    $itemid = $item['id'];
    $gia_sau_km = $db->oneRaw("select gia_sau_khuyen_mai from san_pham where id = $itemid")['gia_sau_khuyen_mai'];
    // $gia_sau_km = 1000;
    $item_total = $gia_sau_km * $quantity;

    // Tính lại tổng giỏ hàng
    $tong = 0;
    foreach ($_SESSION['gio_hang'] as $sp)
    {
        $id = $sp['id'];
        $gia_sau_km = $db->oneRaw("select gia_sau_khuyen_mai from san_pham where id = $id")['gia_sau_khuyen_mai'];
        $tong += $gia_sau_km * $sp['quantity'];
    }

    // Format tiền tệ nếu cần
    function format_tiente($number)
    {
        return number_format($number, 0, ',', '.');
    }

    echo json_encode([
        'success' => true,
        'item_total' => format_tiente($item_total),
        'cart_total' => format_tiente($tong)
    ]);
} else
{
    echo json_encode(['success' => false]);
}
