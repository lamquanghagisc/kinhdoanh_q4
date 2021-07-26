<?php

namespace app\modules\tintuc\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DmLoaitin;
use Yii;
use app\models\Video;
use app\models\VideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends AbstractKinhdoanhq6Controller
{

    
    public $const = [];
    public $error = [];
    public function init(){
        parent::init();
        $request = Yii::$app->request;
        $id_video = $request->get('id');
        $this->const = [
            'title' => 'Video',
            'url' => [
                'index' => 'tintuc/video/index',
                'search' => 'tintuc/video/search',
                'create' => 'tintuc/video/create',
                'update' => 'tintuc/video/update',
                'view' => 'tintuc/video/view',
                'delete' => 'tintuc/video/delete',
                'export' => 'tintuc/video/export',
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
                'create' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['tintuc/video/create']) . '">Thêm mới video</a>',
                'view' => '<a class="btn btn-info" href="' . Yii::$app->urlManager->createUrl(['tintuc/video/view', 'id' => $id_video]) . '">Thông tin chi tiết</a>',
                'update' => '<a class="btn btn-warning" href="' . Yii::$app->urlManager->createUrl(['tintuc/video/update', 'id' => $id_video]) . '">Cập nhật video</a>',
                'export' => '<a class="btn btn-success" href="' . Yii::$app->urlManager->createUrl(['tintuc/video/export']) . '">Export</a>',

            ]
        ];
    }

    /**
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
    }


    /**
     * Displays a single Video model.
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
     * Creates a new Video model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model['video'] = new Video();
        $model['loaitin']= DmLoaitin::find()->orderBy('ten_loai')->all();
        if ($request->isPost && $model['video']->load($request->post()) && $model['video']->validate()) {
            // $model['video']->taikhoan_id= Yii::$app->user->id;
        //  dd( $model['video']);
            $model['video']->save();

            return $this->redirect(['view', 'id' => $model['video']->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories(),
        ]);
    }

    /**
     * Updates an existing Video model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model['video'] = $this->findModel($id);
        $model['loaitin']=DmLoaitin::find()->orderBy('ten_loai')->all();
        if ($request->isPost && $model['video']->load($request->post()) && $model['video']->validate()) {
            // $model['video']->taikhoan_id= Yii::$app->user->id;
            $model['video']->save();
            return $this->redirect(['view', 'id' => $model['video']->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'const' => $this->const,
            'categories' => $this->getCategories()
        ]);
        
    }

    /**
     * Delete an existing Video model.
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
        if($model->ten_video){
            $path=Yii::$app->basePath . '/uploads/file/video/'.$model->ten_video;
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
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
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
}
