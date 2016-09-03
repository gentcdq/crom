<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/9/1
 * Time: 18:50
 */

namespace core\lib;

class cache
{

    //缓存初始化
    private $cache_path;//缓存路径
    private $cache_expire;//缓存有效时间（秒）

    //设置缓存的时间和路径，在config/cache文件中定义
    public function __construct()
    {
        $this->cache_expire = \core\lib\conf::get('TIME', 'cache');
        $this->cache_path = \core\lib\conf::get('PATH', 'cache');

    }

    //生成缓存文件名
    private function fileName($key){
        return $this->cache_path.md5($key);
    }

    //更加给定的key和数据生成缓存文件，key是索引，data为数据
    public function setCache($key, $data){
        $values = serialize($data);
        $filename = $this->fileName($key);
        $file = fopen($filename, 'w');
        if ($file){
            fwrite($file, $values);
            fclose($file);
            return true;
        } else {
            return false;
        }
    }

    //获得缓存数据
    public function getCache($key){
        $filename = $this->fileName($key);
        if (!file_exists($filename) || !is_readable($filename)){//无法读取缓存
            return false;
        }
        if ( time() < (filemtime($filename) + $this->cache_expire) ) {//缓存未过期
            $file = fopen($filename, "r");
            if ($file){
                $data = fread($file, filesize($filename));
                fclose($file);
                return unserialize($data);//返回数据
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}