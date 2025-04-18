<section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="./assets/images/service/tools.jpg" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
        <div class="section-alt-head container-md">
            <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">
                Thông tin cá nhân
            </h1>
        </div>
    </div>
    <div class="section-footer">
        <div class="container" data-inview-showup="showup-translate-down">
            <ul class="page-path">
                <li><a href="index-2.html">Trang chủ</a></li>
                <li class="path-separator">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </li>
                <li>Hồ sơ</li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <nav class="user-dashboard-menu">
            <ul>
                <li class="menu-item">
                    <a href="dashboard.html">Bảng điều khiển</a>
                </li>
                <li class="menu-item"><a href="profile.html">Hồ sơ</a></li>
                <li class="menu-item"><a href="orders.html">Đơn hàng</a></li>
                <li class="menu-btn menu-stick-right">
                    <a class="btn btns-bordered-alt text-upper" href="new-ticket.html">Đăng xuất</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
<section class="shift-lg content-section">
    <div class="container">
        <form class="user-profile">
            <h4 class="text-upper" data-inview-showup="showup-translate-right">
                Thông tin cá nhân
            </h4>
            <div class="row cols-lg rows-md">
                <!-- Hình ảnh -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group field-type-image">
                        <label>Upload new avatar - JPEG 70x70</label>
                        <div class="field-wrap">
                            <input class="field-file-control" name="avatar" type="file" />
                            <input class="field-control" name="avatarPlaceholder" placeholder="No file choosen" />
                            <span class="field-addon-btn"><a class="field-file-btn text-upper btn" href="#">Choose
                                    file</a></span>
                            <span class="field-back"></span>
                            <div class="file-preview">
                                <div class="file-preview-image">
                                    <img src="assets/images/outsource/user-small.jpg" alt="" />
                                </div>
                                <div class="file-no-preview">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="file-preview-bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Họ và tên -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="fullName" placeholder="Họ và tên" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="sm-col-12" data-inview-showup="showup-translate-right">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="email" type="email" placeholder="Email"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
                <!-- Số điện thoại -->
                <div class="sm-col-12" data-inview-showup="showup-translate-left">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="phone" placeholder="Số điện thoại" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cols-lg rows-md">
                <div class="sm-col-6" data-inview-showup="showup-translate-right">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="company" placeholder="Company" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <textarea class="field-control" name="address" placeholder="Address"
                                required="required"></textarea>
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
                <div class="sm-col-6" data-inview-showup="showup-translate-left">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="town" placeholder="Town / City" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="zip" placeholder="Postcode / ZIP" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="country" placeholder="Country" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cols-lg rows-md">
                <div class="sm-col-6" data-inview-showup="showup-translate-right">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="password" type="password" placeholder="Password"
                                required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
                <div class="sm-col-6" data-inview-showup="showup-translate-left">
                    <div class="field-group">
                        <div class="field-wrap">
                            <input class="field-control" name="confirmPassword" type="password"
                                placeholder="Confirm Password" required="required" />
                            <span class="field-back"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shift-lg offs-lg" data-inview-showup="showup-translate-right"></div>
            <div data-inview-showup="showup-translate-right">
                <button class="btn md-col-2 text-upper" type="submit">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
</section>
<!-- Nút trở lên -->
<a href="#" class="scroll-top disabled"><i class="fas fa-angle-up" aria-hidden="true"></i></a>