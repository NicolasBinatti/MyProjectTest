<?php

namespace App\Helpers;

class Util {

    public static function onlyNumber($str) {
        return (int)preg_replace("/[^0-9]/", "", $str);
    }

    public static function onlyString($str) {
        return trim(preg_replace("/[^A-Za-zá-üÁ-Ü]/", "", $str));
    }

    public static function array_change_key_case_recursive($arrTemp, $case = false) {

        if ($case === false) {
            $case = CASE_LOWER;
        }
        if ($case === true) {
            $case = CASE_UPPER;
        }
        $arrTemp = array_change_key_case($arrTemp, $case);
        foreach ($arrTemp as $key => $array) {
            if (is_array($array)) {
                $arrTemp[$key] = self::array_change_key_case_recursive($array, $case);
            }
        }
        return $arrTemp;
    }
    
    public static function formatString($str){
        return preg_replace(["/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"]
                , explode(" ", "a A e E i I o O u U n N c C")
                , utf8_decode($str));
    }
    public static function formatArray($arrDados, $arrayVal) {
        $keys = array_keys($arrDados);
        foreach ($arrayVal as $arr) {
            if (!in_array($arr, $keys)) {
                $_arr[$arr] = null;
            }
        }
        return array_merge($arrDados, $_arr);
    }
    
    public static function valArray($arr,$arrValido){
        if(is_array($arr)){
            $keys = array_keys($arr);
        } else {
            $keys = [$arr];
        }
        foreach($arrValido as $_arr){
            if(!in_array($_arr, $keys)){
                throw new \Exception($_arr.' Nao localizado no array',400);
            }
        }
        return true;
    }

}
