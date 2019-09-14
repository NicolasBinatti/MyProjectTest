<?php
namespace App\Helpers;


class UtilDebug {

    public static function returnSql(Array $params, String $sql) {
        foreach ($params as $key => $val) {
            if($key != ':'.$key){
                $key = ':' . $key;
            }
            $sql = str_replace($key, $val, $sql);
        }
        return $sql;
    }

}
