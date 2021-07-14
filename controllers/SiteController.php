<?php

namespace app\controllers;

use app\controllers\base\AbstractKinhdoanhq6Controller;
use app\models\DoanhNghiep;
use app\models\HoKinhDoanh;
use app\models\TinTuc;
use app\models\VDoanhnghiep;
use app\services\UtilityService;
use Yii;
use yii\data\Pagination;
use const YII_ENV_TEST;
use function mb_strtoupper;

class SiteController extends AbstractKinhdoanhq6Controller {
    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->redirect(Yii::$app->urlManager->createUrl('site/contact'));
    }

    /**
     * Displays map page.
     *
     * @return string
     */
    public function actionMap() {
        $this->layout = "@app/views/layouts/layout_map";
        return $this->render('map');
    }

    public function actionSearch() {
        // DebugService::dumpdie(Yii::$app->request->post());
        $post = Yii::$app->request->post();
        // $chuyengia = " ho_ten like '%" . mb_strtoupper($post['ho_ten']) . "%'";
        return $this->redirect(Yii::$app->homeUrl . 'site/map?key=1=1%20and%20ten_hkd%20like%20%27%25' . mb_strtoupper($post['ten_hkd']) . '%25%27');
    }

    public function actionTest() {
        $model = null;
        return $this->render('test', [
                    'model' => $model
        ]);
    }

    public function actionHuongdan() {
        $this->layout = "@app/views/layouts/user/main_user";
        return $this->render('huongdan');
    }

    public function actionAbout() {
        $this->layout = "@app/views/layouts/user/main_user";
        return $this->render('about');
    }

    public function actionContact() {
        $hkd = HoKinhDoanh::find()->count();
        $dn = DoanhNghiep::find()->count();
        $model['tin_tuc']=  TinTuc::find()->limit(4)->all();
        $query = VDoanhnghiep::find()->where(['tieu_bieu' => 1]);
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 30]);

        $model['doanhnghiep_tieubieu'] = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        //  \app\services\DebugService::dumpdie($model['tieu_bieu']);
        $this->layout = "@app/views/layouts/user/main_user";
        return $this->render('contact', ['pages' => $pages,
                    'totalcount' => $count,
                    'hkd' => $hkd,
                    'dn' => $dn,
                    'model' => $model]);
    }

    public function actionVitri($id = null) {
        $request = Yii::$app->request;
        $post = $request->post();
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(\Yii::$app->urlManager->createUrl('site/contact'));
        }

        $model['toado'] = VDoanhnghiep::findOne($id);
        if ($model['toado'] == null) {
            return $this->redirect(\Yii::$app->urlManager->createUrl('site/contact'));
        }

        return $this->renderPartial('vitri', [
                    'model' => $model
        ]);
    }

}
