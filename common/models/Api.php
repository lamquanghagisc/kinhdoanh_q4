<?php
namespace app\common\models;
class Api {
    public static function convertDMYtoYMD ($date){
        if($date==''){
            return null;
        }
        else{
            $mang=explode('-',$date);
            $mang=array_reverse($mang);
            return implode('-',$mang);
            
        }
        
    }
}