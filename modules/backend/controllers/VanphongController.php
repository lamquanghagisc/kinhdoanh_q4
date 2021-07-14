<?php

namespace app\modules\backend\controllers;

use app\models\DmDanToc;
use app\models\DmLinhvuc;
use app\models\DmMaNganh;
use app\models\DmQuocTich;
use app\models\GiaoThong;
use app\models\RanhPhuong;
use app\models\ThongtinVipham;
use app\models\VanPhong;
use app\models\VanPhongSearch;
use app\models\VVanphong;
use app\modules\backend\base\BackendBaseController;
use app\services\UtilityService;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * DiemgiuxeController implements the CRUD actions for VanPhong model.
 */
class VanphongController extends BackendBaseController {

    /**
     * Lists all VanPhong models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new VanPhongSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTimkiem() {
    
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        $model['search'] = new VanPhongSearch();
        $dataProvider = $model['search']->search(Yii::$app->request->queryParams);
        return $this->render('timkiem', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $model['search'],
        ]);
    }

    /**
     * Displays a single VanPhong model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        $model['vanphong'] = $this->findVModel($id);
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the VanPhong model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VanPhong the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = VanPhong::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the VVanPhong model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VanPhong the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVModel($id) {
        if (($model = VVanphong::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewbando($id) {
        $request = Yii::$app->request;
        $model['vanphong'] = $this->findVModel($id);
        return $this->renderAjax('view_bando', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new VanPhong model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model['vanphong'] = new VanPhong();
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        if ($model['vanphong']->load($request->post())) {
            $model['vanphong']->save();
            UtilityService::alert('hkd_create_success');
            return $this->redirect(Yii::$app->urlManager->createUrl('vanphong/view') . '?id=' . $model['vanphong']->id_vanphong);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VanPhong model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $post = $request->post();
        $model['vanphong'] = $this->findModel($id);
        $model['toado'] = $this->findVModel($id);
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        if ($model['vanphong']->load($request->post())) {
            if ($post['ToaDo']['geo_x'] != null && $post['ToaDo']['geo_y'] != null) {
                $query = "update van_phong set geom = ST_GeomFromText('POINT(" . $post['ToaDo']['geo_x'] . " " . $post['ToaDo']['geo_y'] . ")') where id_vanphong = " . $model['vanphong']->id_vanphong;
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($query);
                $command->query();
                $connection->close();
            }
            $model['vanphong']->save();
            UtilityService::alert('hkd_update_success');
            return $this->redirect(['view', 'id' => $model['vanphong']->id_vanphong]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing VanPhong model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing VanPhong model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    public function actionGet($q = null, $id = null) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = DmMaNganh::find();
            $sqlWhere = "ma_nganh like '%' || '$q' || '%'";
//            DebugService::dumpdie($query->select("id_canhan AS id, concat(ho_ten, ' - ', NULL, dm_donvi.ten_donvi) AS text")->where($sqlWhere)->andWhere(['canhan.status' => 1]));
            $out['results'] = $query->select('ma_nganh AS id, manganh_daydu AS text')->where($sqlWhere)->asArray()->all();
        }

        return $out;
    }

    public function actionVipham($id) {
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('vanphong'));
        }

        $model['vipham'] = ThongtinVipham::find()->where(['hkd_id' => $id])->orderBy('id_ttvp')->all();
        $model['id_vanphong'] = $id;
        return $this->renderPartial('inc_update/vipham', [
                    'model' => $model,
        ]);
    }

    public function actionCreatevipham($id) {
        $request = Yii::$app->request;
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('vanphong'));
        }

        $model['vipham'] = new ThongtinVipham();
        if ($model['vipham']->load(Yii::$app->request->post())) {
            // date_default_timezone_set('Asia/Ho_chi_minh');
            $model['vipham']->hkd_id = $id;
            //  $model['vipham']->created_by = Yii::$app->user->id;
            // $model['vipham']->created_at = date('Y-m-d H:i:s');
            $model['vipham']->save();
            UtilityService::alert('vipham_create_success');
            return true;
        }
        if (!$request->isAjax && $request->isGet) {
            return $this->render('inc_update/createvipham', [
                        'model' => $model,
            ]);
        }
        return $this->renderAjax('inc_update/createvipham', [
                    'model' => $model,
        ]);
    }

    public function actionUpdatevipham($id) {
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('vanphong'));
        }
        $model['vipham'] = ThongtinVipham::findOne($id);
        if ($model['vipham']->load(Yii::$app->request->post())) {
//            date_default_timezone_set('Asia/Ho_chi_minh');
//            $model['vipham']->updated_by = Yii::$app->user->id;
//            $model['vipham']->updated_at = date('Y-m-d H:i:s');
            $model['vipham']->save();
            UtilityService::alert('vipham_update_success');
            return true;
        }

        return $this->renderAjax('inc_update/updatevipham', [
                    'model' => $model,
        ]);
    }

    public function actionDeletevipham($id) {
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('vanphong'));
        }
        $model['vipham'] = ThongtinVipham::findOne($id);
        if ($model['vipham']->load(Yii::$app->request->post())) {

            $model['vipham']->delete();
            UtilityService::alert('vipham_update_success');
            return true;
        }

        return $this->renderAjax('inc_update/deletevipham', [
                    'model' => $model,
        ]);
    }

}
