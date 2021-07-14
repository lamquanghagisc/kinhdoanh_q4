<?php ?>

<style>
    #map {
        width: 100%;
        height: 100%;
        min-height: 650px;
    }

    .height100 {
        height: 100%;
    }

    .no-padding {
        padding: 0px !important;
    }

    #geocomplete-wrapper {

        width: 500px;
    }
    #geocomplete { background-color: rgba(255,255,255,0.8); }

</style>
<div class="row">
   
    <div class="col-md-8 no-padding">
        <!-- BEGIN GEOCODING PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Bản đồ</span>
                   
                </div>
                <div class="actions">
                    <div class="input-group" id="geocomplete-wrapper">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" id='geocomplete' class="form-control input-circle" placeholder="Nhập vị trí cần tìm..."></div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="map" class="gmaps"> </div>
            </div>
        </div>
        <!-- END GEOCODING PORTLET-->
    </div>
    <div class="col-md-4 no-padding">
          <div class="portlet light bordered no-padding">
            <div class="tabbable-line form-group">
                <ul class="nav nav-tabs">
                    <li class="active" ><a data-toggle="tab" href="#hokinhdoanh">Hộ kinh doanh</a></li>
                    <li ><a data-toggle="tab" href="#doanhnghiep">Doanh nghiệp</a></li>

                    <li ><a data-toggle="tab" href="#thongke">Thống kê</a></li>
                </ul>
                <div class="tab-content" style="padding:0px">
                    <div class="tab-pane active" id="hokinhdoanh">
                        <div class="portlet-title">
                            <div class="col-lg-12">
                                <div class="caption" style='width: 100%; padding-top: 7px'>
                                    <input class="form-control" id='search-box' placeholder='Nhập thông tin hộ kinh doanh'>
                                    <span class="caption-subject font-dark bold uppercase"></span>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id='list_hokinhdoanh'></div>
                        </div>
                    </div>
                    <div class="tab-pane " id="doanhnghiep">
                        <div class="portlet-title">
                            <div class="col-lg-12">
                                <div class="caption" style='width: 100%; padding-top: 7px'>
                                    <input class="form-control" id='search-boxdn' placeholder='Nhập thông tin doanh nghiệp'>
                                    <span class="caption-subject font-dark bold uppercase"></span>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id='list_doanhnghiep'></div>
                        </div>
                    </div>

                    <div class="tab-pane " id="thongke">
                        <div class="portlet-body">
                            <div id='list_extend'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="ajaxModalContent">

        </div>
    </div>
</div>
<script>
    var defined = {
        layer_hokindoanh: "Hộ kinh doanh",
        layer_doanhnghiep: "Doanh nghiệp",
    };
    var DATA = {
        HomeUrl: "../",
        MapConfig: {
            mapId: "map",
            defaultCenter: [10.759610, 106.704339],
            defaultZoom: 13,
            defaultConfig: {maxZoom: 22},
            baseLayers: ["Bản đồ Google", "HCMGIS", "Ảnh vệ tinh", "MapBox"],
            overLayers: ["RanhThua","Cơ quan nhà nước", "Cơ sở giáo dục", "Cơ sở y tế", "Cơ sở tôn giáo", "Chợ", "Di tích lịch sử", "Trụ sở công an"],
            activeLayers: ["Bản đồ Google"],
            initOthers: [initHokinhdoanhGeojsonLayer, initDoanhnghiepGeojsonLayer, initDrawControl, initFocusCircleLayer, initMapZoomEvent, initMeasureControl],
            control: {
                geocomplete: {
                    InputId: "#geocomplete",
                    config: {
                        country: "vn"
                    }
                }
            }
        },
        MapLayer: {
            baselayer: {},
            overlayers: {},
        },
        MapControl: {},
        Refs: {
            Markers: [],
            LeafletLayers: {
                "HCMGIS": L.tileLayer.wms('http://pcd.hcmgis.vn/geoserver/ows?', {
                    layers: 'hcm_map:hcm_map'
                }),
                "Ảnh vệ tinh": L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                }),
                "MapBox": L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ#3/0.00/0.00', {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    id: 'streets-v9',
                }),
                "RanhThua": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:ranh_thua',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                  "Cơ sở giáo dục": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_coso_giaoduc',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Cơ sở y tế": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_coso_yte',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Cơ sở tôn giáo": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_coso_tongiao',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Cơ quan nhà nước": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_ubnd',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Chợ": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_cho',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Trụ sở công an": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_congan',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                    "Di tích lịch sử": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                        layers: 'dbkinhdoanh_q4:poi_ditich',
                        transparent: true,
                        format: 'image/png8',
                        maxZoom: 24,
                    }),
                "Bản đồ Google": L.tileLayer('http://{s}.google.com/vt/lyrs=' + 'r' + '&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }),
            }
        }
    };
    $(document).ready(function () {
        initMap();
        initListHokinhdoanh();
        initListDoanhnghiep();

    })

    function initMap(config) {
        if (typeof (config) == 'undefined') {
            config = DATA.MapConfig;
        }

        DATA[config.mapId] = {};
        DATA[config.mapId].Map = new L.Map(config.mapId, config.defaultConfig);
        DATA[config.mapId].Map.setView(config.defaultCenter, config.defaultZoom);
        DATA[config.mapId].Map.on('click', function (e) {
            console.log(e);
        });
        DATA[config.mapId].MapControl = {};
        DATA[config.mapId].MapLayer = {baseLayers: {}, overLayers: {}};

        initMapLayer(config);
        initMapControl(config);
        initOther(config);
    }

    function initOther(config) {
        config = DATA.MapConfig;
        config.initOthers.map(function (func) {
            func(config)
        });
    }

    function initMapControl(config) {
        initControlMapLayer(config);
        initControlGeocomplete(config);
    }

    function initMapLayer(config) {
        config.baseLayers.map(function (layer) {
            DATA[config.mapId].MapLayer.baseLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.overLayers.map(function (layer) {
            DATA[config.mapId].MapLayer.overLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.activeLayers.map(function (layer) {
            DATA.Refs.LeafletLayers[layer].addTo(DATA[config.mapId].Map);
        });
    }

    function initControlMapLayer(config) {
        DATA[config.mapId].MapControl.layercontrol = L.control.layers(DATA[config.mapId].MapLayer.baseLayers, DATA[config.mapId].MapLayer.overLayers);
        DATA[config.mapId].MapControl.layercontrol.addTo(DATA[config.mapId].Map);
    }

    function initControlGeocomplete(config) {
        if (typeof (config.control.geocomplete) == 'undefined')
            return;
        $(config.control.geocomplete.InputId)
                .geocomplete(config.control.geocomplete.config)
                .bind("geocode:result", function (event, result) {
                    DATA[config.mapId].Map.panTo([result.geometry.location.lat(), result.geometry.location.lng()]);
                    var marker = L.marker([result.geometry.location.lat(), result.geometry.location.lng()]);
                     var divIcon = L.divIcon({
                        iconSize: [40, 48],
                        iconAnchor: [20, 48],
                        popupAnchor: [0, -48],
                        html: '<div style="background: white;width: 40px;height: 40px;border-radius: 100%;font-size: 26px;"><img src="' + DATA.HomeUrl + '/resources/img/home.png"></div>'
                    });
                    marker.setIcon(divIcon);
                    marker.addTo(DATA[config.mapId].Map);
                });
    }

    function initHokinhdoanhGeojsonLayer(config) {
        $.ajax({
            url: DATA.HomeUrl + 'bando/hokinhdoanh-geojson',
            dataType: 'json',
            success: function (data) {
                var pruneCluster = new PruneClusterForLeaflet();
                data.map(function (item) {
                    var prunemarker = new PruneCluster.Marker(item.geo_y, item.geo_x, {title: "title"});
                    prunemarker.data = item;
                    pruneCluster.RegisterMarker(prunemarker);
                });
                DATA.Refs.LeafletLayers[defined.layer_hokindoanh] = pruneCluster;
                DATA[config.mapId].Map.addLayer(pruneCluster);
                DATA[config.mapId].MapControl.layercontrol.addOverlay(pruneCluster, defined.layer_hokindoanh);
                pruneCluster.PrepareLeafletMarker = function (leafletMarker, data) {
                    var popupid = 'marker-popup-' + data.id;
                    leafletMarker.bindPopup('<div id="' + popupid + '"></div>');
//                    leafletMarker.on('mouseover', function (e) {
//                        var popupid = 'marker-popup-' + data.id;
//                        //   mapZoomAndPanTo(data.geo_y, data.geo_x);
//                        $.ajax({
//                            url: DATA.HomeUrl + 'bando/hokinhdoanh-get/?slug=' + data.id,
//                            success: function (html) {
//                                $('#' + popupid).empty().append(html);
//                            }
//                        })
//                        this.openPopup();
//                    });
//                     leafletMarker.on('mouseout', function (e) {
//                       this.closePopup();
//                    });
                    leafletMarker.on('click', function () {
                        var popupid = 'marker-popup-' + data.id;
                        //  mapZoomAndPanTo(data.geo_y, data.geo_x);
                        $.ajax({
                            url: DATA.HomeUrl + 'bando/hokinhdoanh-get/?slug=' + data.id,
                            success: function (html) {
                                $('#' + popupid).empty().append(html);
                            }
                        })
                    });

                    var divIcon = L.divIcon({
                        iconSize: [40, 48],
                        iconAnchor: [20, 48],
                        popupAnchor: [0, -48],
                        html: '<div style="background: white;width: 40px;height: 40px;border-radius: 100%;font-size: 26px;"><img src="' + DATA.HomeUrl + '/resources/img/warehouse.png"></div>'
                    });
                    leafletMarker.setIcon(divIcon);
                    DATA.Refs.Markers[data.id] = leafletMarker;
                }
            }
        });
         DATA[config.mapId].Map.invalidateSize();
        
    }
    function initDoanhnghiepGeojsonLayer(config) {

        $.ajax({
            url: DATA.HomeUrl + 'bando/doanhnghiep-geojson',
            dataType: 'json',
            success: function (data) {
                var pruneCluster = new PruneClusterForLeaflet();
                data.map(function (item) {
                    var prunemarker = new PruneCluster.Marker(item.geo_y, item.geo_x);
                    prunemarker.data = item;
                    pruneCluster.RegisterMarker(prunemarker);
                });
                DATA.Refs.LeafletLayers[defined.layer_doanhnghiep] = pruneCluster;
                DATA[config.mapId].Map.addLayer(pruneCluster);
                DATA[config.mapId].MapControl.layercontrol.addOverlay(pruneCluster, defined.layer_doanhnghiep);
                pruneCluster.PrepareLeafletMarker = function (leafletMarker, data) {

                    var popupid = 'marker-popup-' + data.id;

                    leafletMarker.bindPopup('<div id="' + popupid + '"></div>');

//                    leafletMarker.on('mouseover', function (e) {
//                        var popupid = 'marker-popup-' + data.id;
//                        //   mapZoomAndPanTo(data.geo_y, data.geo_x);
//                        $.ajax({
//                            url: DATA.HomeUrl + 'bando/doanhnghiep-get/?slug=' + data.id,
//                            success: function (html) {
//                                $('#' + popupid).empty().append(html);
//                            }
//                        })
//                        this.openPopup();
//                    });
//                    leafletMarker.on('mouseout', function (e) {
//                        this.closePopup();
//                    });
                    leafletMarker.on('click', function () {
                        var popupid = 'marker-popup-' + data.id;
                        //  mapZoomAndPanTo(data.geo_y, data.geo_x);
                        $.ajax({
                            url: DATA.HomeUrl + 'bando/doanhnghiep-get/?slug=' + data.id,
                            success: function (html) {
                                $('#' + popupid).empty().append(html);
                            }
                        })
                    });
                    var divIcon = L.divIcon({
                        iconSize: [40, 48],
                        iconAnchor: [20, 48],
                        popupAnchor: [0, -48],
                        html: '<div style="background: white;width: 40px;height: 40px;border-radius: 100%;font-size: 26px;"><img src="' + DATA.HomeUrl + '/resources/img/company.png"></div>'
                    });
                    leafletMarker.setIcon(divIcon);
                    DATA.Refs.Markers[data.id] = leafletMarker;
                }
            }
        });
    }

    function convertDataToHokihdoanhGeojson(list) {
        var geojson = [];
        list.map(function (item) {
            geojson.push({
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [item.geo_y, item.geo_x]
                },
                properties: {
                    id: item.id,
                    id_nn: item.id_nn
                }
            });
        });
        return geojson;
    }
    function convertDataToDoanhnghiepGeojson(list) {
        var geojson = [];
        list.map(function (item) {
            geojson.push({
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [item.geo_y, item.geo_x]
                },
                properties: {
                    id: item.id,
                    id_nn: item.id_nn
                }
            });
        });
        return geojson;
    }


    function initListHokinhdoanh() {
        loadAjaxToDivListHokinhdoanh(DATA.HomeUrl + '/bando/list-hokinhdoanh');
        initSearchHokd();
    }
    function initListDoanhnghiep() {
        loadAjaxToDivListDoanhnghiep(DATA.HomeUrl + '/bando/list-doanhnghiep');
        initSearchDn();
    }

    function initPagAjaxDivListHokinhdoanh() {
        $('.pagination li a').on('click', function (e) {
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            loadAjaxToDivListHokinhdoanh(url);
            return false;
        });
    }
    function initPagAjaxDivListDoanhnghiep() {
        $('.pagination li a').on('click', function (e) {
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            loadAjaxToDivListDoanhnghiep(url);
            return false;
        });
    }


    function initHokdClickEvent() {
        $('.hokd-item').on('click', function () {
            var _this = $(this);
            var x = _this.attr('data-point-x');
            var y = _this.attr('data-point-y');
            if (typeof (x) != 'undefined')
                mapZoomAndPanTo(y, x, 20);
        });
    }

    function initDnClickEvent() {
        $('.dn-item').on('click', function () {
            var _this = $(this);
            var x = _this.attr('data-point-x');
            var y = _this.attr('data-point-y');
            if (typeof (x) != 'undefined')
                mapZoomAndPanTo(y, x, 20);
        });
    }

    function initDrawControl(config) {
        DATA.MapLayer.drawlayer = new L.FeatureGroup();
        DATA[config.mapId].Map.addLayer(DATA.MapLayer.drawlayer);
        DATA[config.mapId].MapControl.drawcontrol = new L.Control.Draw({
            draw: {
                polygon: false,
                marker: false,
                polyline: false,
                rectangle: false
            },
            edit: {
                featureGroup: DATA.MapLayer.drawlayer
            }
        });
        DATA[config.mapId].MapControl.drawcontrol.addTo(DATA[config.mapId].Map);
        DATA[config.mapId].Map.on('draw:created', function (e) {
            DATA.MapLayer.drawlayer.clearLayers();
            var type = e.layerType,
                    layer = e.layer;
            if (type === 'circle') {
                var theCenterPt = layer.getLatLng();
                var center = [theCenterPt.lng, theCenterPt.lat];
                layer.bindPopup('Bán kính: ' + Math.round(layer.getRadius()) + ' m <br> Tâm điểm:' + center);
            }
            DATA.MapLayer.drawlayer.addLayer(e.layer);
            callHokinhdoanhInCircle(e.layer._latlng.lat, e.layer._latlng.lng, e.layer._mRadius);
        });
    }
    function initMeasureControl(config) {
        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: undefined,
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: undefined,
            localization: 'tr',
            activeColor: '#e56666',
            completedColor: '#e56666',
        });
        measureControl.addTo(DATA[config.mapId].Map);


    }
    function callHokinhdoanhInCircle(lat, lng, radius) {
        $.ajax({
            url: DATA.HomeUrl + 'bando/hokinhdoanh-incircle?lat={0}&lng={1}&radius={2}'.replace('{0}', lat).replace('{1}', lng).replace('{2}', radius),
            success: function (html) {
                $('#list_extend').empty().append(html);
                activaTab('thongke');
            }
        })
    }
    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }
    ;
    function initSearchHokd() {
        $('#search-box').on('keypress', function (e) {
            if (e.keyCode == 13) {
                var q = $(this).val();
                loadAjaxToDivListHokinhdoanh(DATA.HomeUrl + '/bando/list-hokinhdoanh?q=' + q);
            }
        })
    }
    function initSearchDn() {
        $('#search-boxdn').on('keypress', function (e) {
            if (e.keyCode == 13) {
                var q = $(this).val();
                loadAjaxToDivListDoanhnghiep(DATA.HomeUrl + '/bando/list-doanhnghiep?q=' + q);
            }
        })
    }


    function loadAjaxToDivListHokinhdoanh(url) {
        var div = $('#list_hokinhdoanh');
        $.ajax({
            url: url,
            success: function (html) {
                div.empty().append(html);
                initPagAjaxDivListHokinhdoanh();
                initHokdClickEvent();
            }
        });
    }
    function loadAjaxToDivListDoanhnghiep(url) {
        var div = $('#list_doanhnghiep');
        $.ajax({
            url: url,
            success: function (html) {
                div.empty().append(html);
                initPagAjaxDivListDoanhnghiep();
                initDnClickEvent();
            }
        });
    }


    function HokinhdoanhView(id_hkd) {
        var url_cg = "<?= Yii::$app->homeUrl ?>hokinhdoanh/viewbando?id=" + id_hkd;
        $.get(url_cg, function (res) {
            $('#ajaxModalContent').empty().html(res);
            //  $('#myModalLabel').empty().html(name);
        })
    }

    function DoanhnghiepView(id_dn) {
        var url_cg = "<?= Yii::$app->homeUrl ?>doanhnghiep/viewbando?id=" + id_dn;
        $.get(url_cg, function (res) {
            $('#ajaxModalContent').empty().html(res);
            //  $('#myModalLabel').empty().html(name);
        })
    }

    function initFocusCircleLayer(config) {
        DATA.MapLayer.focuscirclelayer = L.circleMarker([0, 0], {radius: 25, fillColor: "red",
            color: "#000",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8});
        DATA[DATA.MapConfig.mapId].Map.addLayer(DATA.MapLayer.focuscirclelayer);
    }
    function initMapZoomEvent(config) {
        DATA[DATA.MapConfig.mapId].Map.on('zoomstart', function (e) {
            DATA.MapLayer.focuscirclelayer.zoomstart = DATA[DATA.MapConfig.mapId].Map.getZoom();
        });
        DATA[DATA.MapConfig.mapId].Map.on('zoomend', function (e) {
            DATA.MapLayer.focuscirclelayer.zoomend = DATA[DATA.MapConfig.mapId].Map.getZoom();
            var diff = DATA.MapLayer.focuscirclelayer.zoomend - DATA.MapLayer.focuscirclelayer.zoomstart;
            if (diff > 0) {
                DATA.MapLayer.focuscirclelayer.setRadius(DATA.MapLayer.focuscirclelayer.getRadius());
            } else if (diff < 0) {
                DATA.MapLayer.focuscirclelayer.setRadius(DATA.MapLayer.focuscirclelayer.getRadius());
            }

            DATA.Refs.LeafletLayers[defined.layer_hokindoanh].Cluster.Size = 10;
            DATA.Refs.LeafletLayers[defined.layer_hokindoanh].ProcessView(); // looks like it works OK without this line
        });
    }

    function mapZoomAndPanTo(x, y, zoom) {
        DATA[DATA.MapConfig.mapId].Map.setView([x, y], zoom);
        DATA.MapLayer.focuscirclelayer.setLatLng([x, y]);
    }
</script>