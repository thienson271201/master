<?php
$id = $func->filter()['id'];
$db->delete('danh_muc_san_pham', "id='$id'");

setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=danh_muc&act=dach_sach');
