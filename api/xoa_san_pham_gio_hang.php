<?php
session_start();

$response = ['status' => 'success', 'reload' => false];

if (isset($_POST['key'])) {
    $key = $_POST['key']; // key là kiểu '3_16GB_512GB', đã đầy đủ

    if (isset($_SESSION['gio_hang'][$key])) {
        unset($_SESSION['gio_hang'][$key]);

        if (count($_SESSION['gio_hang']) <= 0) {
            unset($_SESSION['gio_hang']);
            $response['reload'] = true;
        }

        $response['success'] = true;
    } else {
        $response['error'] = 'Không tìm thấy sản phẩm trong giỏ hàng.';
    }
} else {
    $response['error'] = 'Thiếu thông tin key sản phẩm.';
}


echo json_encode($response);