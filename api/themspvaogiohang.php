<?php
session_start();
require_once '../config.php';
require_once '../source/database.php';
require_once '../source/function.php';
$db=new Database();
$f=new func();
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    // Nếu chưa có giỏ hàng, khởi tạo
    if (!isset($_SESSION['gio_hang'])) {
        $_SESSION['gio_hang'] = [];
    }

    // Nếu sản phẩm đã có trong giỏ, tăng số lượng
    if (isset($_SESSION['gio_hang'][$id])) {
        $_SESSION['gio_hang'][$id]['quantity']++;
    } else {
        // Ngược lại, thêm mới
        $_SESSION['gio_hang'][$id] = [
            'id' => $id,
            'quantity' => 1
        ];
    }
    ob_start();
    include '../template/layout/giohang.php';
    $html = ob_get_clean();

    echo json_encode(['success' => true,'html'=>$html]);
} else {
    echo json_encode(['success' => false]);
}
