<header id="page-header" class="bg-xmodern-darker">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <a href="<?= Yii::$app->homeUrl ?>">
                <img src="<?= Yii::$app->homeUrl ?>resources/img/layout4/logo_q1.png" alt="logo" width="180px"
                     class="logo-default"/>  </a>
        </div>
        <div>
            <div class="dropdown d-inline-block">
                <?php if(Yii::$app->user->isGuest):?>
                <a href="<?= Yii::$app->urlManager->createUrl(['auth/auth/dang-nhap'])?>" class="btn btn-dual">
                    <span class="d-none d-sm-inline mr-1">Đăng nhập</span>
                    <span class="fa fa-lock"></span>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search your websites.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-spinner fa-spin text-white"></i>
            </div>
        </div>
    </div>
</header>