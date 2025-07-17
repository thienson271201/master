<?php
$db->insert('don_hang', $data_insert);
$don_hang_id = $db->getLastInsertId();

if (!empty($_SESSION['gio_hang']))
{
    foreach ($_SESSION['gio_hang'] as $value)
    {
        $san_pham_id = (int) $value['id'];
        $don_gia = (int) $db->oneRaw("SELECT gia_sau_khuyen_mai FROM san_pham WHERE id = $san_pham_id")['gia_sau_khuyen_mai']+$value['option_price'];

        $db->insert('chi_tiet_don_hang', [
            'don_hang_id' => $don_hang_id,
            'san_pham_id' => $san_pham_id,
            'RAM'=>$value['ram'],
            'SSD'=>$value['ssd'],
            'so_luong' => (int) $value['quantity'],
            'don_gia' => $don_gia,
            'tong_tien' => $don_gia * $value['quantity']
        ]);
    }
}

unset($_SESSION['gio_hang']);