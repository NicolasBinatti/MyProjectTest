<?php
namespace App\Helpers;

class UtfEncode
{

    public static function utfConverter(&$dados)
    {
        if (!is_array($dados) or empty($dados)) {
            return;
        }
        array_walk_recursive($dados, function (&$x) {
            if (!is_numeric($x)) {
                $x = (is_bool($x)) ? $x : iconv('ISO-8859-1', 'UTF-8', $x);
            }
        });
        return;
    }

    public static function utfConverterAppTrakinas(&$dados)
    {
        if (!is_array($dados) or empty($dados)) {
            return;
        }
        array_walk_recursive($dados, function (&$x) {
            if ($x != 'Promoção') {
                $x = (is_bool($x)) ? $x : iconv('ISO-8859-1', 'UTF-8', $x);
            }
        });
        return;
    }

    public static function utf8_decode_recursive($objectOrArray)
    {
        return is_array($objectOrArray) || is_object($objectOrArray) ?
            self::walk_recursive($objectOrArray, 'utf8_decode') :
            utf8_decode($objectOrArray);
    }

    public static function utf8_encode_recursive($objectOrArray)
    {
        return is_array($objectOrArray) || is_object($objectOrArray) ?
            self::walk_recursive($objectOrArray, 'utf8_encode') :
            utf8_encode($objectOrArray);
    }

    public static function walk_recursive($obj, $closure)
    {
        if (is_object($obj)) {
            $newObj = new \stdClass();
            foreach ($obj as $property => $value) {
                $newProperty = $closure($property);
                $newValue = self::walk_recursive($value, $closure);
                $newObj->$newProperty = $newValue;
            }
            return $newObj;
        } else if (is_array($obj)) {
            $newArray = array();
            foreach ($obj as $key => $value) {
                $key = $closure($key);
                $newArray[$key] = self::walk_recursive($value, $closure);
            }
            return $newArray;
        } else {
            return $closure($obj);
        }
    }
}
