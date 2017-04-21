<?php
// +----------------------------------------------------------------------
// | Dir.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\phalcon\Utils;
class File
{

    /**
     * @desc   循环遍历文件夹下的文件
     * @author limx
     * @param $dir       文件夹路径
     * @param $extension 扩展名
     */
    public static function glob($dir, &$result, $extension = "")
    {
        if (substr($dir, -1) == '/') {
            $dir = substr($dir, 0, strlen($dir) - 1);
        }
        $curr = glob($dir . '/*');
        $len = strlen($extension) + 1;
        if ($curr) {
            foreach ($curr as $f) {
                if (is_dir($f)) {
                    static::glob($f, $result, $extension);
                } elseif (empty($ext)) {
                    array_push($result, $f);
                } elseif (strtolower(substr($f, 0 - $len)) == '.' . $ext) {
                    array_push($result, $f);
                }
            }
        }
    }
}