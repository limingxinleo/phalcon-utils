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

use PDO;

class DB
{
    /**
     * [query desc]
     * @desc 查询结果集合
     * @author limx
     * @param $sql
     * @param array $params
     * @return array
     */
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

    /**
     * [fetch desc]
     * @desc 查询一条数据
     * @author limx
     * @param $sql
     * @param array $params
     * @return array
     */
    public static function fetch($sql, $params = [])
    {
        $db = di('db');
        $status = $db->query($sql, $params);
        $result = [];
        if ($status) {
            $status->setFetchMode(PDO::FETCH_ASSOC);
            $result = $status->fetch();
        }
        return $result;
    }

    /**
     * [execute desc]
     * @desc 更新数据
     * @author limx
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public static function execute($sql, $params = [])
    {
        $db = di('db');
        $status = $db->execute($sql, $params);
        return $status;
    }

    /**
     * [begin desc]
     * @desc 事务开始
     * @author limx
     * @return mixed
     */
    public static function begin()
    {
        return di('db')->begin();
    }

    /**
     * [rollback desc]
     * @desc 事务回滚
     * @author limx
     * @return mixed
     */
    public static function rollback()
    {
        return di('db')->rollback();
    }

    /**
     * [commit desc]
     * @desc 事务提交
     * @author limx
     * @return mixed
     */
    public static function commit()
    {
        return di('db')->commit();
    }
}