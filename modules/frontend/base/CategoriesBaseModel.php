<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/30/2021
 * Time: 11:15 AM
 */

namespace app\modules\backend\base;


use app\services\DebugService;
use yii\db\ActiveRecord;

class CategoriesBaseModel extends ActiveRecord
{
    public $INACTIVE = 0;
    public $ACTIVE = 1;
    public $SOLD = 2;

    public function saveSanPham(){
        $flag = false;
        $this->status = $this->INACTIVE;
        $this->save();
        $this->hangsanxuat_ten = $this->hangsanxuat->ten;
        $this->loaisanpham_ten = $this->loaisanpham->ten;
        $this->status = $this->ACTIVE;
        if($this->save()){
            $flag = true;
        }

        return $flag;
    }

}