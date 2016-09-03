<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 10:13
 * 入口文件
 * 1,定义常量
 * 2.加载函数库
 * 3.启动框架
 */
use VarDumper;

define('CROM', '/var/www/crom');    //获取当前框架所在的目录，realpath表示将项目路径转化成绝对路径
define('CORE', CROM.'/core');    //框架核心文件所在的目录
define('APP', CROM.'/app');    //函数控制器所在的目录
define('MODULE', 'app');    //函数控制器所在的目录

define('DEBUG', true);    //定义是否开启调试模式

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new \Whoops\Run;          //展现错误
    $errorTitle = 'Frame error';
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error', 'On');    //打开错误显示的开关，会显示所有的PHP错误
} else {
    ini_set('display_error', 'Off');
}


include CORE.'/common/function.php';  //加载函数库

include CORE.'/crom.php';   //加载核心文件

spl_autoload_register('\core\crom::load');   //如果使用尚未定义的类，系统就会自动执行\core\crom::load函数，在这个函数里面加载

\core\crom::run();




