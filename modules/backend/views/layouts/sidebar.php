<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-primary-darker">
        <div class="content-header bg-white-10">
            <a href="<?= Yii::$app->homeUrl ?>">
                <img src="<?= Yii::$app->homeUrl ?>resources/img/layout4/logo_q1.png" alt="logo" width="180px"
                     class="logo-default"/> </a>
            <div>
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="js-sidebar-scroll" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div class="content-side">
                                <ul class="nav-main">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link active" href="<?= Yii::$app->homeUrl ?>">
                                            <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                            <span class="nav-main-link-name">Trang chủ</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-heading">Quản lý</li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                           aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                                            <span class="nav-main-link-name">Hộ kinh doanh</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['admin/hokinhdoanh/index']) ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-list"></i> <span
                                                            class="nav-main-link-name">Danh sách</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/hokinhdoanh/timkiem') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-search"></i> <span
                                                            class="nav-main-link-name">Tìm kiếm</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/hokinhdoanh/readexcel') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-upload"></i> <span
                                                            class="nav-main-link-name">Import dữ liệu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                           aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-building"></i>
                                            <span class="nav-main-link-name">Doanh nghiệp</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['admin/doanhnghiep/index']) ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-list"></i> <span
                                                            class="nav-main-link-name">Danh sách</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/doanhnghiep/timkiem') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-search"></i> <span
                                                            class="nav-main-link-name">Tìm kiếm</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/doanhnghiep/readexcel') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-upload"></i> <span
                                                            class="nav-main-link-name">Import dữ liệu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                           aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-car"></i>
                                            <span class="nav-main-link-name">Điểm giữ xe</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/diemgiuxe/index') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-list"></i> <span
                                                            class="nav-main-link-name">Danh sách</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/diemgiuxe/timkiem') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-search"></i> <span
                                                            class="nav-main-link-name">Tìm kiếm</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                           aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-building"></i>
                                            <span class="nav-main-link-name">Văn phòng cho thuê</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/vanphong/index') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-list"></i> <span
                                                            class="nav-main-link-name">Danh sách</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/vanphong/timkiem') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-search"></i> <span
                                                            class="nav-main-link-name">Tìm kiếm</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                           aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-newspaper"></i>
                                            <span class="nav-main-link-name">Tin tức và sự kiện</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a href="<?= Yii::$app->urlManager->createUrl('admin/tintuc/index') ?>"
                                                   class="nav-main-link">
                                                    <i class="nav-main-link-icon fa fa-list"></i> <span class="nav-main-link-name">Quản lý tin tức</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="nav-main-heading">Danh mục</li>

                                    <li class="nav-main-item">
                                          <a href="<?= Yii::$app->urlManager->createUrl('admin/dmlinhvuc/index') ?>"class="nav-main-link">
                                            <i class="nav-main-link-icon fa fa-list"></i>
                                            <span class="nav-main-link-name">Lĩnh vực quản lý</span>

                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a href="<?= Yii::$app->homeUrl ?>dmmanganh" class="nav-main-link">
                                            <i class="nav-main-link-icon fa fa-book"></i>
                                            <span class="nav-main-link-name">Mã ngành kinh tế</span>

                                        </a>
                                    </li>
                                    <li class="nav-main-heading">Thống kê</li>
                                    <li class="nav-main-item">
                                        <a href="<?= Yii::$app->homeUrl ?>thongke/tknganhnghe" class="nav-main-link">
                                            <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                            <span class="nav-main-link-name">Theo ngành nghề</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a href="<?= Yii::$app->homeUrl ?>thongke/tkphuong" class="nav-main-link">
                                            <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                            <span class="nav-main-link-name">Theo phường</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-heading">Tài khoản</li>

                                    <li class="nav-main-item">
                                        <a href="<?= Yii::$app->homeUrl ?>auth/quan-ly-tai-khoan/danh-sach"
                                           class="nav-main-link">
                                            <i class="nav-main-link-icon fa fa-users"></i>
                                            <span class="nav-main-link-name">Quản lý tài khoản</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 760px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 190px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>