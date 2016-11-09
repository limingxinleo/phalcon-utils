<?php
// +----------------------------------------------------------------------
// | Demo [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2016/11/9 Time: 18:12
// +----------------------------------------------------------------------
namespace limx\phalcon;
class DB
{
    public static function query($sql, $params = [])
    {
        $db = di('db');
        $status = $db->query($sql, $params);
        $result = [];
        if ($status) {
            $status->setFetchMode(PDO::FETCH_ASSOC);
            $result = $status->fetchAll();
        }
        return $result;
    }
}