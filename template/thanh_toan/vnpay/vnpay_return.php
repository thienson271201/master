   <section class="text-center content-section">
       <div class="container">
           <img
               class="image offs-md"
               src="assets/images/error/404.png"
               alt=""
               data-inview-showup="showup-scale" />
           <div class="section-head text-center container-md">
               <h2
                   class="section-title text-upper text-lg"
                   data-inview-showup="showup-translate-right">
                   Lỗi
               </h2>
               <p data-inview-showup="showup-translate-left">
                   <?php
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        $data_insert = getFlashData('data_vnpay');
                        $data_insert['ngay_tao'] = date('Y-m-d H:i:s');
                        $data_insert['hinh_thuc_thanh_toan'] = 'vnpay';
                        if ($f->isLogin()) {
                            $data_insert['khach_hang_id'] = getSession('khach_hang_id');
                        }
                        $db->insert('don_hang', $data_insert);
                        $don_hang_id = $db->getLastInsertId();
                        foreach ($_SESSION['gio_hang'] as $key => $value) {
                            $data_insert = [
                                'don_hang_id' => $don_hang_id,
                                'san_pham_id' => $value['id'],
                                'so_luong' => $value['quantity'],
                            ];
                            $db->insert('chi_tiet_don_hang', $data_insert);
                        }

                        $title = 'Thanh toán thành công';
                        unset($_SESSION['gio_hang'] );
                    } else $title = 'Thanh toán thất bại';
                    echo $title;
                    ?>
               </p>
           </div>
           <a
               class="btn text-upper"
               href="index.php?page=trangChu"
               data-inview-showup="showup-translate-up">Quay về trang chủ</a>
       </div>
   </section>