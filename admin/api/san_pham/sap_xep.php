<?php
define('TEMPLATE', 'template/');
define('LAYOUT', 'layout/');
define('SOURCE', 'source/');

// Config
require_once "../../../config.php";

// Database
require_once "../../../source/database.php";

// Function
require_once "../../../source/function.php";


$db = new Database();
$func = new func();

$filterAll = $func->filter();
if (!empty($filterAll))
{
    // print_r($filterAll);
    $id = $filterAll['id'];
    $data_update = [
        'stt' => $filterAll['stt'],
    ];
    $update_status = $db->update('products', $data_update, "id = '$id'");
    // if ($update_status)
    // {
    //     echo 'Thành công';
    // } else
    // {
    //     echo 'Thất bại';
    // }
}