<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 1/14/18
 * Time: 1:38 PM
 */

namespace App\Http\Controllers;


class Logger
{
    private static $file = 'log';


    private static function getDate()
    {
        return '[' . date('d/m/Y H:i:s') . '] ';
    }

    public static function putLog($insert)
    {
        $myfile = fopen(Logger::$file, "a+");
        fwrite($myfile, PHP_EOL . Logger::getDate() . $insert);
        fclose($myfile);
    }

    public static function getLog()
    {
        $content = @file_get_contents(Logger::$file);
        return $content;
    }
}