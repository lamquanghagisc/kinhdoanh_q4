<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
    <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="1349"><?= $hkd ?></span>
                    </h3>
                    <small><a href="<?= Yii::$app->homeUrl ?>hokinhdoanh">Hộ kinh doanh</a></small>
                </div>
                <div class="icon">
                    <i class="fa fa-user-circle-o"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="1349"><?= $dn ?></span>
                    </h3>
                    <small><a href="<?= Yii::$app->homeUrl ?>doanhnghiep">Doanh nghiệp</a></small>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Theo ngành nghề</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_nn" class="" style="height: 600px;width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Theo ngành nghề</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_nn_dn" class="" style="height: 600px;width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Theo phường</span>
                </div>
                <div class="actions">

                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_p" class="" style="height: 400px;width: 100%"></div>
            </div>
        </div>
    </div>
      <div class="col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Theo phường</span>
                </div>
                <div class="actions">

                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_p_dn" class="" style="height: 400px;width: 100%"></div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
<script>

    var chart_nn = AmCharts.makeChart("chart_nn", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": <?= json_encode($tknganhnghe, JSON_UNESCAPED_UNICODE) ?>,
        "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "title": "Số hộ kinh doanh"
            }],
        "startDuration": 1,
        "graphs": [{
                "balloonText": "<b>[[ten_linhvuc]]: [[sl_hokinhdoanh]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "sl_hokinhdoanh"
            }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "ten_linhvuc",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45,
        },
        "export": {
            "enabled": true
        }

    });
    var chart_nn_dn = AmCharts.makeChart("chart_nn_dn", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": <?= json_encode($tknganhnghedn, JSON_UNESCAPED_UNICODE) ?>,
        "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "title": "Số doanh nghiệp"
            }],
        "startDuration": 1,
        "graphs": [{
                "balloonText": "<b>[[ten_linhvuc]]: [[sl_doanhnghiep]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "sl_doanhnghiep"
            }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "ten_linhvuc",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45,
        },
        "export": {
            "enabled": true
        }

    });


    var chart_p = AmCharts.makeChart("chart_p", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": <?= json_encode($tkphuong, JSON_UNESCAPED_UNICODE) ?>,
        "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "title": "Số hộ kinh doanh"
            }],
        "startDuration": 1,
        "graphs": [{
                "balloonText": "<b>[[ten_phuong]]: [[sl_hokinhdoanh]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "sl_hokinhdoanh"
            }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "ten_phuong",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45,
        },
        "export": {
            "enabled": true
        }

    });
    var chart_p_dn = AmCharts.makeChart("chart_p_dn", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": <?= json_encode($tkphuongdn, JSON_UNESCAPED_UNICODE) ?>,
        "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "title": "Số doanhnghiep"
            }],
        "startDuration": 1,
        "graphs": [{
                "balloonText": "<b>[[ten_phuong]]: [[sl_doanhnghiep]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "sl_doanhnghiep"
            }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "ten_phuong",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45,
        },
        "export": {
            "enabled": true
        }

    });
</script>