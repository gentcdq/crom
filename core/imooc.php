<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 10:24
 */

namespace core;

use core\lib\log;
use core\lib\route;

class imooc
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        log::init();
//        log::log('test');
//        log::log('test21324', 'test');

        $route = new route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP . '/ctrl/' . $ctrlClass . 'Ctrl.php';
        $cltrlClass = '\\' . MODULE . '\ctrl\\' . $ctrlClass . 'Ctrl';
        if(is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $cltrlClass();
            $ctrl->$action();

            log::log('ctrl:' . $ctrlClass . '   ' . 'action:' . $action);
        } else {
            throw new \Exception('找不到控制器' . $ctrlClass);
        }
    }

    static public function load($class)
    {
        //自动加载类库
        // new \core\route();
        // $class = '\core\route';
        //IMOOC.'/core/route.php'
        if (isset($classMap[$class])) {
            return  true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = IMOOC . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
//        $file = APP . '/views/' . $file;
//        if (is_file($file)) {
//            extract($this->assign);
//            include $file;
//        }

        //配置见http://twig.sensiolabs.org/doc/api.html
        $file = APP . '/views/' . $file;
        if (is_file($file)) {
            \Twig_Autoloader::register();

            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => IMOOC . '/log/twig',
                'debug' => DEBUG
            ));
            $template = $twig->loadTemplate('index.html');
            $template->display($this->assign ? $this->assign : '');
        }
    }


}

