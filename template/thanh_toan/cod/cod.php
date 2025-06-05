 <?php
 $db->insert('don_hang', $data_insert);
    $don_hang_id = $db->getLastInsertId();
    foreach ($_SESSION['gio_hang'] as $key => $value) {
        $data_insert = [
            'don_hang_id' => $don_hang_id,
            'san_pham_id' => $value['id'],
            'so_luong' => $value['quantity'],
        ];
        $db->insert('chi_tiet_don_hang', $data_insert);
    }
    unset($_SESSION['gio_hang']);
    $f->redirect('?hinh_thuc=COD&trang_thai=thanh_cong');
?>