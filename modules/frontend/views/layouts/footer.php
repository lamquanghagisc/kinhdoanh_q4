<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row font-size-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                Tổng số truy cập: <?php echo Yii::$app->userCounter->getTotal(); ?></br>
                Truy cập hôm nay: <?php echo Yii::$app->userCounter->getToday(); ?></br>
                Đang truy cập: <?php echo Yii::$app->userCounter->getOnline(); ?></br>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                <a class="font-w600" href="https://hcmgis.vn" target="_blank">HCMGIS</a> © <span data-toggle="year-copy" class="js-year-copy-enabled">2021</span>
            </div>
        </div>
    </div>
</footer>