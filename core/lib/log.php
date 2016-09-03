<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 18:50
 */

namespace core\lib;

class log
{
    /**
     * 1.确定日志的存储方式
     *
     * 2.写日志
     */
    static public $class;

    static public function init()
    {
        //确定存储方式
        $drive = conf::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }

}