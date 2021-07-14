<?php


use yii\helpers\Html;
use app\modules\backend\assets\BackendAssets;
use yii\widgets\Breadcrumbs;

BackendAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed side-trans-enabled"><div id="page-overlay"></div>
    <?php include('sidebar.php'); ?>
    <?php include('header.php'); ?>
    <main id="main-container">
        <div class="content">
            <div class="block">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <?=
                        Breadcrumbs::widget([
                            'tag' => 'ol',
                            'homeLink' => [
                                'label' => Html::encode(Yii::t('yii', 'Trang chủ')),
                                'url' => Yii::$app->urlManager->createUrl(['admin/dashboard/index']),
                                'encode' => false,
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>",
                            'activeItemTemplate' => "<li class='active breadcrumb-item'>{link}</li>",
                            'options' => [
                                'class' => 'breadcrumb breadcrumb-alt',
                            ]
                        ])
                        ?>
                    </nav>
                </div>
            </div>

            <?= $content?>
        </div>
    </main>

    <?php include('footer.php'); ?>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
