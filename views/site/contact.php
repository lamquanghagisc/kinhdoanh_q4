<div class="row ">

    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/banner/1.jpg" />
            </div>
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/banner/2.jpg" />
            </div>
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/banner/3.jpg" />
            </div>
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/banner/4.jpg" />
            </div>
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/5.original.jpg" />
            </div>
            <div>
                <img data-u="image" src="<?= Yii::$app->homeUrl ?>resources/img/6.original.jpg" />
            </div>

        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script>
        jQuery(document).ready(function ()
        {
            jssor_1_slider_init();
        }
        );
    </script>
</div>


<div class="row ">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" fa fa-building-o font-red-flamingo"></i>
                <span class="caption-subject font-red-flamingo bold uppercase">Tin tức và sự kiện</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <?php foreach ($model['tin_tuc'] as $model['tin_tuc']): ?>  
                <div class="col-md-3 bordered ">
                    <h3 class="mt-username"> <a href="<?= $model['tin_tuc']->duong_dan ?>"> <?= $model['tin_tuc']->tieu_de ?></a></h3>  
                    <p class="mt-user-title"> <?= $model['tin_tuc']->tom_tat ?> </p>
                </div>
               <?php endforeach; ?>  
            </div>
        </div>

    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" fa fa-building-o font-red-flamingo"></i>
                <span class="caption-subject font-red-flamingo bold uppercase">Doanh nghiệp tiêu biểu (<?= $totalcount ?>)</span>
            </div>
        </div>
        <div class="portlet-body">
         
            
            
            
            <div class="row">
                <div class="mt-element-list dn-list">
                    <div class="mt-list-container list-simple ext-1 dn-list" style='max-height: 400px; overflow: auto'>
                        <?php foreach ($model['doanhnghiep_tieubieu'] as $model['doanhnghiep_tieubieu']): ?>  
                        <div class="col-md-6 ">
                         <div class="general-item-list">
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic rounded" src="<?= Yii::$app->homeUrl ?>resources/img/logo_doanhnghiep.jpg">
                                                        <div class="item-name primary-link"><?= $model['doanhnghiep_tieubieu']->ten_dn ?></div>
                                                   
                                                    </div>
                                                   
                                                </div>
                                                <a class="item-body custom-element-load-ajax-div" data-toggle="modal" data-target="#ajaxModal" data-target-div="#ajaxModalContent" data-url="<?= Yii::$app->urlManager->createUrl('site/vitri') . '?id=' . $model['doanhnghiep_tieubieu']->id_doanhnghiep ?>"> <i class="fa fa-map-marker"></i> Địa chỉ: <?= (($model['doanhnghiep_tieubieu']->so_nha == NULL) ? '' : $model['doanhnghiep_tieubieu']->so_nha . ', ') . (($model['doanhnghiep_tieubieu']->ten_duong == NULL) ? '' : $model['doanhnghiep_tieubieu']->ten_duong . ', ') . (($model['doanhnghiep_tieubieu']->ten_phuong == NULL) ? '' : $model['doanhnghiep_tieubieu']->ten_phuong) ?></a>
                                            </div>
                                         
                                        </div>
                        
                                <!--end: widget 1-3 -->
                            </div>
                        <?php endforeach; ?>  
                    </div></div>
            </div>


        </div>

        <div style="clear: both"></div>
    </div>

</div>
<div class="modal fade" id="ajaxModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="ajaxModalContent">

        </div>
    </div>
</div>


<script type="text/javascript">

    jssor_1_slider_init = function () {

        var jssor_1_SlideshowTransitions = [
            {$Duration: 500, $Delay: 30, $Cols: 8, $Rows: 4, $Clip: 15, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2049, $Easing: $Jease$.$OutQuad},
            {$Duration: 500, $Delay: 80, $Cols: 8, $Rows: 4, $Clip: 15, $SlideOut: true, $Easing: $Jease$.$OutQuad},
            {$Duration: 1000, x: -0.2, $Delay: 40, $Cols: 12, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad}, $Opacity: 2, $Outside: true, $Round: {$Top: 0.5}},
            {$Duration: 2000, y: -1, $Delay: 60, $Cols: 15, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: $Jease$.$OutJump, $Round: {$Top: 1.5}},
            {$Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]}, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: {$Left: $Jease$.$InWave, $Top: $Jease$.$InWave, $Clip: $Jease$.$OutQuad}, $Round: {$Left: 1.3, $Top: 2.5}}
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 3000;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    }
    ;

</script>
<style>
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }


    .jssorb053 .i {position:absolute;cursor:pointer;}
    .jssorb053 .i .b {fill:#fff;fill-opacity:0.5;}
    .jssorb053 .i:hover .b {fill-opacity:.7;}
    .jssorb053 .iav .b {fill-opacity: 1;}
    .jssorb053 .i.idn {opacity:.3;}

    .jssora093 {display:block;position:absolute;cursor:pointer;}
    .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
    .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
    .jssora093:hover {opacity:.8;}
    .jssora093.jssora093dn {opacity:.6;}
    .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
</style>