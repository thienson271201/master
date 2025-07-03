<?php
require_once '../../../config.php';
?>
<div class="overlay">
  <div class="notification">
    <!-- <p>Đây là thông báo quan trọng!</p> -->
    <img style="height: 100%;"
      src="https://img.vietqr.io/image/<?= _NGAN_HANG . '-' . _SO_TAI_KHOAN ?>-compact2.png?amount=<?= $_POST['tong_tien'] ?>&accountName=profix&addInfo=thanh toan don hang <?= $_POST['ma_don_hang'] ?>"
      alt="">
    <div class="thong_tin_giao_dich">
      <p>Vui lòng quét mã QR để thanh toán</p>
      <p>Số tiền: <span class="text-danger"><?= $_POST['tong_tien'] ?> VNĐ</span></p>
      <p>Nội dung: thanh toan don hang <?= $_POST['ma_don_hang'] ?></p>

    </div>
  </div>
</div>