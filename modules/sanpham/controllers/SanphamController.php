<?php

namespace app\modules\sanpham\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmNganhNghe;
use Yii;
use app\models\SanPham;
use app\models\SanPhamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * SanphamController implements the CRUD actions for SanPham model.
 */
class SanphamController extends AbstractKinhdoanhq6Controller
{

     // public $const;
     public $const = [];
     public $error = [];
 
     public function init(){
         parent::init();
         // $this->const = [
 
         // ];
         $request = Yii::$app->request;
         $id_sanpham = $request->get('id');
         // var_dump($id_tintuc);
         $this->const = [
             'title' => 'Sản phẩm',
             'url' => [
                 'index' => 'sanpham/sanpham/index',
                 'search' => 'sanpham/sanpham/search',
                 'create' => 'sanpham/sanpham/create',
                 'update' => 'sanpham/sanpham/update',
                 'view' => 'sanpham/sanpham/view',
                 'delete' => 'sanpham/sanpham/delete',
                 'export' => 'sanpham/sanpham/export',
             ],
             'label' => [
                 'index' => 'Danh sách',
                 'continue' => 'Tiếp tục',
                 'search' => 'Tìm kiếm',
                 'create' => 'Thêm mới',
                 'update' => 'Cập nhật',
                 'view' => 'Thông tin chi tiết',
                 'delete' => 'Xóa thông tin',
                
             ],
             'buttons' => [
 
                 'back' => '<button type="button" class="btn btn-default pull-right" onclick="history.back()">Quay lại</button>',
                 'create' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['sanpham/sanpham/create']) . '">Thêm mới sản phẩm</a>',
                 'view' => '<a class="btn btn-info" href="' . Yii::$app->urlManager->createUrl(['sanpham/sanpham/view', 'id' => $id_sanpham]) . '">Thông tin chi tiết</a>',
                 'update' => '<a class="btn btn-warning" href="' . Yii::$app->urlManager->createUrl(['sanpham/sanpham/update', 'id' => $id_sanpham]) . '">Cập nhật sản phẩm</a>',
                 'export' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['sanpham/sanpham/export']) . '">Export</a>',
 
             ]
         ];
    }

    /**
     * Lists all SanPham models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SanPhamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
    }


    /**
     * Displays a single SanPham model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'const' => $this->const,
        ]);
    }

    /**
     * Creates a new SanPham model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model['sanpham'] = new SanPham();
       
        $model['nganhnghe']= DmNganhNghe::find()->orderBy('ten_nganh')->all();
        if ($request->isPost && $model['sanpham']->load($request->post()) && $model['sanpham']->validate()) {
           
            $model['sanpham']->save();

            return $this->redirect(['view', 'id' => $model['sanpham']->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
        

    }

    /**
     * Updates an existing SanPham model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model['sanpham'] = $this->findModel($id);
       
        $model['nganhnghe']=DmNganhNghe::find()->orderBy('ten_nganh')->all();
        if ($request->isPost && $model['sanpham']->load($request->post()) && $model['sanpham']->validate()) {
      
            $model['sanpham']->save();
            return $this->redirect(['view', 'id' => $model['sanpham']->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories()
        ]);
        
    }

    /**
     * Delete an existing SanPham model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
         //xóa file upload
         if($model->anh_dai_dien !='no-image.png'){
            $path=Yii::$app->basePath . '/uploads/file/hinhsanpham/'.$model->anh_dai_dien;
            if(is_file($path)){
                unlink($path);
            }
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
          
            $model->delete();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    
    /**
     * Finds the SanPham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SanPham the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SanPham::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    private function getCategories()
    {
        
        $danhmuc['nganhnghe'] = DmNganhNghe::find()->all();
 
        return $danhmuc;
    }
}
