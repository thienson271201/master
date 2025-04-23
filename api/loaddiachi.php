<?php
require_once '../config.php';
require_once '../source/database.php';
$db = new Database();

if (isset($_POST['key']))
{
    $key = $_POST['key'];

    if ($key == 'quanhuyen' && isset($_POST['matp']))
    {
        $matp = intval($_POST['matp']);
        $dshuyen = $db->getRaw("SELECT * FROM quanhuyen WHERE matp = $matp");

        echo '<option value="">Chọn Quận / Huyện</option>';
        foreach ($dshuyen as $huyen)
        {
            echo '<option value="' . $huyen['maqh'] . '">' . $huyen['name'] . '</option>';
        }
    } elseif ($key == 'xaphuong' && isset($_POST['maqh']))
    {
        $maqh = intval($_POST['maqh']);
        $dsxa = $db->getRaw("SELECT * FROM xaphuongthitran WHERE maqh = $maqh");

        echo '<option value="">Chọn Phường / Xã</option>';
        foreach ($dsxa as $xa)
        {
            echo '<option value="' . $xa['xaid'] . '">' . $xa['name'] . '</option>';
        }
    } else
    {
        echo '<option value="">Dữ liệu không hợp lệ</option>';
    }
}
