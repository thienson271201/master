<?php
$favicon = $db->oneRaw("SELECT * FROM images WHERE type = 'favicon'")['image'];
?>
<!-- charset -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- title -->
<title><?= !empty($title) ? $title : 'tên công ty' ?></title>
<?php $favicon = $db->oneRaw("SELECT * FROM images WHERE type = 'favicon'")['image'] ?>
<!-- icon -->
<link rel="icon" href="assets/images/upload/<?= $favicon ?>" type="image/x-icon" />

<script src="assets/jquery/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">