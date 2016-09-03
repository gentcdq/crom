<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 18:52
 */

namespace core\lib\drive\log;

use core\lib\conf;

class file
{
    public $path;
    public function __construct()
    {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }
    public function log($message, $file = 'log')
    {
        /**
         * 1.确定文件的存储位置是否存在
         * 2.没有则新建目录
         * 3.写入日志
         */

        if (!is_dir($this->path . date('Ymd'))) {
            mkdir($this->path . date('Ymd'), '0777', true);
        }
//        p($this->path . date('Ymd'));
        return file_put_contents($this->path . date('Ymd') . '/' . $file . '.php', date('Y-m-d H:i:s') . ': ' . json_encode($message) . PHP_EOL, FILE_APPEND);
    }
}

//文件系统