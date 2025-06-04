<?php
// Lấy ID
$id = $func->filter()['id'];
// Xoá bảng order_details
$db->delete('chi_tiet_don_hang', "don_hang_id = '$id'");
// Xoá bảng orders
$db->delete('don_hang', "id = '$id'");
setFlashData('smg', 'Đã xoá thành công đơn hàng');
$func->redirect('?com=don_hang&act=danh_sach');