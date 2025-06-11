 <?php
  $list_san_pham = $db->getRaw('select * from san_pham ');

  // echo '<pre>';
  // print_r ($list_san_pham);
  // echo '</pre>';

  if (isset($_GET['sortby'])) {
    $sortby = $_GET['sortby'];

    if ($sortby == '1') {
      // Sắp xếp tăng dần theo giá sau khuyến mãi
      usort($list_san_pham, function ($a, $b) {
        return $a['gia_sau_khuyen_mai'] <=> $b['gia_sau_khuyen_mai'];
      });
    } elseif ($sortby == '2') {
      // Sắp xếp giảm dần theo giá sau khuyến mãi
      usort($list_san_pham, function ($a, $b) {
        return $b['gia_sau_khuyen_mai'] <=> $a['gia_sau_khuyen_mai'];
      });
    }
  }

  if (isset($_GET['show']) && $_GET['show'] !== '') {
    $thuong_hieu = $_GET['show'];
    $list_san_pham = array_filter($list_san_pham, function ($san_pham) use ($thuong_hieu) {
      return $san_pham['thuong_hieu_id'] === $thuong_hieu;
    });
  }

  ?>
 <div class="clearfix page-sidebar-right container">
   <div class="page-content">
     <section class="content-section">
       <form>
         <div class="row">
           <div class="sm-col-6 md-col-4">
             <div class="field-group shop-line-field chosen-field">
               <label>Sắp xếp</label>
               <div class="field-wrap">
                 <form method="get">
                   <select class="field-control" name="sortby" onchange="this.form.submit()">
                     <option name="sortby">Giá</option>
                     <option name="sortby" value="1" <?= isset($_GET['sortby']) && $_GET['sortby'] == '1' ? 'selected' : '' ?>>Tăng dần</option>
                     <option name="sortby" value="2" <?= isset($_GET['sortby']) && $_GET['sortby'] == '2' ? 'selected' : '' ?>>Giảm dần</option>
                   </select>
                 </form>
                 <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                 <span class="field-back"></span>
               </div>
             </div>
           </div>
           <div class="sm-col-6 md-col-4">
             <div class="field-group shop-line-field chosen-field">
               <label>Thương hiệu</label>
               <div class="field-wrap">
                 <form method="get">
                   <select
                     class="field-control"
                     name="show"
                     selected="selected"
                     onchange="this.form.submit()">
                     <option name="show" selected="selected">Chọn</option>
                     <option name="show" value="2" <?= isset($_GET['show']) && $_GET['show'] == 'Asus' ? 'selected' : '' ?>>
                       Asus
                     </option>
                     <option name="show" value="5" <?= isset($_GET['show']) && $_GET['show'] == 'Dell' ? 'selected' : '' ?>>Dell</option>
                     <option name="show" value="3" <?= isset($_GET['show']) && $_GET['show'] == 'Msi'  ? 'selected' : '' ?>>Msi</option>
                   </select>
                 </form>
                 <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                 <span class="field-back"></span>
               </div>
             </div>
           </div>
         </div>
       </form>
       <div class="row rows-stuck-2 cols-stuck-2">
         <?php
          foreach ($list_san_pham as $sanpham):
          ?>
           <div class="md-col-6">
             <div
               class="item shop-item shop-item-short item-dash-border"
               data-inview-showup="showup-scale">
               <div class="item-back"></div>
               <?php
                $phan_tram = round((($sanpham['gia_goc'] - $sanpham['gia_sau_khuyen_mai']) / $sanpham['gia_goc']) * 100);
                ?>
               <div class="item-lables">
                 <a class="item-label-sale item-label" href="#">Giảm giá <?= $phan_tram ?>%</a>
               </div>
               <a href="<?= $sanpham['duong_dan'] ?>" class="item-image responsive-1by1">
                 <img
                   src="upload/images/<?= $sanpham['hinh_anh'] ?>" />
               </a>
               <div class="item-content text-center">
                 <div class="item-title text-upper mb-0">
                   <a href="shop-item.html" class="content-link"><?= $sanpham['ten_san_pham'] ?></a>
                 </div>
                 <div class="item-specs">
                   <?= $sanpham['thong_so_kich_thuoc'] ?>
                 </div>
                 <div class="item-prices">
                   <div class="item-price"><?= number_format($sanpham["gia_sau_khuyen_mai"], 0, ',', '.') ?> ₫</div>
                   <?php if ($phan_tram > 1) : ?>
                     <div class="item-old-price"><?= number_format($sanpham["gia_goc"], 0, ',', '.') ?> ₫</div>
                   <?php endif; ?>
                 </div>
                 <div class="item-links">
                   <a href="#" data-id="<?= $sanpham['id'] ?>"
                     class="btn-add-to-cart btn btn-sm px-2 mx-2 btns-bordered">
                     <i class="fas fa-shopping-cart"></i>
                   </a>
                   <a href="#" class="btn btn-sm px-2 mx-2 btns-bordered">
                     <i class="fas fa-heart"></i>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         <?php endforeach ?>
       </div>
       <div
         class="text-center shift-lg"
         data-inview-showup="showup-translate-up">
         <div class="paginator">
           <a href="#" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
           <span class="active">2</span> <a href="#">3</a> <span>...</span>
           <a href="#">12</a>
           <a href="#" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
         </div>
       </div>
     </section>
   </div>
   <aside class="page-sidebar content-section">
     <section
       class="side-content-section"
       data-inview-showup="showup-translate-up">
       <form>
         <div class="field-group">
           <label>Khoảng giá</label>
           <div
             class="slider-wrap"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <input
               type="hidden"
               name="priceFrom"
               value="40"
               data-slider-from />
             <input
               type="hidden"
               name="priceTo"
               value="160"
               data-slider-to />
             <div class="slider-container theme-slider">
               <div class="ui-slider-handle">
                 <div class="slider-handle-block"></div>
               </div>
               <div class="ui-slider-handle">
                 <div class="slider-handle-block"></div>
               </div>
               <div class="slider-back"></div>
             </div>
             <div class="slider-text text-right">
               Khoảng giá: <span data-slider-from></span>đ - <span
                 data-slider-to></span>đ
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Series model</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">ASUS ExpertBook</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">Acer Aspire</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Dell Inspiron</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Series CPU</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">Apple M</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">Core 5</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Core 7</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Thế hệ CPU</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   AMD Ryzen AI 300</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">Intel Core thế hệ thứ 11</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Snapdragon X</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Nhu cầu</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   Gaming</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">Học sinh - Sinh viên</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Văn phòng</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Chuẩn laptop</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   AMD</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">AMD AI</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Intel AI</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Chip đồ họa rời</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   GeForce GTX 1650</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">RTX A500</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">RTX A1000</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Kích thước màn hình</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   Trên 17"</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">Từ 11" - 13.9"</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">Từ 14" - 14.9"</span></label>
             </div>
           </div>
         </div>
         <div class="line-sides main-bg out-lg"
           data-inview-showup="showup-translate-up"></div>
         <div class="field-group">
           <label>Dung lượng RAM</label>
           <div
             class="multi-choice"
             data-ui-range-slider
             data-min="10"
             data-max="1000">
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Acer" /><span class="choice-text text-upper">
                   32GB</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="Asus" /><span class="choice-text text-upper">64GB</span></label>
             </div>
             <div class="choice">
               <label><input
                   type="checkbox"
                   name="manufacturer"
                   value="HP" /><span class="choice-text text-upper">128GB</span></label>
             </div>
           </div>
         </div>
       </form>
     </section>
   </aside>
 </div>

 <script>
   $(document).ready(function() {
     $('.btn-add-to-cart').off('click').on('click', function(e) {
       e.preventDefault(); // Ngăn không cho nhảy trang vì thẻ <a href="#">
       let productId = $(this).data('id');

       $.ajax({
         url: 'api/themspvaogiohang.php', // file PHP xử lý thêm vào giỏ hàng
         method: 'POST',
         dataType: 'json',
         data: {
           id: productId
         },
         success: function(response) {
           // Xử lý sau khi thêm thành công
           alert('Đã thêm sản phẩm vào giỏ hàng!');
           console.log(response.html);
           const htmlString = response.html;

           // Tạo DOM tạm
           const $temp = $('<div>').html(htmlString);

           // Lấy phần nội dung bên trong .items
           const newItemsContent = $temp.find('.cart-inner-inner').html();

           // Cập nhật vào DOM thật
           $('#gio_hang_component .cart-inner-inner').html(newItemsContent);

         },
         error: function() {
           alert('Đã xảy ra lỗi, vui lòng thử lại.');
         }
       });
     });
   });
 </script>