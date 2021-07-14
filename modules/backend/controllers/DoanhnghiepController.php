<?php

namespace app\modules\backend\controllers;

use app\models\DmDanToc;
use app\models\DmLinhvuc;
use app\models\DmLoaihinhdn;
use app\models\DmManganh;
use app\models\DmQuocTich;
use app\models\DoanhNghiep;
use app\models\DoanhNghiepSearch;
use app\models\FileUpload;
use app\models\GiaoThong;
use app\models\RanhPhuong;
use app\models\VDoanhnghiep;
use app\modules\backend\base\BackendBaseController;
use app\services\DebugService;
use app\services\UtilityService;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * DoanhnghiepController implements the CRUD actions for DoanhNghiep model.
 */
class DoanhnghiepController extends BackendBaseController {

    /**
     * Lists all DoanhNghiep models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DoanhNghiepSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTimkiem() {
      
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        $model['search'] = new DoanhNghiepSearch();
        $dataProvider = $model['search']->search(Yii::$app->request->queryParams);
        return $this->render('timkiem', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $model['search'],
        ]);
    }

    /**
     * Displays a single DoanhNghiep model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = $this->findVModel($id);
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the DoanhNghiep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoanhNghiep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DoanhNghiep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the VDoanhNghiep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoanhNghiep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVModel($id) {
        if (($model = VDoanhnghiep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewbando($id) {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = $this->findVModel($id);

        return $this->renderAjax('view_bando', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new DoanhNghiep model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = new DoanhNghiep();
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        if ($model['doanhnghiep']->load($request->post())) {
            if ($model['doanhnghiep']->ngay_thaydoi != null) {
                $model['doanhnghiep']->ngay_thaydoi = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_thaydoi));
            }
            if ($model['doanhnghiep']->ngaycap_giayphep != null) {
                $model['doanhnghiep']->ngaycap_giayphep = date('Y-m-d', strtotime($model['doanhnghiep']->ngaycap_giayphep));
            }
            if ($model['doanhnghiep']->ngay_sinh != null) {
                $model['doanhnghiep']->ngay_sinh = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_sinh));
            }
            if ($model['doanhnghiep']->ngay_cap != null) {
                $model['doanhnghiep']->ngay_cap = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_cap));
            }
            $model['doanhnghiep']->save();
            UtilityService::alert('hkd_create_success');
            return $this->redirect(Yii::$app->urlManager->createUrl('doanhnghiep/view') . '?id=' . $model['doanhnghiep']->id_doanhnghiep);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DoanhNghiep model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $post = $request->post();
        $model['doanhnghiep'] = $this->findModel($id);
        $model['toado'] = $this->findVModel($id);
        $model['dmmanganh'] = DmManganh::find()->orderBy('ten_nganh')->all();
        $model['linhvuc'] = DmLinhvuc::find()->orderBy('id_linhvuc')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('tenduong')->distinct()->all();
        $model['dmdantoc'] = DmDanToc::find()->orderBy('ten_dantoc')->all();
        $model['dmquoctich'] = DmQuocTich::find()->orderBy('ten_quoctich')->all();
        if ($model['doanhnghiep']->load($request->post())) {
            if ($model['doanhnghiep']->ngay_thaydoi != null) {
                $model['doanhnghiep']->ngay_thaydoi = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_thaydoi));
            }
            if ($model['doanhnghiep']->ngaycap_giayphep != null) {
                $model['doanhnghiep']->ngaycap_giayphep = date('Y-m-d', strtotime($model['doanhnghiep']->ngaycap_giayphep));
            }
            if ($model['doanhnghiep']->ngay_sinh != null) {
                $model['doanhnghiep']->ngay_sinh = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_sinh));
            }
            if ($model['doanhnghiep']->ngay_cap != null) {
                $model['doanhnghiep']->ngay_cap = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_cap));
            }
            if ($post['ToaDo']['geo_x'] != null && $post['ToaDo']['geo_y'] != null) {
                $query = "update doanh_nghiep set geom = ST_GeomFromText('POINT(" . $post['ToaDo']['geo_x'] . " " . $post['ToaDo']['geo_y'] . ")') where id_doanhnghiep = " . $model['doanhnghiep']->id_doanhnghiep;
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($query);
                $command->query();
                $connection->close();
            }
            $model['doanhnghiep']->save();
            UtilityService::alert('hkd_update_success');
            return $this->redirect(['view', 'id' => $model['doanhnghiep']->id_doanhnghiep]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing DoanhNghiep model.
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
     * Delete multiple existing DoanhNghiep model.
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

    public function actionReadexcel() {
        $searchModel = new DoanhNghiepSearch();
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
                                    $doanhnghiep = DoanhNghiep::findOne(['so_giayphep' => strval($row[1])]);

                                    if ($doanhnghiep != NULL) {
                                        $countUp++;
                                        $doanhnghiep->ngaycap_giayphep = date('Y-m-d', strtotime($row[2]));
                                        $doanhnghiep->tinhtrang_hd = $row[3];
                                        $doanhnghiep->tinhtrang_thue = $row[4];
                                        $doanhnghiep->phuong_rasoat = $row[5];
                                        if ($row[6] == 'Chi nhánh công ty') {
                                            $doanhnghiep->loaihinhdn_id = 1;
                                        } elseif ($row[6] == 'Công ty cổ phần') {
                                            $doanhnghiep->loaihinhdn_id = 2;
                                        } elseif ($row[6] == 'Công ty hợp danh') {
                                            $doanhnghiep->loaihinhdn_id = 3;
                                        } elseif ($row[6] == 'Công ty trách nhiệm hữu hạn hai thành viên trở lên') {
                                            $doanhnghiep->loaihinhdn_id = 4;
                                        } elseif ($row[6] == 'Công ty trách nhiệm hữu hạn một thành viên') {
                                            $doanhnghiep->loaihinhdn_id = 5;
                                        } elseif ($row[6] == 'Địa điểm kinh doanh') {
                                            $doanhnghiep->loaihinhdn_id = 6;
                                        } elseif ($row[6] == 'Doanh nghiệp tư nhân') {
                                            $doanhnghiep->loaihinhdn_id = 7;
                                        } elseif ($row[6] == 'Văn phòng đại diện') {
                                            $doanhnghiep->loaihinhdn_id = 8;
                                        }
                                        $doanhnghiep->ten_dn = strval($row[7]);
                                        $doanhnghiep->so_nha = strval($row[8]);
                                        $doanhnghiep->ten_duong = strval($row[9]);
                                        $doanhnghiep->ten_phuong = strval($row[10]);
                                        $doanhnghiep->linhvuc_id = $row[11];
                                        $doanhnghiep->ma_nganh = strval($row[12]);
                                        ;
                                        $doanhnghiep->nganh_kd = strval($row[13]);
                                        ;
                                        $doanhnghiep->von_dieule = $row[14];
                                        $doanhnghiep->so_laodong = $row[15];
                                        $doanhnghiep->nguoi_daidien = $row[16];
                                        $doanhnghiep->gioi_tinh = $row[17];
                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[18]));
                                        $doanhnghiep->so_cmnd = strval($row[19]);
                                        ;
                                        $doanhnghiep->dan_toc = $row[20];
                                        $doanhnghiep->quoc_tich = $row[21];
                                        $doanhnghiep->thanh_vien = $row[22];
                                        $doanhnghiep->dien_thoai = $row[23];
                                        $doanhnghiep->quanly_thue = $row[24];
                                        $doanhnghiep->loaihinh_kinhte = $row[25];
                                        $doanhnghiep->ten_loaihinh = $row[26];
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[27]));
                                        $doanhnghiep->ghi_chu = $row[28];
                                        $doanhnghiep->save();
                                    } elseif ($doanhnghiep == NULL) {
                                        $countIn++;
                                        $doanhnghiep = new DoanhNghiep();
                                        $doanhnghiep->so_giayphep = strval($row[1]);
                                        $doanhnghiep->ngaycap_giayphep = date('Y-m-d', strtotime($row[2]));
                                        $doanhnghiep->tinhtrang_hd = $row[3];
                                        $doanhnghiep->tinhtrang_thue = $row[4];
                                        $doanhnghiep->phuong_rasoat = $row[5];
                                        if ($row[6] == 'Chi nhánh công ty') {
                                            $doanhnghiep->loaihinhdn_id = 1;
                                        } elseif ($row[6] == 'Công ty cổ phần') {
                                            $doanhnghiep->loaihinhdn_id = 2;
                                        } elseif ($row[6] == 'Công ty hợp danh') {
                                            $doanhnghiep->loaihinhdn_id = 3;
                                        } elseif ($row[6] == 'Công ty trách nhiệm hữu hạn hai thành viên trở lên') {
                                            $doanhnghiep->loaihinhdn_id = 4;
                                        } elseif ($row[6] == 'Công ty trách nhiệm hữu hạn một thành viên') {
                                            $doanhnghiep->loaihinhdn_id = 5;
                                        } elseif ($row[6] == 'Địa điểm kinh doanh') {
                                            $doanhnghiep->loaihinhdn_id = 6;
                                        } elseif ($row[6] == 'Doanh nghiệp tư nhân') {
                                            $doanhnghiep->loaihinhdn_id = 7;
                                        } elseif ($row[6] == 'Văn phòng đại diện') {
                                            $doanhnghiep->loaihinhdn_id = 8;
                                        }
                                        $doanhnghiep->ten_dn = strval($row[7]);
                                        $doanhnghiep->so_nha = strval($row[8]);
                                        $doanhnghiep->ten_duong = strval($row[9]);
                                        $doanhnghiep->ten_phuong = strval($row[10]);
                                        $doanhnghiep->linhvuc_id = $row[11];
                                        $doanhnghiep->ma_nganh = strval($row[12]);
                                        ;
                                        $doanhnghiep->nganh_kd = strval($row[13]);
                                        ;
                                        $doanhnghiep->von_dieule = $row[14];
                                        $doanhnghiep->so_laodong = $row[15];
                                        $doanhnghiep->nguoi_daidien = $row[16];
                                        $doanhnghiep->gioi_tinh = $row[17];
                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[18]));
                                        $doanhnghiep->so_cmnd = strval($row[19]);
                                        ;
                                        $doanhnghiep->dan_toc = $row[20];
                                        $doanhnghiep->quoc_tich = $row[21];
                                        $doanhnghiep->thanh_vien = $row[22];
                                        $doanhnghiep->dien_thoai = $row[23];
                                        $doanhnghiep->quanly_thue = $row[24];
                                        $doanhnghiep->loaihinh_kinhte = $row[25];
                                        $doanhnghiep->ten_loaihinh = $row[26];
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[27]));
                                        $doanhnghiep->ghi_chu = $row[28];
                                        $doanhnghiep->save();
                                    }
                                }
                            } catch (Exception $e) {
                                DebugService::dumpdie('Lỗi dòng số: ' . $i);
                                $transaction->rollBack();
                            }
                        }
                    }
                    $reader->close();
                    UtilityService::alert('dn_import_success');
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
