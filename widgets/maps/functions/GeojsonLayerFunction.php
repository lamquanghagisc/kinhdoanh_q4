<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/2/2020
 * Time: 2:42 PM
 */

namespace app\widgets\maps\functions;

use app\services\DebugService;
use yii\web\JsExpression;
use app\widgets\maps\plugins\prunecluster\PruneCluster;

class GeojsonLayerFunction extends JsFunction
{
    public $listUrl;

    public $itemUrl;

    public $ref_var = null;

    public $configs;

    public function encode()
    {
        $data = 'data.features';
        $js = "
        function init" . $this->name . "(){
        $.ajax({
            url: '$this->listUrl',
            dataType: 'json',
            success: function (data) { 
            initPruneCluster(data);
        ";


        $js .= "}});}";


        return new JsExpression($js);
    }
}