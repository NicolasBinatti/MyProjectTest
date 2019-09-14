<?php
namespace App\Helpers;
use App\Helpers\Config;

class OpenView
{
    public static function dir($file) {
        require_once Config::VIEW . 'inicial.html';
        require_once Config::VIEW . $file;
        require_once Config::VIEW . 'final.html';
    }

    public static function dirUnique($file) {
        require_once Config::VIEW . $file;
    }
    
}
