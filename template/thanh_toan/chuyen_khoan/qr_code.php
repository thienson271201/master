<?php
require_once '../../../config.php';
require_once '../../../source/function.php';
$f = new func();
?>
<div class="overlay">
  <div class="notification">
    <!-- <p>Đây là thông báo quan trọng!</p> -->
    <img style="height: 100%;"
      src="https://img.vietqr.io/image/<?= _NGAN_HANG . '-' . _SO_TAI_KHOAN ?>-compact2.png?amount=<?= $_POST['tong_tien'] ?>&accountName=profix&addInfo=thanh toan don hang <?= $_POST['ma_don_hang'] ?>"
      alt="">
    <div class="thong_tin_giao_dich w-100">
      <p class="text-right">
        <a href="javascript:void(0);" class="btn-close-qr">
          <i class="fa-solid fa-xmark" style="font-size: 30px;"></i>
        </a>
      </p>

      <p>Vui lòng quét mã QR để thanh toán</p>
      <p>Số tiền: <span class="text-danger"><?= $f->format_tiente($_POST['tong_tien']) ?> đ</span></p>
      <p>Nội dung: thanh toan don hang <?= $_POST['ma_don_hang'] ?></p>

    </div>
  </div>
</div>