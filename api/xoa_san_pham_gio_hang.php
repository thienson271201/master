<?php
session_start();

$response = ['status' => 'success', 'reload' => false];

if (isset($_POST['id']))
{
    $id = $_POST['id'];

    if (isset($_SESSION['gio_hang'][$id]))
    {
        unset($_SESSION['gio_hang'][$id]);

        // Nếu sau khi xóa, giỏ hàng trống hoặc chỉ còn 1 sản phẩm
        if (count($_SESSION['gio_hang']) <= 0)
        {
            unset($_SESSION['gio_hang']);
            $response['reload'] = true;
        }
    }
}

echo json_encode($response);