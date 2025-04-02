<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <div class="brand-link">
            <!--begin::Brand Image-->
            <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </div>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= $com == '' && $act == '' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                <li class="nav-header">Quản lý sản phẩm</li>
                <li class="nav-item <?= $com == 'product' || $com == 'product_type' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'product' || $com == 'product_type' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?com=product_type&act=list"
                                class="nav-link <?= $com == 'product_type' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thương Hiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=product&act=list" class="nav-link <?= $com == 'product' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Quản lý đơn hàng</li>
                <li class="nav-item">
                    <a href="?com=order&act=list" class="nav-link <?= $com == 'order' ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-bag-shopping"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li>
                <li class="nav-header">Đăng ký nhận tin</li>
                <li class="nav-item">
                    <a href="?com=custommer&act=list" class="nav-link <?= $com == 'custommer' ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-pen-to-square"></i>
                        <p>Đăng ký nhận tin</p>
                    </a>
                </li>
                <li class="nav-header">Bài viết không cấp</li>
                <li class="nav-item <?= $com == 'new' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'new' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Quản lý bài viết
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?com=new&act=list&type=tin-tuc"
                                class="nav-link <?= $_GET['type'] == 'tin-tuc' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=new&act=list&type=khuyen-mai"
                                class="nav-link <?= $_GET['type'] == 'khuyen-mai' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=new&act=list&type=chinh-sach"
                                class="nav-link <?= $_GET['type'] == 'chinh-sach' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Chính sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=new&act=list&type=du-an-tieu-bieu"
                                class="nav-link <?= $_GET['type'] == 'du-an-tieu-bieu' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dự án tiêu biểu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $com == 'static' || $com == 'tieuchi' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'static' || $com == 'tieuchi' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-book-half"></i>
                        <p>
                            Quản lý trang tĩnh
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?= $com == 'tieuchi' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-bookmark-fill"></i>
                                <p>
                                    Tiêu chí
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?com=tieuchi&act=update&type=tieu-chi-1"
                                        class="nav-link <?= $_GET['type'] == 'tieu-chi-1' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiêu chí 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=tieuchi&act=update&type=tieu-chi-2"
                                        class="nav-link <?= $_GET['type'] == 'tieu-chi-2' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiêu chí 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=tieuchi&act=update&type=tieu-chi-3"
                                        class="nav-link <?= $_GET['type'] == 'tieu-chi-3' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiêu chí 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=tieuchi&act=update&type=tieu-chi-4"
                                        class="nav-link <?= $_GET['type'] == 'tieu-chi-4' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiêu chí 4</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?com=static&act=update&type=gioi-thieu-index"
                                class="nav-link <?= $_GET['type'] == 'gioi-thieu-index' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Giới thiệu trang chủ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=static&act=update&type=gioi-thieu-index-bottom"
                                class="nav-link <?= $_GET['type'] == 'gioi-thieu-index-bottom' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Giới thiệu bottom</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=static&act=update&type=gioi-thieu"
                                class="nav-link <?= $_GET['type'] == 'gioi-thieu' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Giới thiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=static&act=update&type=lien-he"
                                class="nav-link <?= $_GET['type'] == 'lien-he' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Liên hệ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=static&act=update&type=footer"
                                class="nav-link <?= $_GET['type'] == 'footer' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Footer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Đa phương tiện</li>
                <li class="nav-item <?= $com == 'photo' || $com == 'video' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'photo' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-images"></i>
                        <p>
                            Quản lý ảnh - video
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?= $com == 'photo' && $_GET['type'] != 'video' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-card-image"></i>
                                <p>
                                    Hình ảnh
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?com=photo&act=photo_static&type=logo"
                                        class="nav-link <?= $_GET['type'] == 'logo' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Logo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=photo&act=photo_static&type=favicon"
                                        class="nav-link <?= $_GET['type'] == 'favicon' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Favicon</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=photo&act=photo_static&type=gioi-thieu"
                                        class="nav-link <?= $_GET['type'] == 'gioi-thieu' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Giới thiệu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?com=photo&act=man_photo&type=slide"
                                        class="nav-link <?= $_GET['type'] == 'slide' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Slideshow</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="?com=photo&act=man_photo&type=doi-tac"
                                        class="nav-link <?= $_GET['type'] == 'doi-tac' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Đối tác</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="?com=photo&act=man_photo&type=quang-cao"
                                        class="nav-link <?= $_GET['type'] == 'quang-cao' ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Quảng cáo</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?com=photo&act=man_photo&type=video"
                                class="nav-link <?= $_GET['type'] == 'video' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $com == 'file' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'file' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-images"></i>
                        <p>
                            Quản lý file
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?com=file&act=list" class="nav-link <?= $com == 'file' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Catologue</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Thông tin chung</li>
                <li class="nav-item <?= $com == 'seopage' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'seopage' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-share-fill"></i>
                        <p>
                            Quản lý SEO Page
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=gioi-thieu"
                                class="nav-link <?= $_GET['type'] == 'gioi-thieu' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Giới thiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=san-pham"
                                class="nav-link <?= $_GET['type'] == 'san-pham' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=du-an"
                                class="nav-link <?= $_GET['type'] == 'du-an' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dự án</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=catalogue"
                                class="nav-link <?= $_GET['type'] == 'catalogue' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Catalogue</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=tin-tuc"
                                class="nav-link <?= $_GET['type'] == 'tin-tuc' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=tuyen-dung"
                                class="nav-link <?= $_GET['type'] == 'tuyen-dung' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tuyển dụng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=seopage&act=update&type=lien-he"
                                class="nav-link <?= $_GET['type'] == 'lien-he' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Liên hệ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Cấu hình website</li>
                <li class="nav-item">
                    <a href="?com=setting&act=update" class="nav-link <?= $com == 'setting' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p>Cấu hình website</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>