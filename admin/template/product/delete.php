<?php
$id = $func->filter()['id'];
$db->delete('san_pham', "id='$id'");
setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=product&act=list');
