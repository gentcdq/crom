<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 11:29
 */

namespace core\lib;

use core\lib\conf;

class route
{
    public function __construct()
    {
        // xxx.com/index/index
        /**
         * 1.隐藏index.php  TODO 未完成
         * 2.获取URL，参数部分
         *3.返回相应的控制器
         *
         */

        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {

            $url = parse_url($_SERVER['REQUEST_URI']);
            $path = $url['path'];
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])) {
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }
            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = conf::get('ACTION', 'route');  //第一个参数是变量名，第二个参数是文件
            }

//            $path = $_SERVER['REQUEST_URI'];
//            $patharr = explode('/', trim($path, '/'));
//            if (isset($patharr[0])) {
//                $this->ctrl = $patharr[0];
//                unset($patharr[0]);
//            }
//            if (isset($patharr[1])) {
//                $this->action = $patharr[1];
//                unset($patharr[1]);
//            } else {
//                $this->action = conf::get('ACTION', 'route');  //第一个参数是变量名，第二个参数是文件
//            }
//
//            $count = count($patharr) + 2;
//            $i = 2;
//            while($i < $count) {
//                if (isset($patharr[$i + 1])) {
//                    $_GET[$patharr[$i]] = $patharr[$i + 1];
//                }
//                $i = $i + 2;
//            }
        } else {
            $this->ctrl = conf::get('CTRL', 'route');
            $this->action = conf::get('ACTION', 'route');
        }
    }
}