<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 4/22/2017
 * Time: 10:15 AM
 */
?>

<div class="page-footer-inner"> 2018 &copy;
    <a href="http://hcmgisportal.vn/" target="_blank" class="uppercase">Trung tâm ứng dụng hệ thống thông tin địa lý thành phố hồ chí minh</a>

</div>
<div class="pull-right" style="color:white;padding: 0px 0px 0px 0px">
    <i class="fa fa-bar-chart"></i> Tổng số truy cập: <?php echo Yii::$app->userCounter->getTotal(); ?></br>
    <i class="fa fa-bar-chart"></i> Truy cập hôm nay: <?php echo Yii::$app->userCounter->getToday(); ?></br>
    <i class="fa fa-bar-chart"></i> Đang truy cập: <?php echo Yii::$app->userCounter->getOnline(); ?></br>   
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>