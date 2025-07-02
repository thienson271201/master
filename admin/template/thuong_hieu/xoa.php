<?php
$id = $func->filter()['id'];
$db->delete('thuong_hieu', "id='$id'");
setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=thuong_hieu&act=danh_sach');
