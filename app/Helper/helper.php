<?php
namespace App\Helper;
class helper
{
    public static function getOrderCode(){
        $code="ORDER".rand(1,9).rand(0,99).rand(66,1000);
        return $code;
    }

}
