<?php

namespace app\modules\frontend\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmLinhvuc;
use app\models\HoKinhDoanh;
use app\modules\frontend\base\FrontendBaseController;
use app\services\DebugService;
use app\services\DiemgiuxeService;
use app\services\DoanhnghiepService;
use app\services\HokinhdoanhService;
use app\services\PoiService;
use app\services\SecurityService;
use app\services\VanphongService;
use Yii;
use yii\db\Exception;
use yii\db\Query;


class MapController extends FrontendBaseController
{

    public function actionBando()
    {
        $model['giaothong'] = HoKinhDoanh::find()->select('ten_duong')->distinct()->all();
        $model['linhvuc'] = DmLinhvuc::find()->all();
        return $this->render('bando', [
            'model' => $model
        ]);
    }

    public function actionDoanhnghiepGeojson()
    {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_doanhnghiep = DoanhnghiepService::getListDoanhnghiepGeojson();
            return json_encode($list_doanhnghiep);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionListDoanhnghiep()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        $t = Yii::$app->request->get('t', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = DoanhnghiepService::getListDoanhnghiep($q, $t);
        }
        return $this->renderPartial("_list-doanhnghiep", $models);
    }

    public function actionDoanhnghiepGet()
    {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = DoanhnghiepService::getDoanhnghiep($slug);
        }
        return $this->renderPartial("_item-doanhnghiep", ["model" => $model]);
    }

    public function actionHokinhdoanhGeojson()
    {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_hokinhdoanh = HokinhdoanhService::getListHoKinhdoanhGeojson();
            return json_encode($list_hokinhdoanh);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionZoomGiaothong()
    {
        $tenduong = Yii::$app->request->get('tenduong', null);
        $rows = (new \yii\db\Query())
            ->select(['ST_AsGeoJSON(geom) as geom'])
            ->from('giao_thong')
            ->where(['tenduong' => $tenduong])
            ->all();
        return json_encode($rows);
    }

    public function actionDiemgiuxeGeojson()
    {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_diemgiuxe = DiemgiuxeService::getListDiemgiuxeGeojson();
            return json_encode($list_diemgiuxe);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionVanphongGeojson()
    {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_vanphong = VanphongService::getListVanphongGeojson();
            return json_encode($list_vanphong);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionHokinhdoanhFilter()
    {
        $q = Yii::$app->request->get('q', null);
        $t = Yii::$app->request->get('t', null);
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_hokinhdoanh = HokinhdoanhService::getFilterHoKinhdoanhGeojson($q, $t);
            return json_encode($list_hokinhdoanh);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionDoanhnghiepFilter()
    {
        $q = Yii::$app->request->get('q', null);
        $t = Yii::$app->request->get('t', null);
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_doanhnghiep = DoanhnghiepService::getFilterDoanhnghiepGeojson($q, $t);
            return json_encode($list_doanhnghiep);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionSearchHokinhdoanh()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = HokinhdoanhService::getSearchHokinhdoanh($q);
        }
        return $this->renderPartial("_list-hokinhdoanh", $models);
    }

    public function actionSearchDoanhnghiep()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = DoanhnghiepService::getSearchDoanhnghiep($q);
        }
        return $this->renderPartial("_list-doanhnghiep", $models);
    }

    public function actionListHokinhdoanh()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        $t = Yii::$app->request->get('t', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = HokinhdoanhService::getListHoKinhdoanh($q, $t);
        }
        return $this->renderPartial("_list-hokinhdoanh", $models);
    }

    public function actionHokinhdoanhGet()
    {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = HokinhdoanhService::getHoKinhdoanh($slug);
        }
        return $this->renderPartial("_item-hokinhdoanh", ["model" => $model]);
    }

    //////diemgiuxe
    public function actionListDiemgiuxe()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = DiemgiuxeService::getListDiemgiuxe($q);
        }
        return $this->renderPartial("_list-diemgiuxe", $models);
    }

    public function actionDiemgiuxeGet()
    {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = DiemgiuxeService::getDiemgiuxe($slug);
        }
        return $this->renderPartial("_item-diemgiuxe", ["model" => $model]);
    }

    ///vanphong
    public function actionListVanphong()
    {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = VanphongService::getListVanphong($q);
        }
        return $this->renderPartial("_list-vanphong", $models);
    }

    public function actionVanphongGet()
    {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = VanphongService::getVanphong($slug);
        }
        return $this->renderPartial("_item-vanphong", ["model" => $model]);
    }

    public function actionThuoclaIncircle()
    {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $nganhnghe = Yii::$app->request->get('nganhnghe', null);
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $sql_nganhnghe = "linhvuc_id =$nganhnghe";
                $pois = PoiService::$ARRAY_THUOCLA;
                $count = [];
                foreach ($pois as $poi_name => $poi_title) {
                    if ($poi_title == "Hộ kinh doanh thuốc lá") {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->andWhere($sql_nganhnghe)->count(), 'title' => $poi_title];
                    } else {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->count(), 'title' => $poi_title];
                    }
                    // DebugService::dumpdie($count[$poi_name]);
                }
                if (isset($json)) {
                    return json_encode(['data' => $count]);
                }
                return $this->renderPartial('table-count-incircle', ['data' => $count, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'nganhnghe' => $nganhnghe]]);
            }
        } catch (Exception $e) {
            DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'Không tìm thấy']);
    }

    public function actionDientuIncircle()
    {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $nganhnghe = Yii::$app->request->get('nganhnghe', null);
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $sql_nganhnghe = "linhvuc_id =$nganhnghe";
                $pois = PoiService::$ARRAY_DIENTU;
                $count = [];
                foreach ($pois as $poi_name => $poi_title) {
                    if ($poi_title == "Hộ kinh doanh điện tử") {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->andWhere($sql_nganhnghe)->count(), 'title' => $poi_title];
                    } else {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->count(), 'title' => $poi_title];
                    }
                    // DebugService::dumpdie($count[$poi_name]);
                }
                if (isset($json)) {
                    return json_encode(['data' => $count]);
                }
                return $this->renderPartial('table-count-incircle', ['data' => $count, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'nganhnghe' => $nganhnghe]]);
            }
        } catch (Exception $e) {
            DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'Không tìm thấy']);
    }

    public function actionVutruongIncircle()
    {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $nganhnghe = Yii::$app->request->get('nganhnghe', null);
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $sql_nganhnghe = "linhvuc_id =$nganhnghe";
                $pois = PoiService::$ARRAY_VUTRUONG;
                $count = [];
                foreach ($pois as $poi_name => $poi_title) {
                    if ($poi_title == "Hộ kinh doanh vũ trường") {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->andWhere($sql_nganhnghe)->count(), 'title' => $poi_title];
                    } else {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->count(), 'title' => $poi_title];
                    }
                    // DebugService::dumpdie($count[$poi_name]);
                }
                if (isset($json)) {
                    return json_encode(['data' => $count]);
                }
                return $this->renderPartial('table-count-incircle', ['data' => $count, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'nganhnghe' => $nganhnghe]]);
            }
        } catch (Exception $e) {
            DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'Không tìm thấy']);
    }

    public function actionHokinhdoanhIncircle()
    {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $nganhnghe = Yii::$app->request->get('nganhnghe', null);
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $sql_nganhnghe = "linhvuc_id =$nganhnghe";
                $pois = PoiService::$ARRAY_POI;
                $count = [];
                foreach ($pois as $poi_name => $poi_title) {
                    if ($poi_title == "Hộ kinh doanh") {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->andWhere($sql_nganhnghe)->count(), 'title' => $poi_title];
                    } else {
                        $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->count(), 'title' => $poi_title];
                    }
                    // DebugService::dumpdie($count[$poi_name]);
                }
                if (isset($json)) {
                    return json_encode(['data' => $count]);
                }
                return $this->renderPartial('table-count-incircle', ['data' => $count, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'nganhnghe' => $nganhnghe]]);
            }
        } catch (Exception $e) {
            DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'Không tìm thấy']);
    }

    public function actionPoidetailIncircle()
    {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $poi = Yii::$app->request->get('poi', null);
        $nganhnghe = Yii::$app->request->get('nganhnghe', null);
        $pois = PoiService::$ARRAY_POI;
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius) && array_key_exists($poi, $pois)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $sql_nganhnghe = "linhvuc_id = $nganhnghe";
                if ($poi == "v_hokinhdoanh") {
                    $models = (new Query())->select(['*, st_x(geom) as geo_x, st_y(geom) as geo_y, ST_Distance(st_transform(st_setsrid(st_makepoint(' . $lng . ',' . $lat . '), 4326), 32648),st_transform(st_setsrid(geom, 4326),32648))  as dist'])->from($poi)->where($sql_contains)->andWhere($sql_nganhnghe)->all();
                } else {
                    $models = (new Query())->select(['*, st_x(geom) as geo_x, st_y(geom) as geo_y, ST_Distance(st_transform(st_setsrid(st_makepoint(' . $lng . ',' . $lat . '), 4326), 32648),st_transform(st_setsrid(geom, 4326),32648))  as dist'])->from($poi)->where($sql_contains)->all();
                }

                if (isset($json)) {
                    return json_encode(['data' => $models]);
                }
                return $this->renderPartial('poidetail-incircle', ['data' => $models, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'poi' => $poi, 'nganhnghe' => $nganhnghe]]);
            }
        } catch (Exception $e) {
            DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'not found']);
    }

    public function decodeSoapData($data, $name)
    {
        // $data = $client->$name();
        return json_decode($data->{$name . 'Result'});
    }

}
