<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 14:50
 */

namespace app\ctrl;

use core\lib\model;
use core\lib\cache;
use core\lib\fileupload;

class indexCtrl extends \core\crom
{
    public function index()
    {
//        $temp = \core\lib\conf::get('CTRL', 'route');
//        $temp = \core\lib\conf::get('ACTION', 'route');
//        $temp = new \core\lib\model();
//        print_r($temp);
//
//        //��ͼ
//        $data = 'Hello World';
//        $title = '��ͼ�ļ�';
//        $this->assign('data', $data);
//        $this->assign('title', $title);
//        $this->display('index.html');
//
//
//
//        $model = new \core\lib\model();
//        $sql = "select * from name";
//        $ret = $model->query($sql);
//        p($ret->fetchAll());

//        $model = new model();
////        dump($model);
//
//        $data = $model->select('name', '*');
//        dump($data);
//        $model = new \app\model\nameModel();
//
//        dump($model->lists());
//
//        dump($model->getOne(0));
//        $data = array(
//            'name' => "III"
//        );
//        $ret = $model->setOne(0, $data);
//        dump($ret);

//        $data = 'Hello World';
//        $this->assign('data', $data);
//        $this->display('index.html');
//        dump(post('name', 0));

//        //缓存测试
//        $cache = new cache();
//        if ($cache->getCache(3)) {
//            p($cache->getCache(3));
//        } else {
//            $cache->setCache(3, 'asdsfasdfgd');
//        }


//        //文件上传测试
//        $file = array(
//            'name' => array(
//                0 => 'abc.txt',
//                1 => 'abdsefc.txt'
//            ),
//            'type' => array(
//                0 => 'text/plain',
//                1 => 'text/plain'
//            ),
//            'tmp_name' => array(
//                0 => '/tmp/phpgsdfxecCb',
//                1 => '/tmp/phpgxecCb'
//            ),
//            'error' => array(
//                0 => 0,
//                1 => 0
//            ),
//            'size' => array(
//                0 => 62,
//                1 => 62
//            ),
//        );
//        $fileupload = new fileupload($file);
//        $info = $fileupload->getFileInfo();
//        $out = $fileupload->save($info[0], '', $filename = "test");

        p($_GET['a']);
        p($_GET['b']);


    }

    public function test()
    {

        $data = 'test';
        $this->assign('data', $data);
        $this->display('test.html');

        p($_SERVER);

    }
}