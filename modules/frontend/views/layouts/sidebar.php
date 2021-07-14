<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <a class="font-w600 text-white tracking-wide" href="<?= Yii::$app->homeUrl?>">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                    Dash<span class="opacity-75">mix</span>
                </span>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                            <div class="content-side">
                                <ul class="nav-main">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link active" href="<?= Yii::$app->homeUrl?>">
                                            <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                            <span class="nav-main-link-name">Trang chủ</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/dashboard/store'])?>">
                                            <i class="nav-main-link-icon fa fa-list-alt"></i>
                                            <span class="nav-main-link-name">Tồn kho</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-heading">Base</li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/kho/index'])?>">
                                            <i class="nav-main-link-icon fa fa-archive"></i>
                                            <span class="nav-main-link-name">Kho</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/don-hang/index'])?>">
                                            <i class="nav-main-link-icon fa fa-file-alt"></i>
                                            <span class="nav-main-link-name">Đơn hàng</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/khach-hang/index'])?>">
                                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                                            <span class="nav-main-link-name">Khách hàng</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-list"></i>
                                            <span class="nav-main-link-name">Danh mục</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/categories/san-pham/index'])?>">
                                                    <span class="nav-main-link-name">Sản phẩm</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/categories/hang-san-xuat/index'])?>">
                                                    <span class="nav-main-link-name">Hãng sản xuất</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/categories/loai-san-pham/index'])?>">
                                                    <span class="nav-main-link-name">Loại sản phẩm</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/categories/nhom-san-pham/index'])?>">
                                                    <span class="nav-main-link-name">Nhóm sản phẩm</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-heading">Lịch sử</li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="<?= Yii::$app->urlManager->createUrl(['admin/da-ban/index'])?>">
                                            <i class="nav-main-link-icon fa fa-archive"></i>
                                            <span class="nav-main-link-name">Đã bán</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 760px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 190px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
</nav>
