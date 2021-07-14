<?php

namespace app\modules\backend\controllers;

use \app\modules\backend\models\categories\Hangsanxuat;
use \app\modules\backend\models\categories\Loaisanpham;
use app\modules\backend\models\categories\SanPham;
use app\modules\backend\models\DonhangSanpham;
use app\services\DebugService;
use function GuzzleHttp\Psr7\str;
use Yii;
use app\modules\backend\models\KhoSanPham;
use app\modules\backend\models\SearchKhoSanPham;
use app\modules\backend\base\FrontendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * KhoController implements the CRUD actions for KhoSanPham model.
 */
class KhoController extends FrontendBaseController
{

    public $const;

    public function init(){
        parent::init();
        $this->const = [
            'categories' => [
                'loaisanpham' => LoaiSanPham::find()->where(['status' => $this->ACTIVE])->all(),
                'hangsanxuat' => HangSanXuat::find()->where(['status' => $this->ACTIVE])->all(),
            ],
        ];
    }

    /**
     * Lists all KhoSanPham models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchKhoSanPham();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const
        ]);
    }


    /**
     * Displays a single KhoSanPham model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Kho #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                            Html::a('Cập nhật',['update','id'=>$id],['class'=>'btn btn-primary float-left','role'=>'modal-remote'])
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
                'const' => $this->const,
            ]);
        }
    }

    /**
     * Creates a new KhoSanPham model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new KhoSanPham(['scenario' => KhoSanPham::SCENARIO_IMPORT]);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Thêm mới Kho",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Lưu',['class'=>'btn btn-primary float-left','type'=>"submit"]).
                            Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"])
                ];
            }else if($model->load($request->post()) && $model->saveKhoSanPham()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Thêm mới Kho",
                    'content'=>'<span class="text-success">Thêm mới Kho thành công</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                            Html::a('Tiếp tục thêm mới',['create'],['class'=>'btn btn-primary float-left','role'=>'modal-remote'])
                ];
            }else{
                return [
                    'title'=> "Thêm mới Kho",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary float-left','type'=>"submit"])

                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->saveKhoSanPham()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'const' => $this->const,
                ]);
            }
        }

    }

    /**
     * Updates an existing KhoSanPham model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->setScenario(KhoSanPham::SCENARIO_UPDATE);
        $model->ngay_nhap_kho = date('d/m/Y', strtotime($model->ngay_nhap_kho));

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Cập nhật Kho #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary float-left','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->saveKhoSanPham()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Kho #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                            Html::a('Lưu',['update','id'=>$id],['class'=>'btn btn-primary float-left','role'=>'modal-remote'])
                ];
            }else{
                 return [
                    'title'=> "Cập nhật Kho #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary float-left','type'=>"submit"])
                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->saveKhoSanPham()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'const' => $this->const,
                ]);
            }
        }
    }

    /**
     * Delete an existing KhoSanPham model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->setScenario(KhoSanPham::SCENARIO_DELETE);
        $model->status = $this->INACTIVE;

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Xóa Kho #".$id,
                    'content'=>$this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                        Html::button('Xóa',['class'=>'btn btn-danger float-left','type'=>"submit"])
                ];
            }else if($request->isPost && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'forceClose'=> true,
                ];
            }else{
                return [
                    'title'=> "Update KhoSanPham #".$id,
                    'content'=>$this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"]).
                        Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('delete', [
                    'model' => $model,
                    'const' => $this->const,
                ]);
            }
        }
    }

    
    /**
     * Finds the KhoSanPham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return KhoSanPham the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KhoSanPham::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCosts(){
        $products = KhoSanPham::findAll(['status' => $this->ACTIVE]);
        $sumCosts = 0;
        foreach($products as $i => $product){
            $sumCosts += $product->gia_mua_vnd;
        }
        DebugService::dumpdie($sumCosts);
    }

    public function actionList($q = null, $id = null) {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '', 'hangsanxuat_ten' => '', 'loaisanpham_ten' => '']];
        if (!is_null($q)) {
            $data = DonhangSanpham::find()->select('id, ten as text, hangsanxuat_ten, loaisanpham_ten, quy_cach')->where(['status' => $this->ACTIVE])->andWhere(['like','upper(ten)',mb_strtoupper($q)])->asArray()->all();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $result = SanPham::findOne($id);
            $out['results'] = ['id' => $id, 'text' => $result->ten, 'hangsanxuat_ten' => $result->hangsanxuat_ten, 'loaisanpham_ten' => $result->loaisanpham_ten, 'quy_cach' => $result->quy_cach];
        }
        return $out;
    }

    public function actionDetail($id){
        $request = Yii::$app->request;

        $model = KhoSanPham::find()->where(['sanpham_id' => $id,'status' => $this->ACTIVE])->all();

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;

            if($request->isGet){
                return [
                    'title' => 'Chi tiết tồn kho',
                    'content'=>$this->renderAjax('detail', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-light float-right','data-dismiss'=>"modal"])
                ];
            }

        }
    }
}
