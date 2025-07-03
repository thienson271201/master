<!DOCTYPE html>
<html lang="<?= LANG ?>">

<head>
    <!-- Head -->
    <?php require_once TEMPLATE . LAYOUT . "head.php" ?>

    <!-- Css -->
    <?php require_once TEMPLATE . LAYOUT . "css.php" ?>

</head>

<body class="body loader-loading">

    <!-- Header -->
    <?php require_once TEMPLATE . LAYOUT . "header.php" ?>

    <!-- Nội dung web -->
    <?= $noidung ?>

    <!-- Giỏ hàng hover -->
    <?php 
    // require_once TEMPLATE . LAYOUT . "giohanghover.php" ?>

    <!-- Nút cuộn lên -->
    <a href="#" class="scroll-top disabled"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    <!-- Khối chờ tải trang -->
    <div class="loader-block">
        <div class="loader-back alt-bg"></div>
        <div class="loader-image">
            <img class="image" src="assets/images/parts/loader.gif" alt="" />
        </div>
    </div>

    <!-- Footer -->
    <?php require_once TEMPLATE . LAYOUT . "footer.php" ?>

    <!-- Js all -->
    <?php require_once TEMPLATE . LAYOUT . "js.php" ?>

</body>

</html>