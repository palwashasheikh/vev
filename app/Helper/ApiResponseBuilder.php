<?php

namespace App\Helper;

class ApiResponseBuilder
{
    private static  $responseFlag;
    private static  $responseMessage;
    private static  $responseData;
    private static  $responseErrors;
    public static function getMessage($validator){
        $errorMessage='';
        foreach ($validator->messages()->all() as $message)
        {
            $errorMessage.=$message;
        }
        return $errorMessage;
    }
    public static function body($flag,$message,$data,$error){
        self::$responseFlag=$flag;
        self::$responseMessage=$message;
        self::$responseData=$data;
        self::$responseErrors=$error;
    }
    public static function flag($flag){
        self::$responseFlag=$flag;
    }
    public static function message($message){
        self::$responseMessage=$message;
    }
    public static function data($data){
        self::$responseData=$data;
    }
    public static function error($error){
        self::$responseErrors=$error;
    }

    public static function getResponse(){
        return [
            'Flag' => self::$responseFlag,
            'Message' =>self::$responseMessage,
            'Data'=> self::$responseData,
            'Errors' => self::$responseErrors
        ];
    }





}
