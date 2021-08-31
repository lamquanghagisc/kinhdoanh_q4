<?php

namespace app\modules\sanpham\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmNganhNghe;
use Yii;
use app\models\SuKien;
use app\models\SuKienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * SukienController implements the CRUD actions for SuKien model.
 */
class SukienController extends AbstractKinhdoanhq6Controller
{

    public $const = [];
    public $error = [];

    public function init(){
        parent::init();
        // $this->const = [

        // ];
        $request = Yii::$app->request;
        $id_sukien = $request->get('id');
        // var_dump($id_tintuc);
        $this->const = [
            'title' => 'Sự kiện',
            'url' => [
                'index' => 'sanpham/sukien/index',
                'search' => 'sanpham/sukien/search',
                'create' => 'sanpham/sukien/create',
                'update' => 'sanpham/sukien/update',
                'view' => 'sanpham/sukien/view',
                'delete' => 'sanpham/sukien/delete',
                'export' => 'sanpham/sukien/export',
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
                'create' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['sanpham/sukien/create']) . '">Thêm mới sự kiện</a>',
                'view' => '<a class="btn btn-info" href="' . Yii::$app->urlManager->createUrl(['sanpham/sukien/view', 'id' => $id_sukien]) . '">Thông tin chi tiết</a>',
                'update' => '<a class="btn btn-warning" href="' . Yii::$app->urlManager->createUrl(['sanpham/sukien/update', 'id' => $id_sukien]) . '">Cập nhật sự kiện</a>',
                'export' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['sanpham/sukien/export']) . '">Export</a>',

            ]
        ];
   }

    /**
     * Lists all SuKien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuKienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
    }


    /**
     * Displays a single SuKien model.
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
     * Creates a new SuKien model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model['sukien'] = new SuKien();

        $model['nganhnghe']= DmNganhNghe::find()->orderBy('ten_nganh')->all();
        if ($request->isPost && $model['sukien']->load($request->post()) && $model['sukien']->validate()) {
            // dd($model['sukien']);
            $model['sukien']->save();

            return $this->redirect(['view', 'id' => $model['sukien']->id]);
        }
       
        return $this->render('create', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
        

    }

    /**
     * Updates an existing SuKien model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model['sukien'] = $this->findModel($id);

        $model['nganhnghe']=DmNganhNghe::find()->orderBy('ten_nganh')->all();
        if ($request->isPost && $model['sukien']->load($request->post()) && $model['sukien']->validate()) {
      
            $model['sukien']->save();
            return $this->redirect(['view', 'id' => $model['sukien']->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories()
        ]);
    }

    /**
     * Delete an existing SuKien model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // dd(Yii::$app->basePath);
        $request = Yii::$app->request;
        $model = $this->findModel($id);
         //xóa file upload
         if($model->anh_dai_dien !='no-image.png'){
            $path=Yii::$app->basePath . '/uploads/file/hinhsukien/'.$model->anh_dai_dien;
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
     * Finds the SuKien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuKien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuKien::findOne($id)) !== null) {
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
