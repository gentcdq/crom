<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/20
 * Time: 15:12
 */

namespace core\lib;

use core\lib\conf;
class model extends \medoo
{
    public function __construct()
    {

//        $database = conf::all('database');
//        try {
//            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
//        } catch (\PDOException $e) {
//            p($e->getMessage());
//        }
        $option = conf::all('database');
        parent::__construct($option);

    }
}