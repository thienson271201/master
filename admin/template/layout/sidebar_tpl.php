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
                <li
                    class="nav-item <?= $com == 'san_pham' || $com == 'danh_muc' || $com == 'brand' ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= $com == 'san_pham' || $com == 'danh_muc' || $com == 'brand' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?com=thuong_hieu&act=danh_sach"
                                class="nav-link <?= $com == 'thuong_hieu' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thương Hiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=danh_muc&act=danh_sach"
                                class="nav-link <?= $com == 'danh_muc' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh mục sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?com=san_pham&act=danh_sach"
                                class="nav-link <?= $com == 'san_pham' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Quản lý đơn hàng</li>
                <li class="nav-item">
                    <a href="?com=don_hang&act=danh_sach" class="nav-link <?= $com == 'don_hang' ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-bag-shopping"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li>
                <li class="nav-header">Đa phương tiện</li>
                <li class="nav-item <?= $com == 'photo' || $com == 'video' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $com == 'photo' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-images"></i>
                        <p>
                            Quản lý ảnh
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?= $com == 'photo' && $_GET['type'] != 'video' ? 'menu-open' : '' ?>">
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