<?php
session_start();

if (isset($_POST['id']))
{
    $id = (int) $_POST['id'];

    // Nếu chưa có giỏ hàng, khởi tạo
    if (!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = [];
    }

    // Nếu sản phẩm đã có trong giỏ, tăng số lượng
    if (isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['quantity']++;
    } else
    {
        // Ngược lại, thêm mới
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'quantity' => 1
        ];
    }

    echo json_encode(['success' => true]);
} else
{
    echo json_encode(['success' => false]);
}