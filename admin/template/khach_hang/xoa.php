<?php
// Lấy ID
$id = $func->filter()['id'];
$db->delete('khach_hang_token', "khach_hang_id = '$id'");
// Xoá bảng khách hàng
$status= $db->delete('khach_hang', "id = '$id'");
if($status)
{
setFlashData('smg', 'Đã xoá thành công khách hàng');
setFlashData('smg_type', 'success');
}
else
{
setFlashData('smg', 'Không thể xóa khách hàng');
setFlashData('smg_type', 'danger');

}
$func->redirect('?com=khach_hang&act=danh_sach');