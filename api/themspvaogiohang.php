<?php
session_start();

if (isset($_POST['id']))
{
    $id = (int) $_POST['id'];

    // Nếu chưa có giỏ hàng, khởi tạo
    if (!isset($_SESSION['gio_hang']))
    {
        $_SESSION['gio_hang'] = [];
    }

    // Nếu sản phẩm đã có trong giỏ, tăng số lượng
    if (isset($_SESSION['gio_hang'][$id]))
    {
        $_SESSION['gio_hang'][$id]['quantity']++;
    } else
    {
        // Ngược lại, thêm mới
        $_SESSION['gio_hang'][$id] = [
            'id' => $id,
            'quantity' => 1
        ];
    }

    echo json_encode(['success' => true]);
} else
{
    echo json_encode(['success' => false]);
}