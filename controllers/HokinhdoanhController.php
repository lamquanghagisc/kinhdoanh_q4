<?php

namespace app\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmDanToc;
use app\models\DmLinhvuc;
use app\models\DmMaNganh;
use app\models\DmQuocTich;
use app\models\DoanhNghiep;
use app\models\FileUpload;
use app\models\GiaoThong;
use app\models\HoKinhDoanh;
use app\models\HoKinhDoanhSearch;
use app\models\RanhPhuong;
use app\models\ThongtinVipham;
use app\models\VHokinhdoanh;
use app\services\DebugService;
use app\services\UtilityService;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * HokinhdoanhController implements the CRUD actions for HoKinhDoanh model.
 */
class HokinhdoanhController extends AbstractKinhdoanhq6Controller {

    /**
     * Lists all HoKinhDoanh models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new HoKinhDoanhSearch();
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
        $model['search'] = new HoKinhDoanhSearch();
        $dataProvider = $model['search']->search(Yii::$app->request->queryParams);
        return $this->render('timkiem', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $model['search'],
        ]);
    }

    /**
     * Displays a single HoKinhDoanh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        $model['hokinhdoanh'] = $this->findVModel($id);
        $model['vipham'] = ThongtinVipham::find()->where(['hkd_id' => $id])->orderBy('id_ttvp')->all();
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the HoKinhDoanh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HoKinhDoanh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = HoKinhDoanh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the VHoKinhDoanh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HoKinhDoanh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVModel($id) {
        if (($model = VHokinhdoanh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewbando($id) {
        $request = Yii::$app->request;
        $model['hokinhdoanh'] = $this->findVModel($id);
        $model['vipham'] = ThongtinVipham::find()->where(['hkd_id' => $id])->orderBy('id_ttvp')->all();

        return $this->renderAjax('view_bando', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new HoKinhDoanh model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model['hokinhdoanh'] = new HoKinhDoanh();
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        if ($model['hokinhdoanh']->load($request->post())) {
            if ($model['hokinhdoanh']->ngay_sinh != null) {
                $model['hokinhdoanh']->ngay_sinh = date('Y-m-d', strtotime($model['hokinhdoanh']->ngay_sinh));
            }
            if ($model['hokinhdoanh']->ngay_cap != null) {
                $model['hokinhdoanh']->ngay_cap = date('Y-m-d', strtotime($model['hokinhdoanh']->ngay_cap));
            }
            if ($model['hokinhdoanh']->ngaycap_giayphep != null) {
                $model['hokinhdoanh']->ngaycap_giayphep = date('Y-m-d', strtotime($model['hokinhdoanh']->ngaycap_giayphep));
            }
            $model['hokinhdoanh']->save();
            UtilityService::alert('hkd_create_success');
            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh/view') . '?id=' . $model['hokinhdoanh']->id_hkd);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HoKinhDoanh model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $post = $request->post();
        $model['hokinhdoanh'] = $this->findModel($id);
        $model['toado'] = $this->findVModel($id);
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        if ($model['hokinhdoanh']->load($request->post())) {
            if ($model['hokinhdoanh']->ngay_sinh != null) {
                $model['hokinhdoanh']->ngay_sinh = date('Y-m-d', strtotime($model['hokinhdoanh']->ngay_sinh));
            }
            if ($model['hokinhdoanh']->ngay_cap != null) {
                $model['hokinhdoanh']->ngay_cap = date('Y-m-d', strtotime($model['hokinhdoanh']->ngay_cap));
            }
            if ($model['hokinhdoanh']->ngaycap_giayphep != null) {
                $model['hokinhdoanh']->ngaycap_giayphep = date('Y-m-d', strtotime($model['hokinhdoanh']->ngaycap_giayphep));
            }
            if ($post['ToaDo']['geo_x'] != null && $post['ToaDo']['geo_y'] != null) {
                $query = "update ho_kinh_doanh set geom = ST_GeomFromText('POINT(" . $post['ToaDo']['geo_x'] . " " . $post['ToaDo']['geo_y'] . ")') where id_hkd = " . $model['hokinhdoanh']->id_hkd;
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($query);
                $command->query();
                $connection->close();
            }
            $model['hokinhdoanh']->save();
            UtilityService::alert('hkd_update_success');
            return $this->redirect(['view', 'id' => $model['hokinhdoanh']->id_hkd]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing HoKinhDoanh model.
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
     * Delete multiple existing HoKinhDoanh model.
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
            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh'));
        }

        $model['vipham'] = ThongtinVipham::find()->where(['hkd_id' => $id])->orderBy('id_ttvp')->all();
        $model['id_hkd'] = $id;
        return $this->renderPartial('inc_update/vipham', [
                    'model' => $model,
        ]);
    }

    public function actionCreatevipham($id) {
        $request = Yii::$app->request;
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh'));
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
            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh'));
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
            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh'));
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

    public function actionReadexcel() {
        $searchModel = new HoKinhDoanhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new FileUpload();
        $countUp = 0;
        $countIn = 0;
        if (\Yii::$app->request->isPost) {
            //    date_default_timezone_set('Asia/Ho_chi_minh');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
            $inputFileName = \Yii::$app->basePath . '/uploads/file/import/' . $model->file->baseName . '.' . $model->file->extension;
            $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
            $reader->setShouldFormatDates(true);
            $reader->open($inputFileName);
            $transaction = Yii::$app->db->beginTransaction();
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getName() == 'Sheet1') {
                    // work with sheet I want
                    foreach ($sheet->getRowIterator() as $i => $row) {
                        if ($i >= 2) {
                            try {
                                if (strval($row[1]) != '') {
                                    $hokinhdoanh = HoKinhDoanh::findOne(['so_giayphep' => strval($row[1])]);

                                    if ($hokinhdoanh != NULL) {
                                        $countUp++;
                                        $hokinhdoanh->ngaycap_giayphep = date('Y-m-d', strtotime($row[2]));
                                        $hokinhdoanh->tinhtrang_hd = $row[3];
                                        $hokinhdoanh->ten_hkd = strval($row[4]);
                                        $hokinhdoanh->so_nha = strval($row[5]);
                                        $hokinhdoanh->ten_duong = strval($row[6]);
                                        $hokinhdoanh->ten_phuong = strval($row[7]);
                                        if ($row[8] == 'Thương mại và dịch vụ') {
                                            $hokinhdoanh->linhvuc_id = 1;
                                        } elseif ($row[8] == 'Sản xuất công nghiệp') {
                                            $hokinhdoanh->linhvuc_id = 2;
                                        } elseif ($row[8] == 'Y tế') {
                                            $hokinhdoanh->linhvuc_id = 3;
                                        } elseif ($row[8] == 'Kinh doanh bán lẻ thuốc lá') {
                                            $hokinhdoanh->linhvuc_id = 5;
                                        } elseif ($row[8] == 'Kinh doanh trò chơi điện tử') {
                                            $hokinhdoanh->linhvuc_id = 6;
                                        } elseif ($row[8] == 'Kinh doanh vũ trường') {
                                            $hokinhdoanh->linhvuc_id = 7;
                                        }
                                        $hokinhdoanh->ma_nganh = strval($row[9]);
                                        $hokinhdoanh->nganh_kd = strval($row[10]);
                                        $hokinhdoanh->von_kd = $row[11];
                                        $hokinhdoanh->so_laodong = $row[12];
                                        $hokinhdoanh->nguoi_daidien = $row[13];
                                        $hokinhdoanh->gioi_tinh = $row[14];
                                        $hokinhdoanh->ngay_sinh = date('Y-m-d', strtotime($row[15]));
                                        $hokinhdoanh->so_cmnd = strval($row[16]);
                                        $hokinhdoanh->hokhau_thuongtru = strval($row[17]);
                                        $hokinhdoanh->dan_toc = $row[18];
                                        $hokinhdoanh->quoc_tich = $row[19];
                                        $hokinhdoanh->dien_thoai = $row[20];
                                        $hokinhdoanh->ghi_chu = $row[21];
                                        $hokinhdoanh->save();
                                    } elseif ($hokinhdoanh == NULL) {
                                        $countIn++;
                                        $hokinhdoanh = new HoKinhDoanh();
                                        $hokinhdoanh->so_giayphep = strval($row[1]);
                                        $hokinhdoanh->ngaycap_giayphep = date('Y-m-d', strtotime($row[2]));
                                        $hokinhdoanh->tinhtrang_hd = $row[3];
                                        $hokinhdoanh->ten_hkd = strval($row[4]);
                                        $hokinhdoanh->so_nha = strval($row[5]);
                                        $hokinhdoanh->ten_duong = strval($row[6]);
                                        $hokinhdoanh->ten_phuong = strval($row[7]);
                                        if ($row[8] == 'Thương mại và dịch vụ') {
                                            $hokinhdoanh->linhvuc_id = 1;
                                        } elseif ($row[8] == 'Sản xuất công nghiệp') {
                                            $hokinhdoanh->linhvuc_id = 2;
                                        } elseif ($row[8] == 'Y tế') {
                                            $hokinhdoanh->linhvuc_id = 3;
                                        } elseif ($row[8] == 'Kinh doanh bán lẻ thuốc lá') {
                                            $hokinhdoanh->linhvuc_id = 5;
                                        } elseif ($row[8] == 'Kinh doanh trò chơi điện tử') {
                                            $hokinhdoanh->linhvuc_id = 6;
                                        } elseif ($row[8] == 'Kinh doanh vũ trường') {
                                            $hokinhdoanh->linhvuc_id = 7;
                                        }
                                        $hokinhdoanh->ma_nganh = strval($row[9]);
                                        $hokinhdoanh->nganh_kd = strval($row[10]);
                                        $hokinhdoanh->von_kd = $row[11];
                                        $hokinhdoanh->so_laodong = $row[12];
                                        $hokinhdoanh->nguoi_daidien = $row[13];
                                        $hokinhdoanh->gioi_tinh = $row[14];
                                        $hokinhdoanh->ngay_sinh = date('Y-m-d', strtotime($row[15]));
                                        $hokinhdoanh->so_cmnd = strval($row[16]);
                                        $hokinhdoanh->hokhau_thuongtru = strval($row[17]);
                                        $hokinhdoanh->dan_toc = $row[18];
                                        $hokinhdoanh->quoc_tich = $row[19];
                                        $hokinhdoanh->dien_thoai = $row[20];
                                        $hokinhdoanh->ghi_chu = $row[21];
                                        $hokinhdoanh->save();
                                    }
                                }
                            } catch (Exception $e) {
                                DebugService::dumpdie('Lỗi dòng số: ' . $i);
                                $transaction->rollBack();
                            }
                        }
                    }
                    $reader->close();
                    UtilityService::alert('hkd_import_success');
                    $transaction->commit();
                    return $this->render('readexcel', [
                                'model' => $model, 'countUp' => $countUp,
                                'countIn' => $countIn,
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
            }
        }
        return $this->render('readexcel', [
                    'model' => $model, 'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

}
