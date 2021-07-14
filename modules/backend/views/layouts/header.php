<header id="page-header" class="bg-primary-darker">
    <div class="content-header">
        <div>
            <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
            </button>
        </div>
        <div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block"><?= Yii::$app->user->identity->ten_dang_nhap?></span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                        User Options
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['auth/auth/thong-tin-ca-nhan'])?>">
                            <i class="far fa-fw fa-user mr-1"></i> Thông tin cá nhân
                        </a>
                        <a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['auth/auth/doi-mat-khau'])?>">
                            <i class="fa fa-key mr-1"></i> Đổi mật khẩu
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl(['auth/auth/dang-xuat'])?>">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="page-header-search" class="overlay-header bg-primary-darker">
        <div class="bg-white-10">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
    </div>
</header>
