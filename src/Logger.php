<?php
// +----------------------------------------------------------------------
// | Demo [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2016/12/21 Time: 21:20
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
    private function __construct($type, $file)
    {
        try {
            $dir = di('config')->application->logDir . date('Ymd');
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
    public static function getInstance($type = 'file', $file = 'logger.log')
    {
        $config = [
            'type' => $type,
            'file' => $file,
        ];
        $key = md5(json_encode($config));

        if (empty(self::$_instance[$key])) {
            self::$_instance[$key] = new self($type, $file);
        }
        return self::$_instance[$key];
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