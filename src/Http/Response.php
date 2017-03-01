<?php
// +----------------------------------------------------------------------
// | Response [ WE CAN DO IT JUST THINK IT ]
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
    public static function json($status, $data, $message)
    {
        $response['status'] = $status;
        $response['data'] = $data;
        $response['message'] = $message;
        $response['timestamp'] = time();
        return $response;
    }

    public static function send($status = 1, $data = [], $msg = '', $type = 'json')
    {
        $response = di('response');
        switch (strtolower($type)) {
            case 'json':
            default:
                return $response->setJsonContent(self::json(
                    $status,
                    $data,
                    $msg
                ));
        }
    }
}