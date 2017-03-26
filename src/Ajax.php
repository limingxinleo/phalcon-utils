<?php
// +----------------------------------------------------------------------
// | Ajax [已废弃] [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\phalcon;
class Ajax
{
    /**
     * [ajaxResponse 返回特定格式的json]
     * @author limx
     * @param int    $status  状态码
     * @param array  $data    数据包
     * @param string $message 错误信息
     * @return JsonResponse
     */
    public static function ajaxResponse($status = 1, $data = [], $message = '')
    {
        $out = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'timestamp' => time()
        ];

        echo json_encode($out);
        exit;
    }

    /**
     * [success 成功的信息]
     * @author limx
     * @param null $data 数据包
     * @return JsonResponse
     */
    public static function success($data = null)
    {
        return self::ajaxResponse(1, $data);
    }

    /**
     * [error 返回错误信息]
     * @author limx
     * @param       $message 错误提示
     * @param array $extra   额外的数据包
     * @return JsonResponse
     */
    public static function error($message, $extra = [])
    {
        return self::ajaxResponse(0, $extra, $message);
    }

}