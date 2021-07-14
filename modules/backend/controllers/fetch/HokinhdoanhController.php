<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/9/2021
 * Time: 9:42 AM
 */

namespace app\modules\backend\controllers\fetch;


use app\models\ThongtinVipham;
use app\models\VHokinhdoanh;
use app\modules\backend\base\BackendBaseController;
use app\services\DebugService;
use yii\helpers\Json;

class HokinhdoanhController extends BackendBaseController
{
    public function actionThongtinchungTab($id){
        $model = VHokinhdoanh::findOne($id);
        $html = $this->renderPartial('thongtinchung',['model' => $model]);
        return Json::encode($html);
    }

    public function actionThongtinviphamTab($id){
        $model = ThongtinVipham::find()->where(['hkd_id' => $id])->orderBy('id_ttvp')->all();
        $html = $this->renderPartial('thongtinvipham',['model' => $model]);
        return Json::encode($html);
    }

    public function actionVitriTab($id){
        $model = VHokinhdoanh::find()->select('geo_x, geo_y, so_nha, ten_duong, ten_phuong')->where(['id_hkd' => $id])->one();
        $html = $this->renderPartial('vitri',['model' => $model]);
        return Json::encode($html);
    }
}