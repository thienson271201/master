<?php
function hien_thi_tieu_de_trang($tieu_de)
{
echo '
<section class="with-bg solid-section">
  <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
  <div class="theme-back"></div>
  <div class="container page-info">
    <div class="section-alt-head container-md">
      <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">'. strtoupper($tieu_de) .'</h1>
    </div>
  </div>
  <div class="section-footer">
    <div class="container" data-inview-showup="showup-translate-down">
      <ul class="page-path">
        <li><a href="index-2.html">Trang chủ</a></li>
        <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
        <li>'. $tieu_de .'</li>
      </ul>
    </div>
  </div>
</section>';
}
