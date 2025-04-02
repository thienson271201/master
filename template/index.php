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

    <!-- Footer -->
    <?php require_once TEMPLATE . LAYOUT . "footer.php" ?>

    <!-- Js all -->
    <?php require_once TEMPLATE . LAYOUT . "js.php" ?>

</body>

</html>