<?php
// +----------------------------------------------------------------------
// | Utils\Arr [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2016/10/20 Time: 15:27
// +----------------------------------------------------------------------
namespace limx\phalcon\Utils;

class Arr
{
    /**
     * @desc   获取数组的某一项
     * @author limx
     * @param        $key 字符串
     * @param string $dot 标识符
     */
    public static function get($key, $arr, $dot = '.')
    {
        if (!is_array($key)) {
            return self::get(explode($dot, $key), $arr);
        }
        if (count($key) == 0) {
            return $arr;
        }

        if (!isset($arr[$key[0]])) {
            return null;
        }
        $arr = $arr[$key[0]];
        array_splice($key, 0, 1);
        return self::get($key, $arr, $dot = '.');
    }

}