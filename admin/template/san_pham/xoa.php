<?php
if (isset($_GET['type']) && $_GET['type'] != "") {
    if ($_GET['type'] == 'cau_hinh') {
        $id = $func->filter()['id'];
        $db->delete('tuy_chon_cau_hinh', "id='$id'");
        setFlashData('smg', 'Xoá cấu hình thành công');
        $func->redirect('?com=san_pham&act=sua&id='.$func->filter()['san_pham_id']);
    }
     if ($_GET['type'] == 'thu_vien_anh') {
        $id = $func->filter()['id'];
        $db->delete('hinh_san_pham', "id='$id'");
        setFlashData('smg', 'Xoá hình ảnh thành công');
        $func->redirect('?com=san_pham&act=sua&id='.$func->filter()['san_pham_id']);
    }
} else {
    $id = $func->filter()['id'];
    $db->delete('san_pham', "id='$id'");
    setFlashData('smg', 'Xoá thành công');
    $func->redirect('?com=san_pham&act=danh_sach');
}
