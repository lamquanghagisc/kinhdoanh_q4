<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAssetMap;

AppAssetMap::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Quản lý kinh doanh quận 4</title>
        <?php $this->head() ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVofCmO1bDdRaP5bMhwrZ-pEAi9AEhAgQ&libraries=places&regions=country:vn"></script>
    </head>
    <body onunload="" class="map-fullscreen page-homepage navigation-off-canvas page-fade-in" id="page-top">

        <!-- Outer Wrapper-->
        <div id="outer-wrapper">
            <!-- Inner Wrapper -->
            <div id="inner-wrapper">
                <!-- Navigation-->
                <div class="header">
                    <div class="wrapper">
                        <div class="brand">
                            <a href="http://themestarz.net/html/spotter/index-real-estate.html"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-real-estate.png" alt="logo"></a>
                        </div>
                        <nav class="navigation-items">
                            <div class="wrapper">
                                <ul class="main-navigation navigation-top-header"></ul>
                                <ul class="user-area">
                                    <li><a href="http://themestarz.net/html/spotter/sign-in.html">Sign In</a></li>
                                    <li><a href="http://themestarz.net/html/spotter/register.html"><strong>Register</strong></a></li>
                                </ul>
                                <a href="http://themestarz.net/html/spotter/submit.html" class="submit-item">
                                    <div class="content"><span>Submit Your Item</span></div>
                                    <div class="icon">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </a>
                                <div class="toggle-navigation">
                                    <div class="icon">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- end Navigation-->
                <!-- Page Canvas-->
                <div id="page-canvas">

                    <!--Page Content-->
                    <div id="page-content">
                        <!-- Map Canvas-->
                        <div class="map-canvas list-solid" style="height: 899px;">
                            <!-- Map -->
                            <div class="map">
                                <div class="toggle-navigation">
                                    <div class="icon">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                                <!--/.toggle-navigation-->
                               
                           
                            </div>
                            <!-- end Map -->
                            <!--Items List-->
                            <div class="items-list mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; left: 0px; top: 0px;" dir="ltr">
                                        <div class="inner">
                                            <div class="filter">
                                                <form class="main-search" role="form" method="post" action="http://themestarz.net/html/spotter/index-real-estate.html?">
                                                    <header class="clearfix">
                                                        <h3 class="pull-left">Search</h3>
                                                    </header>
                                                   
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="type">Property Type</label>
                                                                <select name="type" multiple="" title="All" data-live-search="true" id="type" style="display: none;">
                                                                    <option value="1">Stores</option>
                                                                    <option value="2" class="sub-category">Apparel</option>
                                                                    <option value="3" class="sub-category">Computers</option>
                                                                    <option value="4" class="sub-category">Nature</option>
                                                                    <option value="5">Tourism</option>
                                                                    <option value="6">Restaurant &amp; Bars</option>
                                                                    <option value="7" class="sub-category">Bars</option>
                                                                    <option value="8" class="sub-category">Vegetarian</option>
                                                                    <option value="9" class="sub-category">Steak &amp; Grill</option>
                                                                    <option value="10">Sports</option>
                                                                    <option value="11" class="sub-category">Cycling</option>
                                                                    <option value="12" class="sub-category">Water Sports</option>
                                                                    <option value="13" class="sub-category">Winter Sports</option>
                                                                </select><div class="btn-group bootstrap-select show-tick"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="type" title="Apparel, Computers, Vegetarian"><span class="filter-option pull-left">Apparel, Computers, Vegetarian</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open animation-fade-out" style="max-height: 717px; overflow: hidden; min-height: 158px;"><div class="bootstrap-select-searchbox"><input type="text" class="input-block-level form-control"></div><ul class="dropdown-menu inner selectpicker animation-fade-out" role="menu" style="max-height: 670px; overflow-y: auto; min-height: 111px;"><li rel="0" class=""><a tabindex="0" class="" style=""><span class="text">Stores</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1" class="selected"><a tabindex="0" class="sub-category" style=""><span class="text">Apparel</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2" class="selected"><a tabindex="0" class="sub-category" style=""><span class="text">Computers</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="3" class=""><a tabindex="0" class="sub-category" style=""><span class="text">Nature</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="4" class=""><a tabindex="0" class="" style=""><span class="text">Tourism</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="5" class=""><a tabindex="0" class="" style=""><span class="text">Restaurant &amp; Bars</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="6" class=""><a tabindex="0" class="sub-category" style=""><span class="text">Bars</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="7" class="selected"><a tabindex="0" class="sub-category" style=""><span class="text">Vegetarian</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="8"><a tabindex="0" class="sub-category" style=""><span class="text">Steak &amp; Grill</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="9"><a tabindex="0" class="" style=""><span class="text">Sports</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="10"><a tabindex="0" class="sub-category" style=""><span class="text">Cycling</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="11"><a tabindex="0" class="sub-category" style=""><span class="text">Water Sports</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="12"><a tabindex="0" class="sub-category" style=""><span class="text">Winter Sports</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!--/.col-md-6-->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="bedrooms">Bedrooms</label>
                                                                <div class="input-group counter">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="bedrooms" name="bedrooms" placeholder="Any">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                                                                    </span>
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!--/.col-md-3-->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="bathrooms">Bathrooms</label>
                                                                <div class="input-group counter">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="bathrooms" name="bathrooms" placeholder="Any">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                                                                    </span>
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!--/.col-md-3-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <div class="input-group location">
                                                                    <input type="text" class="form-control" id="location" placeholder="Enter Location" autocomplete="off">
                                                                    <span class="input-group-addon"><i class="fa fa-map-marker geolocation" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Find my position"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Price</label>
                                                                <div class="ui-slider noUi-target noUi-ltr noUi-horizontal noUi-background" id="price-slider" data-value-min="100" data-value-max="40000" data-value-type="price" data-currency="$" data-currency-placement="before">
                                                                    <div class="values clearfix">
                                                                        <input class="value-min" name="value-min[]" readonly="">
                                                                        <input class="value-max" name="value-max[]" readonly="">
                                                                    </div>
                                                                    <div class="element"></div>
                                                                    <div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 0%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 100%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!--/.col-md-6-->
                                                    </div>
                                                    <!--/.row-->
                                                </form>
                                                <!-- /.main-search -->
                                            </div>
                                            <!--end Filter-->
                                            <header class="clearfix">
                                                <h3 class="pull-left">Results</h3>
                                                <div class="buttons pull-right">
                                                    <span>Display:</span>
                                                    <span class="icon active" id="display-grid"><i class="fa fa-th"></i></span>
                                                    <span class="icon" id="display-list"><i class="fa fa-th-list"></i></span>
                                                </div>
                                            </header>
                                            <ul class="results grid"><li><div class="item" id="1"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">2</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">240<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/6.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="1"><h3>3295 Valley Street</h3></a><figure>Collingswood</figure><div class="price">$42.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="2"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">1</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">140<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/12.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="2"><h3>534 Roosevelt Street</h3></a><figure>San Francisco</figure><div class="price">$39.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/condominium.png" alt=""></i><span>Condominium</span></div><div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="4"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">2</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">1</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">168<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/8.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="4"><h3>1882 Trainer Avenue</h3></a><figure>Louisville</figure><div class="price">$3.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/office-building.png" alt=""></i><span>Building</span></div><div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="10"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">2</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">1</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">300<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/3.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="10"><h3>2494 Nancy Street</h3></a><figure>Wake Forest</figure><div class="price">$52.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="12"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">400<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/5.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="12"><h3>3316 West Virginia Avenue</h3></a><figure>Mineville</figure><div class="price">$67.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="13"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">400<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/6.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="13"><h3>1634 Winding Way</h3></a><figure>Pawtucket</figure><div class="price">$67.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="14"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">400<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/8.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="14"><h3>4692 Lynn Ogden Lane</h3></a><figure>Beaumont</figure><div class="price">$27.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="21"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">400<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/7.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="21"><h3>Big Luxury Apartment</h3></a><figure>Philadelphia</figure><div class="price">$250.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div></div></div></div></li><li><div class="item" id="22"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="image loaded"><div class="inner"><div class="item-specific"><span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png">1</span><span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png">2</span><span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png">400<sup>2</sup></span><span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png">1</span></div><img src="./Spotter - Universal Directory Listing HTML Template_files/7.jpg" alt=""></div></a><div class="wrapper"><a href="http://themestarz.net/html/spotter/index-real-estate.html#" id="22"><h3>Family Flat</h3></a><figure>Philadelphia</figure><div class="price">$34.000</div><div class="info"><div class="type"><i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i><span>Apartment</span></div><div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div></div></div></div></li></ul>
                                        </div>
                                        <!--results-->
                                    </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 331px; max-height: 849px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                            <!--end Items List-->
                        </div>
                        <!-- end Map Canvas-->
                        <!--Why Us-->
                        <section id="why-us" class="block">
                            <div class="container">
                                <header><h2>Why Us?</h2></header>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="feature-box">
                                            <i class="fa fa-thumbs-up"></i>
                                            <div class="description">
                                                <h3>Lorem ipsum dolor </h3>
                                                <p>
                                                    Praesent tempor a erat in iaculis. Phasellus vitae libero libero. Vestibulum ante
                                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                                </p>
                                            </div>
                                        </div>
                                        <!--/.feature-box-->
                                    </div>
                                    <!--/.col-md-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="feature-box">
                                            <i class="fa fa-folder"></i>
                                            <div class="description">
                                                <h3>Etiam vehicula felis a ipsum</h3>
                                                <p>
                                                    Pellentesque nisl quam, aliquet sed velit eu, varius condimentum nunc.
                                                    Nunc vulputate turpis ut erat egestas, vitae rutrum sapien varius.
                                                </p>
                                            </div>
                                        </div>
                                        <!--/.feature-box-->
                                    </div>
                                    <!--/.col-md-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="feature-box">
                                            <i class="fa fa-money"></i>
                                            <div class="description">
                                                <h3>Donec dolor justo, volutpat </h3>
                                                <p>
                                                    Maecenas quis ipsum lectus. Fusce molestie, metus ut consequat pulvinar,
                                                    ipsum quam condimentum leo, sit amet auctor lacus nulla at felis.
                                                </p>
                                            </div>
                                        </div>
                                        <!--/.feature-box-->
                                    </div>
                                    <!--/.col-md-4-->
                                </div>
                            </div>
                        </section>
                        <!--end Why Us-->
                        <!--Featured-->
                        <section id="featured" class="block background-color-white">
                            <div class="container">
                                <header><h2>Featured</h2></header>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="item featured equal-height">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/6.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>3295 Valley Street</h3></a>
                                                <figure>Collingswood</figure>
                                                <div class="price">$42.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="item featured equal-height">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/12.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>534 Roosevelt Street</h3></a>
                                                <figure>San Francisco</figure>
                                                <div class="price">$16.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="item featured equal-height">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>3019 White Avenue</h3></a>
                                                <figure>Corpus Christi</figure>
                                                <div class="price">$39.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="item featured equal-height">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/8.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>1882 Trainer Avenue</h3></a>
                                                <figure>Louisville</figure>
                                                <div class="price">$150.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                </div>
                            </div>
                        </section>
                        <!--end Featured-->
                        <!--Recent-->
                        <section id="recent" class="block">
                            <div class="container">
                                <header><h2>Recent</h2></header>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item list">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/10.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>431 Hardman Road</h3></a>
                                                <figure>Brattleboro</figure>
                                                <div class="price">$82.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item list">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/7.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>4282 River Road</h3></a>
                                                <figure>Springfield</figure>
                                                <div class="price">$57.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item list">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/9.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>2543 Fairfax Drive</h3></a>
                                                <figure>Elizabeth</figure>
                                                <div class="price">$486.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item list">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="./Spotter - Universal Directory Listing HTML Template_files/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="./Spotter - Universal Directory Listing HTML Template_files/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="./Spotter - Universal Directory Listing HTML Template_files/garages.png" alt="">1</span>
                                                    </div>
                                                    <img src="./Spotter - Universal Directory Listing HTML Template_files/11.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html"><h3>3295 Valley Street</h3></a>
                                                <figure>Collingswood</figure>
                                                <div class="price">$42.000</div>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                        <span>Apartment</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-md-6-->
                                </div>
                                <!--/.row-->
                            </div>
                            <!--/.container-->
                        </section>
                        <!--end Recent-->
                        <!--Promotion-->
                        <section class="block banner center">
                            <div class="container">
                                <h2 class="big">Submit Your Property Today!</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie ex vulputate, fermentum ipsum eget</p>
                                <a href="http://themestarz.net/html/spotter/submit.html" class="btn btn-default">Submit now</a>
                            </div>
                            <div class="background">
                                <img src="./Spotter - Universal Directory Listing HTML Template_files/real-estate-bg.png" alt="">
                            </div>
                        </section>
                        <!--end Promotion-->
                        <!--Our Team-->
                        <section class="block" id="the-team">
                            <div class="container">
                                <header class="no-border"><h3>The Team</h3></header>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="member">
                                            <img src="./Spotter - Universal Directory Listing HTML Template_files/member-1.jpg" alt="">
                                            <h4>Jane Daubert</h4>
                                            <figure>Company CEO</figure>
                                            <hr>
                                            <div class="social">
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-twitter"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-facebook"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                        <!--/.member-->
                                    </div>
                                    <!--/.col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="member">
                                            <img src="./Spotter - Universal Directory Listing HTML Template_files/member-2.jpg" alt="">
                                            <h4>Kristy Jose</h4>
                                            <figure>Marketing Specialist</figure>
                                            <hr>
                                            <div class="social">
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-twitter"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-facebook"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                        <!--/.member-->
                                    </div>
                                    <!--/.col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="member">
                                            <img src="./Spotter - Universal Directory Listing HTML Template_files/member-3.jpg" alt="">
                                            <h4>John Doe</h4>
                                            <figure>PR Manager</figure>
                                            <hr>
                                            <div class="social">
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-twitter"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-facebook"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                        <!--/.member-->
                                    </div>
                                    <!--/.col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="member">
                                            <img src="./Spotter - Universal Directory Listing HTML Template_files/member-4.jpg" alt="">
                                            <h4>Misty Bates</h4>
                                            <figure>Support</figure>
                                            <hr>
                                            <div class="social">
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-twitter"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-facebook"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                        <!--/.member-->
                                    </div>
                                    <!--/.col-md-3-->
                                </div>
                                <!--/.row-->
                            </div>
                            <!--/.container-->
                        </section>
                        <!--end Our Team-->
                        <!--Partners-->
                        <section id="partners" class="block">
                            <div class="container">
                                <header><h2>Partners</h2></header>
                                <div class="logos">
                                    <div class="logo"><a href="http://themestarz.net/html/spotter/index-real-estate.html#"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-partner-01.png" alt=""></a></div>
                                    <div class="logo"><a href="http://themestarz.net/html/spotter/index-real-estate.html#"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-partner-02.png" alt=""></a></div>
                                    <div class="logo"><a href="http://themestarz.net/html/spotter/index-real-estate.html#"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-partner-03.png" alt=""></a></div>
                                    <div class="logo"><a href="http://themestarz.net/html/spotter/index-real-estate.html#"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-partner-04.png" alt=""></a></div>
                                    <div class="logo"><a href="http://themestarz.net/html/spotter/index-real-estate.html#"><img src="./Spotter - Universal Directory Listing HTML Template_files/logo-partner-05.png" alt=""></a></div>
                                </div>
                            </div>
                            <!--/.container-->
                        </section>
                        <!--end Partners-->
                    </div>
                    <!-- end Page Content-->
                </div>
                <!-- end Page Canvas-->
                <!--Page Footer-->
                <footer id="page-footer">
                    <div class="inner">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <!--New Items-->
                                        <section>
                                            <h2>New Items</h2>
                                            <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html" class="item-horizontal small">
                                                <h3>Cash Cow Restaurante</h3>
                                                <figure>63 Birch Street</figure>
                                                <div class="wrapper">
                                                    <div class="image"><img src="./Spotter - Universal Directory Listing HTML Template_files/1(1).jpg" alt=""></div>
                                                    <div class="info">
                                                        <div class="type">
                                                            <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                            <span>Restaurant</span>
                                                        </div>
                                                        <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--/.item-horizontal small-->
                                            <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html" class="item-horizontal small">
                                                <h3>Blue Chilli</h3>
                                                <figure>2476 Whispering Pines Circle</figure>
                                                <div class="wrapper">
                                                    <div class="image"><img src="./Spotter - Universal Directory Listing HTML Template_files/2.jpg" alt=""></div>
                                                    <div class="info">
                                                        <div class="type">
                                                            <i><img src="./Spotter - Universal Directory Listing HTML Template_files/apartment-3.png" alt=""></i>
                                                            <span>Restaurant</span>
                                                        </div>
                                                        <div class="rating" data-rating="3"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--/.item-horizontal small-->
                                        </section>
                                        <!--end New Items-->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <!--Recent Reviews-->
                                        <section>
                                            <h2>Recent Reviews</h2>
                                            <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html#reviews" class="review small">
                                                <h3>Max Five Lounge</h3>
                                                <figure>4365 Bruce Street</figure>
                                                <div class="info">
                                                    <div class="rating" data-rating="4"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span></div>
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/restaurant.png" alt=""></i>
                                                        <span>Restaurant</span>
                                                    </div>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non suscipit felis, sed sagittis tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras ac placerat mauris.
                                                </p>
                                            </a><!--/.review-->
                                            <a href="http://themestarz.net/html/spotter/real-estate-item-detail.html#reviews" class="review small">
                                                <h3>Saguaro Tavern</h3>
                                                <figure>2476 Whispering Pines Circle</figure>
                                                <div class="info">
                                                    <div class="rating" data-rating="5"><span class="stars"><i class="fa fa-star s1 active" data-score="1"></i><i class="fa fa-star s2 active" data-score="2"></i><i class="fa fa-star s3 active" data-score="3"></i><i class="fa fa-star s4 active" data-score="4"></i><i class="fa fa-star s5 active" data-score="5"></i></span></div>
                                                    <div class="type">
                                                        <i><img src="./Spotter - Universal Directory Listing HTML Template_files/restaurant.png" alt=""></i>
                                                        <span>Restaurant</span>
                                                    </div>
                                                </div>
                                                <p>
                                                    Pellentesque mauris. Proin sit amet scelerisque risus. Donec semper semper erat ut mollis curabitur
                                                </p>
                                            </a>
                                            <!--/.review-->
                                        </section>
                                        <!--end Recent Reviews-->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <section>
                                            <h2>About Us</h2>
                                            <address>
                                                <div>Max Five Lounge</div>
                                                <div>63 Birch Street</div>
                                                <div>Granada Hills, CA 91344</div>
                                                <figure>
                                                    <div class="info">
                                                        <i class="fa fa-mobile"></i>
                                                        <span>818-832-5258</span>
                                                    </div>
                                                    <div class="info">
                                                        <i class="fa fa-phone"></i>
                                                        <span>+1 123 456 789</span>
                                                    </div>
                                                    <div class="info">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="http://themestarz.net/html/spotter/index-real-estate.html#">www.maxfivelounge.com</a>
                                                    </div>
                                                </figure>
                                            </address>
                                            <div class="social">
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="social-button"><i class="fa fa-twitter"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="social-button"><i class="fa fa-facebook"></i></a>
                                                <a href="http://themestarz.net/html/spotter/index-real-estate.html#" class="social-button"><i class="fa fa-pinterest"></i></a>
                                            </div>

                                            <a href="http://themestarz.net/html/spotter/contact.html" class="btn framed icon">Contact Us<i class="fa fa-angle-right"></i></a>
                                        </section>
                                    </div>
                                    <!--/.col-md-4-->
                                </div>
                                <!--/.row-->
                            </div>
                            <!--/.container-->
                        </div>
                        <!--/.footer-top-->
                        <div class="footer-bottom">
                            <div class="container">
                                <span class="left">(C) ThemeStarz, All rights reserved</span>
                                <span class="right">
                                    <a href="http://themestarz.net/html/spotter/index-real-estate.html#page-top" class="to-top roll"><i class="fa fa-angle-up"></i></a>
                                </span>
                            </div>
                        </div>
                        <!--/.footer-bottom-->
                    </div>
                </footer>
                <!--end Page Footer-->
            </div>
            <!-- end Inner Wrapper -->
        </div>
        <!-- end Outer Wrapper-->




        <!--[if lte IE 9]>
        <script type="text/javascript" src="assets/js/ie-scripts.js"></script>
        <![endif]-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
