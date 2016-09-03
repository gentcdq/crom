<?php
/**
 * Created by PhpStorm.
 * User: CDQ
 * Date: 2016/8/22
 * Time: 10:08
 */

namespace app\model;

use core\lib\model;

class nameModel extends model
{
    public $table = 'name';
    public function lists()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    public function getOne($id)
    {
        $ret = $this->get($this->table, '*', array(
            'id' => $id
        ));
        return $ret;
    }

    public function setOne($id, $data)
    {
        return $this->update($this->table, $data, array(
            'id' => $id
        ));
    }

    public function delOne($id)
    {
        return $this->delete($this->table, array(
            'id' => $id
        ));
    }
}