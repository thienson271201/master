<?php
$id = $func->filter()['id'];
$db->delete('admin', "id='$id'");

setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=tai_khoan&act=danh_sach');
