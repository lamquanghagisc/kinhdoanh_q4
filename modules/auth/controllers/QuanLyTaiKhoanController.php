<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 8/26/2018
 * Time: 12:21 AM
 */

namespace app\modules\auth\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\auth\Taikhoan;
use app\services\UtilityService;
use Yii;

class QuanLyTaiKhoanController extends AbstractKinhdoanhq6Controller
{

    public function actionDanhSach()
    {
        $this->layout = "@app/views/layouts/main";

        $request = Yii::$app->request;
        $model['danhsachtaikhoan'] = Taikhoan::find()->joinWith('taikhoanInfos')->orderBy('id_taikhoan')->all();
//        DebugService::dumpdie(Yii::$app->user->id);
        if ($request->isPost && $model['tai-khoan']->load($request->post()) && $model['tai-khoan']->save()) {
            $model['flash'] = UtilityService::alert('updated');
            return $this->redirect(Yii::$app->urlManager->createUrl('thong-tin-ca-nhan'));
        }

        return $this->render('danh-sach', [
            'model' => $model
        ]);
    }

   public function actionCreate() {
        $request = Yii::$app->request;

        $model['taikhoan'] = new Taikhoan();


        if ($request->isPost) {
            //  \app\services\DebugService::dumpdie($model['taikhoan']->getId());
            $model['taikhoan']->load($request->post());
            $model['taikhoan']->mat_khau = md5($model['taikhoan']->mat_khau . '@hcmgis#2018');
            //   $model['taikhoan']->created_at = date("Y-m-d H:i:s");
            $model['taikhoan']->status = 1;
            $model['taikhoan']->save();
            ///asss
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole($request->post('role'));
            $auth->assign($authorRole, $model['taikhoan']->getId());
            return $this->redirect(['danh-sach']);
        }

        return $this->renderPartial('create', [
                    'model' => $model
        ]);
    }

    public function actionUpdate($id = null) {
        $request = Yii::$app->request;
        $model['taikhoan'] = Taikhoan::findOne($id);
   
        if ($request->isPost && $model['taikhoan']->load($request->post())) {
          
            $model['taikhoan']->save();
            ///asss
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole($request->post('role'));
            $auth->revokeAll($model['taikhoan']->getId());
            $auth->assign($authorRole, $id);
            return $this->redirect(['danh-sach']);
        }

        return $this->renderPartial('update', [
                    'model' => $model
        ]);
    }

}