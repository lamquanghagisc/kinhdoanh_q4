<?php

namespace app\modules\tintuc\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmLoaitin;
use Yii;
use app\models\TinTuc;
use app\models\TinTucSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * TintucController implements the CRUD actions for TinTuc model.
 */
class TintucController extends AbstractKinhdoanhq6Controller
{

    // public $const;
    public $const = [];
    public $error = [];

    public function init(){
        parent::init();
        // $this->const = [

        // ];
        $request = Yii::$app->request;
        $id_tintuc = $request->get('id');
        // var_dump($id_tintuc);
        $this->const = [
            'title' => 'Tin tức',
            'url' => [
                'index' => 'tintuc/tintuc/index',
                'search' => 'tintuc/tintuc/search',
                'create' => 'tintuc/tintuc/create',
                'update' => 'tintuc/tintuc/update',
                'view' => 'tintuc/tintuc/view',
                'delete' => 'tintuc/tintuc/delete',
                'export' => 'tintuc/tintuc/export',
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
                'create' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['tintuc/tintuc/create']) . '">Thêm mới tin</a>',
                'view' => '<a class="btn btn-info" href="' . Yii::$app->urlManager->createUrl(['tintuc/tintuc/view', 'id' => $id_tintuc]) . '">Thông tin chi tiết</a>',
                'update' => '<a class="btn btn-warning" href="' . Yii::$app->urlManager->createUrl(['tintuc/tintuc/update', 'id' => $id_tintuc]) . '">Cập nhật tin </a>',
                'export' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['tintuc/tintuc/export']) . '">Export</a>',

            ]
        ];
    }

    /**
     * Lists all TinTuc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TinTucSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
    }


    /**
     * Displays a single TinTuc model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id= null)
    {
        
       
        $request = Yii::$app->request;
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'const' => $this->const,
                ]);
        
    }

    /**
     * Creates a new TinTuc model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // var_dump(1);
        $request = Yii::$app->request;
        $model['tintuc'] = new TinTuc();
        $model['loaitin']= DmLoaitin::find()->orderBy('ten_loai')->all();
      
        if ($request->isPost && $model['tintuc']->load($request->post()) && $model['tintuc']->validate()) {
            // $model['tintuc']->taikhoan_id= Yii::$app->user->id;
            // dd($model['tintuc']);
            $model['tintuc']->save();

            return $this->redirect(['view', 'id' => $model['tintuc']->id_tintuc]);
        }
        return $this->render('create', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
       
    }

    /**
     * Updates an existing TinTuc model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       
        $request = Yii::$app->request; 
        $model['tintuc'] = $this->findModel($id);
    
        $model['loaitin']=DmLoaitin::find()->orderBy('ten_loai')->all();
        if ($request->isPost && $model['tintuc']->load($request->post()) && $model['tintuc']->validate()) {
            // $model['tintuc']->taikhoan_id= Yii::$app->user->id;
            $model['tintuc']->save();
            return $this->redirect(['view', 'id' => $model['tintuc']->id_tintuc]);
        }
        return $this->render('update', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories()
        ]);
        
    }

    /**
     * Delete an existing TinTuc model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id= null)
    {
       
        $request = Yii::$app->request;
        $model = $this->findModel($id);
         //xóa file upload
         if($model->ten_hinh !='no-image.png'){
            $path=Yii::$app->basePath . '/uploads/file/hinhtintuc/'.$model->ten_hinh;
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
     * Finds the TinTuc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TinTuc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TinTuc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    private function getCategories()
    {
        
        $danhmuc['loaitin'] = DmLoaitin::find()->all();
 
        return $danhmuc;
    }
    public function getXoaanhtin($id){
        dd($id);
    }
    
}
