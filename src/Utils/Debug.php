<?php
// +----------------------------------------------------------------------
// | Utils\Debug [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2017/3/16 Time: 下午10:21
// +----------------------------------------------------------------------

namespace limx\phalcon\Utils;
class Debug
{
    /**
     * 浏览器友好的变量输出
     * @param mixed  $var   变量
     * @param string $label 标签 默认为空
     * @return void|string
     */
    public static function dump($var, $label = null)
    {
        $label = (null === $label) ? '' : rtrim($label) . ':';
        ob_start();
        var_dump($var);

        $output = ob_get_clean();
        $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);

        if (IS_CLI) {
            $output = PHP_EOL . $label . $output . PHP_EOL;
        } else {
            if (!extension_loaded('xdebug')) {
                $output = htmlspecialchars($output, ENT_QUOTES);
            }
            $output = '<pre>' . $label . $output . '</pre>';
        }

        echo $output;
    }

    /**
     * [color desc]
     * @desc   为输出的字符添加颜色 用于console输出
     * @author limx
     * @param string $type
     */
    public static function color($str = '', $type = 'red')
    {
        $color = [
            'red' => "\033[31;1m",
            'green' => "\033[32;1m",
            'yellow' => "\033[33;3m",
            'blue' => "\033[34;3m",
        ];
        $end = "\033[0m";
        return empty($color[$type]) ? $str : $color[$type] . $str . $end;
    }


}