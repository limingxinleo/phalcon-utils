<?php
// +----------------------------------------------------------------------
// | Logger [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\phalcon;

use Phalcon\Logger\Adapter\File as FileLogger;

class Logger
{
    protected static $_instance = [];
    protected $logger;

    /**
     * Logger constructor.
     * @param $type
     * @param $file
     */
    private function __construct($type, $file, $dir)
    {
        try {
            $dir = di('config')->application->logDir . $dir;
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $this->logger = new FileLogger($dir . "/" . $file);
        } catch (PDOException $e) {
            $this->outputError($e->getMessage());
        }
    }

    /**
     * 防止克隆
     */
    private function __clone()
    {
    }

    /**
     * [getInstance desc]
     * @desc
     * @author limx
     * @param string $type
     * @param string $file
     * @return mixed
     */
    public static function getInstance($type = 'file', $file = 'logger.log', $dir = null)
    {
        if (is_null($dir)) {
            $dir = date('Ymd');
        }
        $config = [
            'type' => $type,
            'file' => $file,
            'dir' => $dir,
        ];
        $key = md5(json_encode($config));

        if (empty(static::$_instance[$key]) || !(static::$_instance[$key] instanceof Logger)) {
            static::$_instance[$key] = new Logger($type, $file, $dir);
        }
        return static::$_instance[$key];
    }

    /**
     * [__call desc]
     * @author limx
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->logger, $name], $arguments);
    }

    /**
     * 输出错误信息
     *
     * @param String $strErrMsg
     */
    private function outputError($strErrMsg)
    {
        throw new Exception('Logger Error: ' . $strErrMsg);
    }
}