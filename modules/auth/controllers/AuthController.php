<?php

/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 8/26/2018
 * Time: 12:21 AM
 */

namespace app\modules\auth\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\auth\TaikhoanInfo;
use app\modules\auth\models\DoiMatKhau;
use app\modules\auth\models\LoginForm;
use app\services\UtilityService;
use Yii;

class AuthController extends AbstractKinhdoanhq6Controller {

    public function actionThongTinCaNhan() {
        $this->layout = "@app/views/layouts/user/main_user";
        $request = \Yii::$app->request;
        $model['tai-khoan'] = TaikhoanInfo::find()->where(['taikhoan_id' => \Yii::$app->user->id])->one();
        if ($model['tai-khoan'] == null) {
            $model['tai-khoan'] = new TaikhoanInfo();
        }
        // DebugService::dumpdie($model['tai-khoan']);
        if ($request->isPost && $model['tai-khoan']->load($request->post())) {
            $model['tai-khoan']->taikhoan_id = \Yii::$app->user->id;
            $model['tai-khoan']->save();
            UtilityService::alert('updated');
            return $this->redirect(\Yii::$app->urlManager->createUrl('auth/auth/thong-tin-ca-nhan'));
        }

        return $this->render('thong-tin-ca-nhan', [
                    'model' => $model
        ]);
    }

    public function actionDoiMatKhau() {
        $this->layout = "@app/views/layouts/user/main_user";

        $request = \Yii::$app->request;
        $model = new DoiMatKhau();

        if ($request->isPost && $model->load($request->post())) {
            // DebugService::dumpdie(!$model->changePassword());
            if ($model->changePassword() == TRUE) {
                UtilityService::alert('updatedpass');
                return $this->redirect(\Yii::$app->urlManager->createUrl('auth/auth/thong-tin-ca-nhan'));
            } else {
                UtilityService::alert('error_password');
                return $this->redirect(Yii::$app->urlManager->createUrl('auth/auth/doi-mat-khau'));
            }
        }

        return $this->render('doi-mat-khau', [
                    'model' => $model
        ]);
    }

    public function actionDangXuat() {
        \Yii::$app->user->logout();
        return $this->redirect(\Yii::$app->homeUrl);
    }

    public function actionDangNhap() {
        $this->layout = 'main';
        $request = Yii::$app->request;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($request->isPost) {
            //   DebugService::dumpdie($request);
            $model->load($request->post());
            if (!$model->checkUsername()) {
                UtilityService::alert('error_username');
                return $this->redirect(Yii::$app->urlManager->createUrl('auth/auth/dang-nhap'));
            } elseif (!$model->checkPassword()) {
                UtilityService::alert('error_password');
                return $this->redirect(Yii::$app->urlManager->createUrl('auth/auth/dang-nhap'));
            } else {
                Yii::$app->user->login($model->getUser(), $model->rememberMe ? 3600 * 24 * 30 : 0);
                return $this->redirect(Yii::$app->homeUrl);
            }
        }
        return $this->render('dang-nhap', [
                    'model' => $model,
        ]);
    }

}
