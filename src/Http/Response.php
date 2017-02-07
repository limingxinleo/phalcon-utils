<?php
// +----------------------------------------------------------------------
// | Demo [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2016/11/7 Time: 10:37
// +----------------------------------------------------------------------
namespace limx\phalcon\Http;

class Response
{
    private $status;
    private $data;
    private $msg;
    private $time;

    public function __construct()
    {
        $this->time = time();
    }

    public function setStatus($status = 1)
    {
        $this->status = $status;
    }

    public function setData($data = [])
    {
        $this->data = $data;
    }

    public function setMsg($msg = '')
    {
        $this->msg = $msg;
    }

    public function json()
    {
        $data['status'] = $this->status;
        $data['data'] = $this->data;
        $data['msg'] = $this->msg;
        $data['time'] = $this->time;
        return $data;
    }

    public static function send($status = 1, $data = [], $msg = '', $type = 'json')
    {
        $response = di('response');
        switch (strtolower($type)) {
            case 'json':
            default:
                $result = new self();
                $result->setStatus($status);
                $result->setData($data);
                $result->setMsg($msg);
                return $response->setJsonContent($result->json());
        }
    }
}