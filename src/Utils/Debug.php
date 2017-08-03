<?php
// +----------------------------------------------------------------------
// | Utils\Debug [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
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
}