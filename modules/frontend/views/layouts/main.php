<?php


use yii\helpers\Html;
use app\modules\frontend\assets\FrontendAssets;
use yii\widgets\Breadcrumbs;

FrontendAssets::register($this);
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
<div id="page-container" class="page-header-dark main-content-boxed side-trans-enabled">
    <div id="page-overlay"></div>
    <?php include('header.php'); ?>
    <main id="main-container">
        <?php include('menu.php'); ?>
        <?php if (isset($this->params['breadcrumbs'])): ?>
            <div class="content content-full padding-b-0">
                <div class="block">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <?=
                            Breadcrumbs::widget([
                                'tag' => 'ol',
                                'homeLink' => [
                                    'label' => Html::encode(Yii::t('yii', 'Trang chủ')),
                                    'url' => Yii::$app->urlManager->createUrl(['user/site/index']),
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
            </div>
        <?php endif; ?>
        <?= $content ?>
    </main>

    <?php include('footer.php'); ?>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
