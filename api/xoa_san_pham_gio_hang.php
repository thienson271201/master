<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (isset($_SESSION['gio_hang'][$id])) {
        unset($_SESSION['gio_hang'][$id]);
    }
}
?>
