<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\DonhangSanpham;
use app\modules\backend\models\KhachHang;
use app\services\DebugService;
use Yii;
use app\modules\backend\models\DonHang;
use app\modules\backend\models\SearchDonHang;
use app\modules\backend\base\FrontendBaseController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * DonHangController implements the CRUD actions for DonHang model.
 */
class DonHangController extends FrontendBaseController
{

    public $const;

    public function init()
    {
        parent::init();
        $this->const = [
            'categories' => [
                'khachhang' => KhachHang::find()->orderBy('ten')->all(),
            ]
        ];
    }

    /**
     * Lists all DonHang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDonHang();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const
        ]);
    }


    /**
     * Displays a single DonHang model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Đơn hàng #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                    'const' => $this->const,
                ]),
                'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                    Html::a('Cập nhật', ['update', 'id' => $id], ['class' => 'btn btn-primary float-left', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'const' => $this->const,
            ]);
        }
    }

    /**
     * Creates a new DonHang model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new DonHang();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Thêm mới Đơn hàng",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer' => Html::button('Lưu', ['class' => 'btn btn-primary float-left', 'type' => "submit"]) .
                        Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"])
                ];
            } else if ($model->load($request->post()) && $model->saveDonHang()) {
                return [
                    'redirect' => Yii::$app->urlManager->createUrl(['admin/don-hang/detail', 'id' => $model->id]),
                ];
            } else {
                return [
                    'title' => "Create new Đơn hàng",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary float-left', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->saveDonHang()) {
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
     * Updates an existing DonHang model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->ngay_ban = date('d-m-Y', strtotime($model->ngay_ban));

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Cập nhật Đơn hàng #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary float-left', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->saveDonHang()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Đơn hàng #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::a('Lưu', ['update', 'id' => $id], ['class' => 'btn btn-primary float-left', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Cập nhật Đơn hàng #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'const' => $this->const,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary float-left', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->saveDonHang()) {
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
     * Delete an existing DonHang model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->status = 0;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Xóa Đơn hàng #" . $id,
                    'content' => $this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Xóa', ['class' => 'btn btn-danger float-left', 'type' => "submit"])
                ];
            } else if ($request->isPost && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "DonHang #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update DonHang #" . $id,
                    'content' => $this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
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
     * Finds the DonHang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DonHang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DonHang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetail($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => DonhangSanpham::find()->where(['donhang_id' => $id]),
            'sort' => false,
        ]);

        return $this->render('detail', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd($id){
        $request = Yii::$app->request;

        $model = new DonhangSanpham();

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title' => "Thêm sản phẩm",
                    'content' => $this->renderAjax('add', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-light float-right', 'data-dismiss' => "modal"]) .
                        Html::button('Thêm', ['class' => 'btn btn-success float-left', 'type' => "submit"])
                ];
            }
        } else {
            return $this->render('add', [
                'model' => $model
            ]);
        }

    }

    public function actionRemove($id){

    }
}
