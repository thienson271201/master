<div class="block-cart collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
    data-hide-block-class="animation-unscale-top-right">
    <div class="cart-inner">
        <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
        <h4 class="text-upper text-center">Giỏ hàng</h4>
        <?php
        if (isset($_SESSION['gio_hang'])):
        ?>
            <div class="items">
                <div class="items collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
                    data-hide-block-class="animation-unscale-top-right">
                    <?php
                    $tonghover = 0;
                    foreach ($_SESSION['gio_hang'] as $item):
                        $id = $item['id'];
                        $giohanghover = $db->oneRaw("select * from san_pham where id=$id");
                        $tonghover += $giohanghover['gia_sau_khuyen_mai'] * $item['quantity'];
                    ?>
                        <div class="shop-side-item cart-item">

                            <div class="item-side-image">
                                <a href="shop-item.html" class="item-image responsive-1by1"><img
                                        src="upload/images/<?= $giohanghover['hinh_anh'] ?>"
                                        alt="" /></a>
                            </div>
                            <div class="item-side">
                                <div class="item-title">

                                    <a href="shop-item.html" class="content-link text-upper"><?= $giohanghover['ten_san_pham'] ?></a>
                                </div>
                                <div class="item-quantity">Số lượng: <?= $item['quantity'] ?></div>
                                <div class="item-prices">
                                    <div class="item-price"><?= $f->format_tiente($giohanghover['gia_sau_khuyen_mai']) ?> đ</div>
                                    <div class="item-old-price"><?= $f->format_tiente($giohanghover['gia_goc']) ?>đ</div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="line-sides main-bg shift-lg"></div>
            <div class="row out-md">
                <div class="col-6 cart-price-title">Tạm tính:</div>
                <div class="col-6 text-right cart-price"><?= $f->format_tiente($tonghover) ?> đ</div>
            </div>
            <div class="line-sides main-bg offs-lg"></div>
            <div class="clearfix">
                <a href="./gio-hang" class="btn text-upper btn-md btns-bordered pull-left">Chi tiết</a>
                <a href="./thanh-toan" class="btn text-upper btn-md pull-right">Thanh toán</a>
            </div>
        <?php
        else:
        ?>
            <p>Giỏ hàng của bạn còn trống !</p>
        <?php
        endif;
        ?>

    </div>
</div>